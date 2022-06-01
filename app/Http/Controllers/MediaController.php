<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function store(Request $request) {
        $name = $request->file('media')->getClientOriginalName();
        $extension = $request->file('media')->getClientOriginalExtension();
        $size = $request->file('media')->getSize();

    }
}
