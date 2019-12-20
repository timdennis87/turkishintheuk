<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Message;
use App\Review;

class HomeScreenController extends Controller
{
    public function index()
    {
        $classType    = 'no_type';
        $promotionBar = $this->getPromotionPopup();
        $mainSection  = $this->getMainTitleSection();
        $section2     = $this->getSection2();
        $section3     = $this->getSection3();
        $freeLesson   = $this->getFreeLesson();
        $reviews      = $this->getReviews();

        return view('site.home', [
            'classType'   => $classType,
            'promo'       => $promotionBar,
            'mainSection' => $mainSection,
            'section2'    => $section2,
            'section3'    => $section3,
            'freeLesson'  => $freeLesson,
            'reviews'     => $reviews,
        ]);
    }

    public function getPromotionPopup()
    {
        return Message::where('value', 'promo_bar')->first();
    }

    public function getMainTitleSection()
    {
        return Message::where('value', 'join')->first();
    }

    public function getSection2()
    {
        return Maintenance::where('value', 'section_2')->first();
    }

    public function getSection3()
    {
        return Maintenance::where('value', 'section_3')->first();
    }

    public function getFreeLesson()
    {
        return Message::where('value', 'free_lesson')->first();
    }

    public function getReviews()
    {
        return Review::inRandomOrder()->take(1)->get();
    }
}
