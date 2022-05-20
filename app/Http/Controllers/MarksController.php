<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\StudentTrait;
use App\Models\Student;
use App\Models\Studentmarks;
//use View;

class MarksController extends Controller
{
    use StudentTrait;
    function addMark(Request $req)
    {
        
        $marks = new Studentmarks;

        $marks->student_id = $req->student_id;
        $marks->subject = $req->subject;
        $marks->term = $req->term;
        $marks->total_mark = $req->total_mark;
        $marks->save();
        //return view('addStundent')->with('message', 'Sudent Added!');
        return redirect()->back()->with('success', 'Saved!'); 

    }
    public function getMarkList() {
        
        $mstudent = Studentmarks::all();
        
       /*$mstudent = Studentmarks::select('SELECT `student_id`, `term`, sum(`total_mark`) as total,students.name FROM studentmarks  LEFT JOIN students ON studentmarks.student_id = students.id GROUP BY studentmarks.term, studentmarks.student_id')->get();*/

       /*$mstudent = Studentmarks::select( Studentmarks::raw('SELECT `student_id`, `term`, sum(`total_mark`) as total,students.name FROM studentmarks  LEFT JOIN students ON studentmarks.student_id = students.id GROUP BY studentmarks.term, studentmarks.student_id') );
     */
       $data = [];
       foreach($mstudent  as $val)
       {
        $data[$val->student_id][$val->term][] = array('total'=>$val->total_mark,'created_at'=>$val->created_at,'name'=>$this->getStudentName($val->student_id),'subject'=>$val->subject);
       }
        return view('markList',['student'=> $data]);
    }
    public function getStudentName($id)
    {

        //return Student::select('name')->where('id',$id)->get();
        return Student::where('id', $id)->pluck('name')->toArray()[0];

    }
     public function deleteMarkList(Request $req)
    {
        $id = $req->id;
        Studentmarks::where('student_id', $id)->delete();
        return redirect()->back()->with('success', 'Deleted! :'.$id); 
        
    }
      public function editMarkList(Request $req)
    {

        $id = $req->id;
        $student = Student::find($id);

       /* $result = Studentmarks::select('subject','term','total_mark')->where('id', 1)->get();*/

       $result = Studentmarks::select('studentmarks.*','students.name')->join('students', 'students.id', '=', 'studentmarks.student_id')->where('studentmarks.student_id',  $id )->get();

         return view('addEditMark',['editresult'=>$result,'student'=> $student,'studentlist'=>$this->getStudent(),'term'=>$this->getTerm(),'subject'=>$this->getSubject()]);


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
    function updateMark(Request $req)
    {

        $id = $req->id;
        $marks = Studentmarks::find($id);
        $marks->student_id = $req->student_id;
        $marks->subject = $req->subject;
        $marks->term = $req->term;
        $marks->total_mark = $req->total_mark;
        $marks->save();
        return redirect()->back()->with('success', 'Updated!'); 

    }



}

