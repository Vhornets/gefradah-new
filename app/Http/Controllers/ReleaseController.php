<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Release;

class ReleaseController extends Controller {
    public function index() {
        return Release::get();
    }

    public function show(Release $release) {
        return $release->load('downloads')->load('images');
    }
}
