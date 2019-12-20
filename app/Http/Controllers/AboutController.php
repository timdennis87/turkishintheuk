<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Page;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $pageName = Page::where('id', 3)->first();
        $about    = $this->getAboutMeInformation();

        return view('site.about', [
            'pageName' => $pageName,
            'about'    => $about
        ]);
    }

    public function getAboutMeInformation()
    {
        return Maintenance::where('page_id', 3)->first();
    }
}