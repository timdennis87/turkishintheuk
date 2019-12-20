<?php

namespace App\Http\Controllers\Admin\EditPages;

use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Page;
use Illuminate\Http\Request;

class EditHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewEditScreen()
    {
        $page     = Page::where('id', 2)->first();
        $sections = $this->getPageSections();

        return view('admin.pages.edit.edit-home', [
            'page'     => $page,
            'sections' => $sections
        ]);
    }

    public function getPageSections()
    {
        return Maintenance::where('page_id', 2)->get();
    }

    public function uploadImage($request)
    {
        if ($request->file('image')) {

            $fileName = $request->image->getClientOriginalName();

            $request->image->move(storage_path('/images/home'), $fileName);

        } else {

            $fileName = '';
        }

        return $fileName;
    }

    public function updateEditScreen(Request $request)
    {
        dd($request->file('image'));
        $id    = $request->id;
        $image = $this->uploadImage($request);

        $editPage = Maintenance::where('id', $id)->first();

        $editPage->update([
            'title' => $request->title,
            'image' => $image,
            'body'  => $request->body,
        ]);

        return redirect()->back();
    }
}
