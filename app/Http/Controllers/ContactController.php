<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Option;
use App\Page;

class ContactController extends Controller
{
    public function index()
    {
        $pageName     = Page::where('id', 4)->first();
        $message      = $this->getMessage();
        $mainContacts = $this->getMainContacts();

        return view('site.contact', [
            'pageName'     => $pageName,
            'message'      => $message,
            'mainContacts' => $mainContacts
        ]);
    }

    public function getMessage()
    {
        return Maintenance::where('page_id', 4)->first();
    }

    public function getMainContacts()
    {
        return Option::where('type', '1')
            ->orderBy('id', 'desc')
            ->get([
                'name',
                'description',
                'class'
            ]);
    }
}
