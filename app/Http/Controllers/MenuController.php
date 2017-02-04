<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller {
    public function index() {
        return Menu::get();
    }

    public function show(Menu $menu) {
        return $menu;
    }
}
