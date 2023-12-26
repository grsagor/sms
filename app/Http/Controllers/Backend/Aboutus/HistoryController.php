<?php

namespace App\Http\Controllers\Backend\Aboutus;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\File;

class HistoryController extends Controller
{
    public function index()
    {
        return view('backend.pages.about-us.history.index');
    }

    public function getList()
    {
        $data = File::where('type', 'history')->get();

        return DataTables::of($data)

            ->editColumn('file', function ($row) {
                $images = $row->file;
                return '<a href="' . asset($images) . '" target="_blank"><img class="" width="50px" height="50px" src="' . asset($images) . '" alt="profile image"></a>';
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

        $file = new File();

        $file->type = 'history';
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/file-images'), $filename);
            $file->file = 'uploads/file-images/' . $filename;
        }

        if ($file->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'History created successfully.',
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
        $file = File::find($request->id);

        $data = [
            'file' => $file,
        ];

        return view('backend.pages.about-us.history.edit', $data);
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
        $file = File::find($request->id);

        if ($request->hasFile('file')) {
            if ($file->file && file_exists(public_path($file->file))) {
                unlink(public_path($file->file));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/file-images'), $filename);
            $file->file = 'uploads/file-images/' . $filename;
        }

        if ($file->save()) {
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

        $file = File::find($request->id);
        if ($file) {
            if ($file->file && file_exists(public_path($file->file))) {
                unlink(public_path($file->file));
            }

            if ($file->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'File deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.about.us.history')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'File not found.']);
        }
    }
}
