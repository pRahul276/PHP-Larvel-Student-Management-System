<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //Manually create aschhol
//    public function index() {
//          $school = new School;
//          $a = $school->name;
//          if ($a==""){
//            $a = "RV";  
//          }
//          $school->name=$a;
//          $school->save();
//          return view('ss');
//    }
    
    public function createSchool() {
         $schoolname = DB::select('select name from schools'); 
         return view('school',['schoolname'=>$schoolname]);
    }
    
    public function schoolCreate(request $req) {
       $schoolName = $req ->input('schoolname');
       DB::insert('insert into schools(id,name) values (?,?)',[null, $schoolName]);
       return view('home');
    } 
    
    
    public function createClass() {
         return view('class');
    }
    
//    public function getSchoolID() {
//        
//        $schoolid = DB::select('select id from schools');     
//        return View('class',['schoolid'=>$schoolid]);
//        //return $schoolid;
//       // print_r($schoolid);
//       // return School::all();     
//    }
    
    public function all() {
        
        $ci = DB::table('classrooms')->select('name')->addSelect('school_id')->get();
         $schoolid = DB::select('select id from schools');    
        return View('class',['ci'=>$ci,'schoolid'=>$schoolid]);
  
    }
     public function classCreate(request $req) {
       $className = $req ->input('classname');
       $schoolid = $req ->input('schoolID');
       DB::insert('insert into classrooms(id,name,school_id) values (?,?,?)',[null, $className, $schoolid]);
       return view('home');
    }
    
    
    public function createStudent() {
     return view('student');
    }
    
    public function getClassID() {    
    $classid = DB::select('select id from classrooms'); 
    
    $studentNumber = DB::select('select student_number from students'); 
    return View('student',['classid'=>$classid,'studentNumber'=>$studentNumber]);  
    }
    
    
    public function studentCreate(request $req) {
       $studentNumber = $req ->input('studentNumber');
       $studentFirstName = $req ->input('studentFirstName');
       $studenLastName = $req ->input('studentLastName');
       $classid = $req ->input('classID');
       DB::insert('insert into students(id,student_number,first_name,last_name,classID) values (?,?,?,?,?)',
                  [null, $studentNumber, $studentFirstName, $studenLastName,$classid]);
       return view('home');
    }
    
    public function updateStudent(){
       $classid = DB::select('select id from classrooms'); 
       return view('studentUpdate',['classid'=>$classid]); 
    }
}
