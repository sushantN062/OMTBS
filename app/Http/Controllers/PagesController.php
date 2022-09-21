<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class PagesController extends Controller
{
    public function home(){
        $data=[
            'name'=> 'Sushant',
            'age' =>  '18'

        ];
        return view(view: 'welcome')->with($data);
    }
    public function profile(){
        $data=[
            'username'=>'SushantNepal'

        ];
        return view(view: 'profile')->WITH($data);
    }

    public function create(){
        return view(view: 'create');

    }

    public function store(Request $request){
        $student = new Student();
        $student->name =$request->name;
        $student->address =$request->address;
        $student->age =$request->age;
        $student->dob =$request->dob;
        $img =new img();

        $img = Image::make($request->file('image'));
        $filename = $request->file('image')->getOrignalClientName();
        $img->save(path: 'storage/image' . $filename);
        $student->image = $filename;
        $student->image = $filename;

        $student->save();
        return 'Saved';
    }

    public function list(){
        $students = Student::orderby('id','=','1')->get();
        return view('list')->with('students', $students);
    }

    public function edit($id){
        $student =Student::where('id',$id)->get();
        return view(view: 'update')->with('student',$student);
    }

    public function update(Request $request){
        $student = Student ::where('id',$request->id)->first();
        $student ->name =$request->name;
        $student ->address =$request->location;
        $student ->age =$request->age;
        $student ->dob =$request->dob;
        $student->save();
        return redirect(to:'/list');



    }




}
