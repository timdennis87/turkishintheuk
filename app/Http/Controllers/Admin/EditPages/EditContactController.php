<?php

namespace App\Http\Controllers\Admin\EditPages;

use App\Http\Controllers\Controller;

use App\Maintenance;
use App\Page;
use Illuminate\Http\Request;

class EditContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewContactEditScreen()
    {
        $page    = Page::where('id', 4)->first();
        $contact = $this->getPageInformation();

        return view('admin.pages.edit.edit-contact', [
            'page'    => $page,
            'contact' => $contact
        ]);
    }

    public function getPageInformation()
    {
        return Maintenance::where('page_id', 4)->first();
    }

    public function updateEditScreen(Request $request)
    {
        $message = Maintenance::where('id', 4)->first();

        $message->update([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        return redirect()->back();
    }
}
