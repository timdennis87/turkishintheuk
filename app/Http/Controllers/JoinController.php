<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Message;
use App\Page;

class JoinController extends Controller
{
    public function index()
    {
        $pageName    = Page::where('id', 5)->first();
        $joinMessage = $this->getJoinMessage();
        $classLevels = $this->getClassLevels();

        return view('site.join', [
            'pageName'    => $pageName,
            'joinMessage' => $joinMessage,
            'classLevels' => $classLevels
        ]);
    }

    public function getJoinMessage()
    {
        $joinType = $_GET['type'];

        if($joinType == 'join'){
            $join =  Maintenance::where('page_id', 5)->first(['title', 'body']);
        } else {
            $join = Message::where('value', $joinType)->first(['message']);
        }

        return $join;
    }

    public function getClassLevels()
    {
        return \DB::table('class_levels')->get();
    }
}
