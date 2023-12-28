<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StatisticsController extends Controller
{
    public function index() {
        return view('backend.pages.home.statistics.index');
    }

    public function getList()
    {
        $settings = [
            'application_number_of_students' => 'Number of students',
            'application_number_of_teachers' => 'Number of teachers',
            'application_number_of_scholarships_students' => 'Number of scholarship students',
            'application_number_of_gpa5_students' => 'Number of GPA-5 students'
        ];
        $data = Setting::whereIn('key', array_keys($settings))->get();

        return DataTables::of($data)
            ->editColumn('key', function ($row) use ($settings) {
                if (array_key_exists($row->key, $settings)) {
                    return $settings[$row->key];
                }
                return $row->key;
            })

            ->rawColumns(['key'])->make(true);
    }

    public function edit(Request $request)
    {
        return view('backend.pages.home.statistics.edit');
    }
}
