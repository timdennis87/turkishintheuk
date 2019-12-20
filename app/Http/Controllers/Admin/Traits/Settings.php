<?php

namespace App\Http\Controllers\Admin\Traits;

use App\Message;
use Illuminate\Http\Request;
use App\Option;

trait Settings
{
    public function viewSettingsScreen()
    {
        $mainContacts = $this->getMainContacts();
        $promotions   = $this->getPromoInformation();

        return view('admin.settings.settings', [
            'userName'     => auth()->user()->name,
            'mainContacts' => $mainContacts,
            'promotions'   => $promotions,
        ]);
    }

    public function getMainContacts()
    {
        return Option::where('type', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getPromoInformation()
    {
        return Message::where('type', 2)->get();
    }

    public function editMainContact(Request $request)
    {
        $id          = $request->id;
        $description = $request->description;

        $links = Option::where('id', $id);

        $links->update([
            'description' => $description,
        ]);

        return redirect()->back();
    }

    public function editPromotions(Request $request)
    {
        $id = $request->id;

        $promo = Message::where('id', $id);

        $promo->update([
            'name'        => $request->name,
            'description' => $request->description,
            'message'     => $request->message,
            'display'     => $request->display,
        ]);

        return redirect()->back();
    }
}