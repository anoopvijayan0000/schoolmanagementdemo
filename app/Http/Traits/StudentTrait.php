<?php
namespace App\Http\Traits;
use App\Models\Student;

trait StudentTrait {
    public function getStudentList() {
        
        $student = Student::all();
        return view('studentList')->with(compact('student'));
        //return view('welcome')->with(compact('student'));
        //return $student;
    }
    public function getTeacher()
    {
        $teacher_list = ['Katie','Max','Steffy','Joseph'];
        return $teacher_list;

    }
    public function getGender()
    {
        $gender_list = ['M','F','T'];
        return $gender_list;

    }
    public function getSubject()
    {
        $subject_list = ['Maths','Science','History'];
        return $subject_list;

    }
    public function getTerm()
    {
        $term_list = ['One','Two'];
        return $term_list;

    }

}