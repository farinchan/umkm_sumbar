<?php

namespace App\Http\Controllers\Web\Back\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public function index()
    {
        $data=[
            'menu_title' => 'File Manager',
            'title' => 'File Manager',
        ];
        return view('back.file_manager.index', $data);
    }
}
