<?php

namespace App\Http\Controllers\Admin\Traits;

use App\Page;

trait Pages
{
    public function viewPagesScreen()
    {
        $pages = $this->getPages();

        return view('admin.pages.admin-pages', [
            'pages' => $pages
        ]);
    }

    public function getPages()
    {
        return Page::get();
    }

    public function editPage($id)
    {
        $page     = Page::find($id);
        $pageName = Page::where('id', $id)->first();

        return view('admin.pages.edit', [
            'userName' => auth()->user()->name,
            'page'     => $page,
            'pageName' => $pageName
        ]);
    }

    public function uploadPostImage($request)
    {
        if($request->file('image')) {
            $fileName = $request->image->getClientOriginalName();
            $request->image->move(public_path('/images'), $fileName);
        } else {
            $fileName = '';
        }

        return $fileName;
    }
}