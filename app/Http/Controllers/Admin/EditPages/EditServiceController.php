<?php

namespace App\Http\Controllers\Admin\EditPages;

use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Page;
use App\ClassType;
use App\ClassBox;
use Illuminate\Http\Request;

class EditServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewServiceEditScreen()
    {
        $page        = Page::where('id', 6)->first();
        $message     = $this->getMessage();
        $classTypes  = $this->getClassTypes();
        $classes     = $this->getClasses();
        $classLevels = $this->getClassLevels();

        return view('admin.pages.edit.edit-service', [
            'page'        => $page,
            'message'     => $message,
            'classTypes'  => $classTypes,
            'classes'     => $classes,
            'classLevels' => $classLevels
        ]);
    }

    public function getMessage()
    {
        return Maintenance::where('page_id', 6)->first();
    }

    public function getClassTypes()
    {
        return ClassType::orderBy('id')->get();
    }

    public function getClasses()
    {
        return ClassBox::join('class_types', 'class_types.id', '=', 'class_boxes.type')
            ->orderBy('class_types.id')
            ->orderBy('class_boxes.price')
            ->get([
                'class_types.class_type',
                'class_boxes.id',
                'class_boxes.name',
                'class_boxes.description',
                'class_boxes.price',
                'class_boxes.type',
            ]);
    }

    public function getClassLevels()
    {
        return \DB::table('class_levels')->orderBy('id')->get();
    }

    public function editMessage(Request $request)
    {
        $message = Maintenance::where('page_id', 6);

        $message->update([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        return redirect()->back();
    }

    public function editClassType(Request $request)
    {
        $id = $request->id;

        $class_type = ClassType::where('id', $id);

        $class_type->update([
            'class_type' => $request->class_type,
        ]);

        return redirect()->back();
    }

    public function editClass(Request $request)
    {
        $id = $request->id;

        $class = ClassBox::where('id', $id);

        $class->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'type'        => $request->type,
        ]);

        return redirect()->back();
    }

    public function newClassType(Request $request)
    {
        $class_type = $request->class_type;

        ClassType::create([
            'class_type' => $class_type,
        ]);

        return redirect()->back();
    }

    public function newClass(Request $request)
    {
        ClassBox::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'type'        => $request->type,
        ]);

        return redirect()->back();
    }
}
