<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentCreate(){
        return view('pages.student.studentCreate');
    }
    public function studentCreatesubmitted(Request $request){
        $validate = $request ->validate([
            'name'=>'required',
            'id'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]); 
        return "Ok";
    }
    public function studentlist(){
        $studen = array();
        for($i=0; $i<10; $i++){
            $student= array(
                "name"=>"Student".($i+1),
        "id"=>"00".($i+1),
        "dob" => "1-1-" .($i+1),       
        );
        $students[]= (object)$student;
        } 
        return view('pages.student.list')->with('students',$students) ;
    } 
}
