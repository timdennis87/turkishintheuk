<?php

namespace App\Http\Controllers\Admin\EditPages;

use App\Http\Controllers\Controller;

use App\Maintenance;
use App\Page;
use Illuminate\Http\Request;

class EditJoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewJoinEditScreen()
    {
        $page    = Page::where('id', 5)->first();
        $join = $this->getPageInformation();

        return view('admin.pages.edit.edit-join', [
            'page' => $page,
            'join' => $join
        ]);
    }

    public function getPageInformation()
    {
        return Maintenance::where('page_id', 5)->first();
    }

    public function updateEditScreen(Request $request)
    {
        $message = Maintenance::where('page_id', 5)->first();

        $message->update([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        return redirect()->back();
    }
}
