<?php

namespace App\Http\Controllers\Backend\Administrations;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\GoverningBody;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GoverningbodyController extends Controller
{
    public function index() {
        return view('backend.pages.administrations.governing-body.index');
    }

    public function getList()
    {
        $data = GoverningBody::all();

        return DataTables::of($data)

            ->editColumn('image', function ($row) {
                $images = $row->image;
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
            ->rawColumns(['image', 'action'])->make(true);
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validator = $request->validate($rules);

        $governing_body = new GoverningBody();

        $governing_body->name = $request->name;
        $governing_body->designation = $request->designation;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $governing_body->image = 'uploads/banner-images/' . $filename;
        }

        if ($governing_body->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Governing body created successfully.',
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
        $governing_body = GoverningBody::find($request->id);

        $data = [
            'governing_body' => $governing_body,
        ];

        return view('backend.pages.administrations.governing-body.edit', $data);
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
        ];

        $validator = $request->validate($rules);
        $governing_body = GoverningBody::find($request->id);

        $governing_body->name = $request->name;
        $governing_body->designation = $request->designation;

        if ($request->hasFile('file')) {
            if ($governing_body->image && file_exists(public_path($governing_body->image))) {
                unlink(public_path($governing_body->image));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $governing_body->image = 'uploads/banner-images/' . $filename;
        }

        if ($governing_body->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Governing body updated successfully.',
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

        $governing_body = GoverningBody::find($request->id);
        if ($governing_body) {
            if ($governing_body->image && file_exists(public_path($governing_body->image))) {
                unlink(public_path($governing_body->image));
            }

            if ($governing_body->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Governing body deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.administrations.governing-body')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
