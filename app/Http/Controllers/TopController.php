<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index() {
        $header = 'ここにタイトルが入ります';

        return view('top.index', ['header' => $header]);
    }
}
