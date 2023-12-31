<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NoticeController extends Controller
{
    public function index() {
        return view('backend.pages.notice.index');
    }

    public function getList()
    {
        $data = Notice::all();

        return DataTables::of($data)

            ->addColumn('action', function ($row) {
                $btn = '';
                if (Helper::hasRight('event.delete')) {
                    $btn = $btn . '<a target="_blank" class="btn btn-sm btn-success mx-1" href="/'.$row->file.'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                }
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
            'file' => 'required|mimes:pdf|max:20480',
            'notice' => 'required',
            'date' => 'required',
        ];
        $validator = $request->validate($rules);

        $notice = new Notice();

        $notice->notice = $request->notice;
        $notice->date = $request->date;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $notice->file = 'uploads/banner-images/' . $filename;
        }

        if ($notice->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Notice created successfully.',
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
        $notice = Notice::find($request->id);

        $data = [
            'notice' => $notice,
        ];

        return view('backend.pages.notice.edit', $data);
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
            'notice' => 'required',
            'date' => 'required',
        ];

        $validator = $request->validate($rules);
        $notice = Notice::find($request->id);

        $notice->notice = $request->notice;
        $notice->date = $request->date;

        if ($request->hasFile('file')) {
            if ($notice->file && file_exists(public_path($notice->file))) {
                unlink(public_path($notice->file));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $notice->file = 'uploads/banner-images/' . $filename;
        }

        if ($notice->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Notice updated successfully.',
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

        $notice = Notice::find($request->id);
        if ($notice) {
            if ($notice->file && file_exists(public_path($notice->file))) {
                unlink(public_path($notice->file));
            }

            if ($notice->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Notice deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.home.banner')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
