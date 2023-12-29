<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\DressCode;
use App\Models\File;
use App\Models\GoverningBody;
use App\Models\Introduction;
use App\Models\Rule;
use App\Models\TeachingStaff;
use App\Models\Why;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home() {
        $introductions = Introduction::orderBy('updated_at', 'desc')->take(3)->get();
        $banners = Banner::all();
        $data = [
            'introductions' => $introductions,
            'banners' => $banners,
        ];
        return view('frontend.pages.home.home', $data);
    }

    public function aboutUs($type) {
        $glances = File::where('type','glance')->get();
        $histories = File::where('type','history')->get();
        $whies = Why::all();
        $data = [
            'glances' => $glances,
            'histories' => $histories,
            'whies' => $whies,
        ];
        switch ($type) {
            case 'glance':
                return view('frontend.pages.about-us.glance', $data);
            case 'history':
                return view('frontend.pages.about-us.history', $data);
            case 'why':
                return view('frontend.pages.about-us.why', $data);
            default:
                break;
        }
    }
    public function administrations($type) {
        $bodies = GoverningBody::all();
        $principal = TeachingStaff::where('designation', 'Principal')->first();
        $day_teachers = TeachingStaff::where('shift', 'Day')->where('designation', '!=', 'Principal')->get();
        $morning_teachers = TeachingStaff::where('shift', 'Morning')->where('designation', '!=', 'Principal')->get();
        $data = [
            'bodies' => $bodies,
            'principal' => $principal,
            'day_teachers' => $day_teachers,
            'morning_teachers' => $morning_teachers,
        ];
        switch ($type) {
            case 'governing-body':
                return view('frontend.pages.administrations.governing-body', $data);
            case 'principal-message':
                return view('frontend.pages.administrations.principal-message', $data);
            case 'teaching-staff':
                return view('frontend.pages.administrations.teaching-staff', $data);
            default:
                break;
        }
    }
    public function academics($type) {
        $result = File::where('type', 'results')->latest('updated_at')->first();
        $rules = Rule::all();
        $dresses = DressCode::all();
        $data = [
            'result' => $result,
            'rules' => $rules,
            'dresses' => $dresses,
        ];
        switch ($type) {
            case 'results':
                return view('frontend.pages.academics.results', $data);
            case 'rules-and-regulations':
                return view('frontend.pages.academics.rules-and-regulations', $data);
            case 'dress-code':
                return view('frontend.pages.academics.dress-code', $data);
            default:
                break;
        }
    }
    public function admission($type) {
        $admission_info = File::where('type', 'admission_info')->latest('updated_at')->first();
        $data = [
            'admission_info' => $admission_info,
        ];
        switch ($type) {
            case 'info':
                return view('frontend.pages.admission.info', $data);
            default:
                break;
        }
    }
    public function facilities($type) {
        switch ($type) {
            case 'science-lab':
                return view('frontend.pages.facilities.science-lab');
            case 'ict-lab':
                return view('frontend.pages.facilities.ict-lab');
            case 'library':
                return view('frontend.pages.facilities.library');
            case 'multi-media-classroom':
                return view('frontend.pages.facilities.multi-media-classroom');
            case 'qip-sms-service':
                return view('frontend.pages.facilities.qip-sms-service');
            case 'common-room':
                return view('frontend.pages.facilities.common-room');
            case 'prayer-room':
                return view('frontend.pages.facilities.prayer-room');
            default:
                break;
        }
    }
    public function gallery($type) {
        switch ($type) {
            case 'photo':
                return view('frontend.pages.gallery.photo');
            case 'video':
                return view('frontend.pages.gallery.video');
            default:
                break;
        }
    }
    public function notice() {
        return view('frontend.pages.notice.notice');
    }
    public function contact() {
        return view('frontend.pages.contact.contact');
    }
    public function acheivements() {
        return view('frontend.pages.acheivements.acheivements');
    }
}
