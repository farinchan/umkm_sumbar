<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $data=[
            'menu_title' => 'Manajemen',
            'title' => 'Dashboard',
        ];
        return view('back.dashboard.index', $data);
    }

    public function information(Request $request)
    {
        $data = [
           'menu_title' => 'Information',
           'setting_website' => SettingWebsite::first(),
        ];
        return view('back.dashboard.information', $data);
    }
}
