<?php

namespace App\Http\Controllers\Admin\EditPages;

use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Page;
use Illuminate\Http\Request;

class EditAboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewEditScreen()
    {
        $page  = Page::where('id', 3)->first();
        $about = $this->getPageInformation();

        return view('admin.pages.edit.edit-about', [
            'page'  => $page,
            'about' => $about
        ]);
    }

    public function getPageInformation()
    {
        return Maintenance::where('page_id', 3)->first();
    }

    public function uploadImage($request)
    {
        if ($request->file('image')) {

            $fileName = $request->image->getClientOriginalName();

            $request->image->move(storage_path('/images/about-me'), $fileName);

        } else {

            $fileName = '';
        }

        return $fileName;
    }

    public function updateEditScreen(Request $request)
    {
        $image = $this->uploadImage($request);

        $editPage = Maintenance::where('page_id', 3)->first();

        $editPage->update([
            'title' => $request->title,
            'image' => $image,
            'body'  => $request->body,
        ]);

        return redirect()->back();
    }
}
