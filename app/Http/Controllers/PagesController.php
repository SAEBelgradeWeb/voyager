<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class PagesController extends Controller
{
    public function page()
    {
        $slug = request()->segment(1);

        $page = Page::where('slug', $slug)->first();

        return view('page', compact('page'));
    }
}
