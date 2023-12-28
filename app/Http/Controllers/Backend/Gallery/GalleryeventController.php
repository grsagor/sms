<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryEvent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GalleryeventController extends Controller
{
    public function index() {
        return view('backend.pages.gallery.event.index');
    }

    public function getList()
    {
        $data = GalleryEvent::all();

        return DataTables::of($data)

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
            ->rawColumns(['action'])->make(true);
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
            'name' => 'required',
        ];
        $validator = $request->validate($rules);

        $gallery = new GalleryEvent();

        $gallery->name = $request->name;
        $gallery->type = $request->type;

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
        $gallery = GalleryEvent::find($request->id);
        $files = Gallery::where('event_id', $request->id)->get();
        $data = [
            'gallery' => $gallery,
            'files' => $files,
        ];

        return view('backend.pages.gallery.event.edit', $data);
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

        $gallery = GalleryEvent::find($request->id);

        $gallery->name = $request->name;
        $gallery->type = $request->type;

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
                return redirect()->route('admin.gallery.event')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
