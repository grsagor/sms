<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryEvent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PhotoController extends Controller
{
    public function index() {
        $events = GalleryEvent::where('type','photo')->get();
        $data = [
            'events' => $events,
        ];
        return view('backend.pages.gallery.photo.index', $data);
    }

    public function getList()
    {
        $data = Gallery::all();

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
        ];
        $validator = $request->validate($rules);

        $gallery = new Gallery();
        $gallery->event_id = $request->event_id;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $gallery->file = 'uploads/banner-images/' . $filename;
        }

        if ($gallery->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Photo created successfully.',
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
        $gallery = Gallery::find($request->id);
        $events = GalleryEvent::where('type','photo')->get();
        $data = [
            'gallery' => $gallery,
            'events' => $events,
        ];

        return view('backend.pages.gallery.photo.edit', $data);
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

        $gallery = Gallery::find($request->id);
        $gallery->event_id = $request->event_id;

        if ($request->hasFile('file')) {
            if ($gallery->file && file_exists(public_path($gallery->file))) {
                unlink(public_path($gallery->file));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $gallery->file = 'uploads/banner-images/' . $filename;
        }

        if ($gallery->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Photo updated successfully.',
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

        $gallery = Gallery::find($request->id);
        if ($gallery) {
            if ($gallery->file && file_exists(public_path($gallery->file))) {
                unlink(public_path($gallery->file));
            }

            if ($gallery->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Photo deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.gallery.photo')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
