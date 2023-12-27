<?php

namespace App\Http\Controllers\Backend\Academics;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\DressCode;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DressController extends Controller
{
    public function index() {
        return view('backend.pages.academics.dress.index');
    }

    public function getList()
    {
        $data = DressCode::all();

        return DataTables::of($data)

            ->editColumn('file', function ($row) {
                $images = $row->file;
                return '<a href="'.asset($images).'" target="_blank"><img class="" width="50px" height="50px" src="'.asset($images).'" alt="profile image"></a>';
            })

            ->addColumn('action', function ($row) {
                $btn = '';
                if (Helper::hasRight('event.edit')) {
                    $btn = $btn . '<a href="" data-id="' . $row->id . '" class="edit_btn btn btn-sm btn-primary mx-1"><i class="fa-solid fa-pencil"></i></a>';
                }
                if (Helper::hasRight('event.delete')) {
                    $btn = $btn . '<a class="delete_btn btn btn-sm btn-danger " data-id="' . $row->id . '" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>';
                }
                return $btn;
            })
            ->rawColumns(['file', 'action'])->make(true);
    }

    public function store(Request $request)
    {
        if (!Helper::hasRight('menu.create')) {
            return response()->json([
                'type' => 'error',
                'message' => "You don't have rights to create menu.",
            ]);
        }
        $requestData = $request->all();
        $rules = [
            'title' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validator = $request->validate($rules);

        $dress_code = new DressCode();

        $dress_code->title = $request->title;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $dress_code->file = 'uploads/banner-images/' . $filename;
        }

        if ($dress_code->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Dress Code created successfully.',
            ]);
        } else {
            return response()->json([
                'type' => 'error',
                'message' => 'Something went wrong.',
            ]);
        }
    }

    public function edit(Request $request)
    {
        $dress_code = DressCode::find($request->id);

        $data = [
            'dress_code' => $dress_code,
        ];

        return view('backend.pages.academics.dress.edit', $data);
    }

    public function update(Request $request)
    {
        if (!Helper::hasRight('menu.edit')) {
            return response()->json([
                'type' => 'error',
                'message' => "You don't have rights to update event.",
            ]);
        }
        $requestData = $request->all();
        $rules = [
            'title' => 'required',
        ];

        $validator = $request->validate($rules);
        $dress_code = DressCode::find($request->id);

        $dress_code->title = $request->title;

        if ($request->hasFile('file')) {
            if ($dress_code->file && file_exists(public_path($dress_code->file))) {
                unlink(public_path($dress_code->file));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $dress_code->file = 'uploads/banner-images/' . $filename;
        }

        if ($dress_code->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Dress Code updated successfully.',
            ]);
        } else {
            return response()->json([
                'type' => 'error',
                'message' => 'Something went wrong.',
            ]);
        }
    }
    
    public function delete(Request $request)
    {
        if (!Helper::hasRight('menu.delete')) {
            return response()->json([
                'type' => 'error',
                'message' => "You don't have rights to delete event.",
            ]);
        }

        $dress_code = DressCode::find($request->id);
        if ($dress_code) {
            if ($dress_code->file && file_exists(public_path($dress_code->file))) {
                unlink(public_path($dress_code->file));
            }

            if ($dress_code->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Dress Code deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.academics.dress')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
