<?php

namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Http\Request;
use App\SocialLink;

trait SocialLinks
{
    public function viewSocialLinksScreen()
    {
        $socialLinks = $this->getSocialLinks();

        return view('admin.social-links.social-links', [
            'userName'    => auth()->user()->name,
            'socialLinks' => $socialLinks
        ]);
    }

    public function getSocialLinks()
    {
        return SocialLink::get();
    }

    public function editSocialLinks(Request $request)
    {
        $id  = $request->id;
        $url = $request->url;

        $links = SocialLink::where('id', $id);

        $links->update([
            'url'     => $url,
            'display' => $request->display,
        ]);


        return redirect()->back();
    }
}