<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index() {
        return view('backend.pages.gallery.video.index');
    }

    public function getList()
    {
        $data = Banner::all();

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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validator = $request->validate($rules);

        $banner = new Banner();

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $banner->file = 'uploads/banner-images/' . $filename;
        }

        if ($banner->save()) {
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
        $banner = Banner::find($request->id);

        $data = [
            'banner' => $banner,
        ];

        return view('backend.pages.home.banner.edit', $data);
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = $request->validate($rules);
        $banner = Banner::find($request->id);

        if ($request->hasFile('file')) {
            if ($banner->file && file_exists(public_path($banner->file))) {
                unlink(public_path($banner->file));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $banner->file = 'uploads/banner-images/' . $filename;
        }

        if ($banner->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Banner updated successfully.',
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

        $banner = Banner::find($request->id);
        if ($banner) {
            if ($banner->file && file_exists(public_path($banner->file))) {
                unlink(public_path($banner->file));
            }

            if ($banner->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Banner deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.home.banner')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
