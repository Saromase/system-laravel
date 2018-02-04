<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemObjectSize;

class SystemCssController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function generateCss()
    {
        $sizes = SystemObjectSize::get();
        foreach ($sizes as $size) {
            echo $size->getCss(650);
        }
    }
}
