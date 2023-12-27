<?php

namespace App\Http\Controllers\Backend\Academics;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RuleController extends Controller
{
    public function index() {
        return view('backend.pages.academics.rules.index');
    }

    public function getList()
    {
        $data = Rule::all();

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
            'rule' => 'required'
        ];
        $validator = $request->validate($rules);

        $rule = new Rule();

        $rule->rule = $request->rule;

        if ($rule->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Rule created successfully.',
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
        $rule = Rule::find($request->id);

        $data = [
            'rule' => $rule,
        ];

        return view('backend.pages.academics.rules.edit', $data);
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
            'rule' => 'required'
        ];

        $validator = $request->validate($rules);
        $rule = Rule::find($request->id);

        $rule->rule = $request->rule;

        if ($rule->save()) {
            return response()->json([
                'type' => 'success',
                'message' => 'Rule updated successfully.',
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

        $rule = Rule::find($request->id);
        if ($rule) {
            if ($rule->delete()) {
                return response()->json([
                    'type' => 'success',
                    'message' => 'Rule deleted successfully.',
                ]);
            } else {
                return redirect()->route('admin.academics.rules')->with('error', 'Something went wrong.');
            }
        } else {
            return json_encode(['error' => 'Menu not found.']);
        }
    }
}
