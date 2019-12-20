<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Page;

class ServiceController extends Controller
{
    public function index()
    {
        $pageName = Page::where('id', 6)->first();
        $message  = $this->getMessage();
        $services = $this->getServices();

        return view('site.services', [
            'pageName' => $pageName,
            'message'  => $message,
            'services' => $services,
        ]);
    }

    public function getMessage()
    {
        return Maintenance::where('page_id', 6)->first();
    }

    public function getServices()
    {
        $classTypes = $this->getClassTypes();

        foreach ($classTypes as $classType) {

            $classType->services = \DB::table('class_boxes')
                ->where('class_boxes.type', $classType->id)
                ->orderBy('class_boxes.price')
                ->get();
        }

        return $classTypes;
    }

    public function getClassTypes()
    {
        return \DB::table('class_types')
            ->orderBy('class_types.id')
            ->get();
    }
}
