<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller {
    public function index() {
        return Page::get();
    }

    public function show($slug) {
        return Page::where('slug', $slug)->first();
    }
}
