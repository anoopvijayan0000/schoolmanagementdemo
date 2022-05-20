<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\StudentTrait;
use App\Models\Student;
//use View;

class StudentController extends Controller
{
    //
    use StudentTrait;

    function addStundent(Request $req)
    {
        
        $student = new Student;

        $student->name = $req->name;
        $student->gender = $req->gender;
        $student->age = $req->age;
        $student->reporting_teacher = $req->reporting_teacher;
        $student->save();
        //return view('addStundent')->with('message', 'Sudent Added!');
        return redirect()->back()->with('success', 'Saved!'); 

    }
    function updateStudent(Request $req)
    {

        $id = $req->id;
        $student = Student::find($id);
        $student->name = $req->name;
        $student->gender = $req->gender;
        $student->age = $req->age;
        $student->reporting_teacher = $req->reporting_teacher;
        $student->save();
        return redirect()->back()->with('success', 'Updated!'); 

    }

    
    public function editStudentList(Request $req)
    {

        $id = $req->id;
        $student = Student::find($id);
        //return View::make('createEditStudent')->with('student', $student);
         return view('editStudent',['student'=> $student,'teachers'=>$this->getTeacher(),'gender'=>$this->getGender()]);


    }
    public function deleteStudent(Request $req)
    {
        $id = $req->id;
        Student::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted! :'.$id); 
        
    }
    public function createStudent()
    {
        /*return View::make('createEditStudent')->with(['student'=>$student,'teacher'=>$this->getTeacher()]);*/
          return view('createEditStudent',['student'=> [],'teachers'=>$this->getTeacher(),'gender'=>$this->getGender()]);
    }
    public function createMark()
    {
       
          return view('addEditMark',['studentlist'=>$this->getStudent(),'term'=>$this->getTerm(),'subject'=>$this->getSubject()]);
    }
    public function getStudent()
    {

        $users = Student::select('id', 'name')->get();
        return $users;
    }

    //addMark

    
  


}
