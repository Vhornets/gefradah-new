<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialLink;

class SocialLinkController extends Controller {
    public function index() {
        return SocialLink::get();
    }
}
