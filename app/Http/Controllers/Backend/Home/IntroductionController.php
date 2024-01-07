<?php

namespace App\Http\Controllers\Backend\Home;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Introduction;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IntroductionController extends Controller
{
    public function index() {
        return view('backend.pages.home.introduction.index');
    }

    public function getList()
    {
        $data = Introduction::all();

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
            'name' => 'required',
            'designation' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validator = $request->validate($rules);

        if ($request->type == 'member') {
            $introduction = new Introduction();
            $introduction->name = $request->name;
            $introduction->designation = $request->designation;
    
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $filename = time() . uniqid() . $image->getClientOriginalName();
                $image->move(public_path('uploads/introduction-images'), $filename);
                $introduction['file'] = 'uploads/introduction-images/' . $filename;
            }
    
            if ($introduction->save()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Introduction created successfully.',
                ]);
            } else {
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something went wrong.',
                ]);
            }
        }
    }

    public function edit(Request $request)
    {
        $introduction = Introduction::find($request->id);

        $data = [
            'introduction' => $introduction,
        ];

        return view('backend.pages.home.introduction.edit', $data);
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
            'name' => 'required',
            'designation' => 'required',
        ];

        $validator = $request->validate($rules);

        if ($request->type == 'member') {
            $introduction = Introduction::find($request->id);
            $introduction->name = $request->name;
            $introduction->designation = $request->designation;
    
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $filename = time() . uniqid() . $image->getClientOriginalName();
                $image->move(public_path('uploads/introduction-images'), $filename);
                $introduction['file'] = 'uploads/introduction-images/' . $filename;
            }
    
            if ($introduction->save()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Introduction updated successfully.',
                ]);
            } else {
                return response()->json([
                    'type' => 'error',
                    'message' => 'Something went wrong.',
                ]);
            }
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

        $banner = Introduction::find($request->id);
        if ($banner) {
            if ($banner->file && file_exists(public_path($banner->file))) {
                unlink(public_path($banner->file));
            }

            if ($banner->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Introduction deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.home.banner')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
