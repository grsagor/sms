<?php

namespace App\Http\Controllers\Backend\Administrations;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\TeachingStaff;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TeachingstaffController extends Controller
{
    public function index() {
        return view('backend.pages.administrations.teaching-staff.index');
    }

    public function getList()
    {
        $data = TeachingStaff::all();

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

        $teaching_staff = new TeachingStaff();

        $teaching_staff->name = $request->name;
        $teaching_staff->designation = $request->designation;
        $teaching_staff->subject = $request->subject;
        $teaching_staff->shift = $request->shift;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $teaching_staff->image = 'uploads/banner-images/' . $filename;
        }

        if ($teaching_staff->save()) {
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
        $teaching_staff = TeachingStaff::find($request->id);

        $data = [
            'teaching_staff' => $teaching_staff,
        ];

        return view('backend.pages.administrations.teaching-staff.edit', $data);
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
        $teaching_staff = TeachingStaff::find($request->id);

        $teaching_staff->name = $request->name;
        $teaching_staff->designation = $request->designation;
        $teaching_staff->subject = $request->subject;
        $teaching_staff->shift = $request->shift;

        if ($request->hasFile('file')) {
            if ($teaching_staff->image && file_exists(public_path($teaching_staff->image))) {
                unlink(public_path($teaching_staff->image));
            }

            $image = $request->file('file');
            $filename = time() . uniqid() . $image->getClientOriginalName();
            $image->move(public_path('uploads/banner-images'), $filename);
            $teaching_staff->image = 'uploads/banner-images/' . $filename;
        }

        if ($teaching_staff->save()) {
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

        $teaching_staff = TeachingStaff::find($request->id);
        if ($teaching_staff) {
            if ($teaching_staff->image && file_exists(public_path($teaching_staff->image))) {
                unlink(public_path($teaching_staff->image));
            }

            if ($teaching_staff->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Banner deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.administrations.teaching-staff')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
