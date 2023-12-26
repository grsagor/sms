<?php

namespace App\Http\Controllers\Backend\Aboutus;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Why;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WhyController extends Controller
{
    public function index() {
        return view('backend.pages.about-us.why.index');
    }

    public function getList()
    {
        $data = Why::all();

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
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validator = $request->validate($rules);

        $why = new Why();

        $why->title = $request->title;
        $why->description = $request->description;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $why->image = 'uploads/banner-images/' . $filename;
        }

        if ($why->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Banner created successfully.',
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
        $why = Why::find($request->id);

        $data = [
            'why' => $why,
        ];

        return view('backend.pages.about-us.why.edit', $data);
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
            'description' => 'required',        ];

        $validator = $request->validate($rules);
        $why = Why::find($request->id);

        $why->title = $request->title;
        $why->description = $request->description;

        if ($request->hasFile('file')) {
            if ($why->image && file_exists(public_path($why->image))) {
                unlink(public_path($why->image));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $why->image = 'uploads/banner-images/' . $filename;
        }

        if ($why->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Why updated successfully.',
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

        $why = Why::find($request->id);
        if ($why) {
            if ($why->image && file_exists(public_path($why->image))) {
                unlink(public_path($why->image));
            }

            if ($why->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Why deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.about-us.why')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
