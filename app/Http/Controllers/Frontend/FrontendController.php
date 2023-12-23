<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home() {
        return view('frontend.pages.home.home');
    }

    public function aboutUs($type) {
        switch ($type) {
            case 'glance':
                return view('frontend.pages.about-us.glance');
            case 'history':
                return view('frontend.pages.about-us.history');
            case 'why':
                return view('frontend.pages.about-us.why');
            default:
                break;
        }
    }
    public function administrations($type) {
        switch ($type) {
            case 'governing-body':
                return view('frontend.pages.administrations.governing-body');
            case 'principal-message':
                return view('frontend.pages.administrations.principal-message');
            case 'teaching-staff':
                return view('frontend.pages.administrations.teaching-staff');
            default:
                break;
        }
    }
    public function academics($type) {
        switch ($type) {
            case 'results':
                return view('frontend.pages.academics.results');
            case 'rules-and-regulations':
                return view('frontend.pages.academics.rules-and-regulations');
            case 'dress-code':
                return view('frontend.pages.academics.dress-code');
            default:
                break;
        }
    }
    public function admission($type) {
        switch ($type) {
            case 'info':
                return view('frontend.pages.admission.info');
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
