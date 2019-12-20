<?php

namespace App\Http\Controllers\Admin\Traits;

use App\AdminNavigation;
use \Carbon\Carbon;

trait Dashboard
{
    public function viewDashboardScreen()
    {
        $pageInfo = $this->getPageInformation();

        return view('admin.dashboard.admin-dashboard', [
            'pageInfo' => $pageInfo
        ]);
    }

    public function getPageInformation()
    {
        return AdminNavigation::where('id', 1)->first();
    }
}