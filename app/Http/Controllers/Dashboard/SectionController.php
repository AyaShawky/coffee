<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $sections = Section::when($request->search, function ($query) use ($request){
           return $query->where('name','like','%'.$request->search.'%')
               ->orWhere('description','like','%'.$request->search.'%');
        })->latest()->paginate(50);
        return view('dashboard.sections.index',compact('sections'));
    }

    public function create()
    {
        return view('dashboard.sections.create');
    }

    public function store(SectionRequest $request)
    {
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extention = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_' .time(). '.' .$extention;
        $path = $request->file('image')->storeAs('public/section_images',$fileNameToStore);


        $section = new Section();
        $section->name =$request->name;
        $section->description = $request->description;
        $section->image = $fileNameToStore;
        $section->save();

        return redirect()->route('dashboard.sections.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $section = Section::find($id);
        return view('dashboard.sections.edit',compact('section'));
    }

    public function update(SectionUpdateRequest $request, $id)
    {
        $section = Section::find($id);

        if ($request->hasFile('image')){
            Storage::disk('local')->delete('public/section_images/'.$section->image);
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_' .time(). '.' .$extention;
            $path = $request->file('image')->storeAs('public/section_images',$fileNameToStore);
        }else{
            $fileNameToStore = $section->image;
        }

        $section->name =$request->name;
        $section->description = $request->description;
        $section->image = $fileNameToStore;

        $section->save();
        return redirect()->route('dashboard.sections.index');
    }

    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect()->route('dashboard.sections.index');
    }
}
