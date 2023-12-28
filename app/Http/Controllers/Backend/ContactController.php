<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('backend.pages.contact.index');
    }

    public function getList()
    {
        $settings = [
            'application_email' => 'Email',
            'application_address' => 'Address',
            'application_phone' => 'Phone',
        ];
        $data = Setting::whereIn('key', array_keys($settings))->get();

        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $btn = '';
                if (Helper::hasRight('event.edit')) {
                    $btn = $btn . '<a data-key="' . $row->key . '" class="btn btn-sm btn-primary mx-1 settingUpdateOpenModalBtn"><i class="fa-solid fa-pencil"></i></a>';
                }
                return $btn;
            })

            ->editColumn('key', function ($row) use ($settings) {
                if (array_key_exists($row->key, $settings)) {
                    return $settings[$row->key];
                }
                return $row->key;
            })

            ->rawColumns(['action', 'key'])->make(true);
    }
}
