<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\Dashboard;
use App\Http\Controllers\Admin\Traits\Pages;

use App\AdminNavigation;
use App\Http\Controllers\Admin\Traits\Reviews;
use App\Http\Controllers\Admin\Traits\Settings;
use App\Http\Controllers\Admin\Traits\SocialLinks;
use App\Http\Controllers\Controller;
use App\Option;

class NavigationController extends Controller
{
    use Dashboard,
        Pages,
        SocialLinks,
        Settings,
        Reviews;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayNavigation()
    {
        $siteName   = $this->getWebsiteName();
        $navigation = $this->getNavigation();
        $actionBtns = $this->getActionButtons();

        View::share('admin.admin-navigation', [
            'siteName'   => $siteName,
            'name'       => auth()->user()->name,
            'navigation' => $navigation,
            'actionBtns' => $actionBtns,
        ]);
    }

    public function getWebsiteName()
    {
        return Option::where('value', 'site_name')->value('description');
    }

    public function getNavigation()
    {
        return AdminNavigation::where('display', 1)
            ->orderBy('display_order', 'asc')
            ->get();
    }

    public function getActionButtons()
    {
        return Option::whereIn('id', [1, 2])
            ->orderBy('id', 'asc')
            ->get();
    }
}
