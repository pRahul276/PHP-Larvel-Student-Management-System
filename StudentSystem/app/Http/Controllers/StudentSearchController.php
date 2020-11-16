<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentSearchController extends Controller
{
    //
    public function index(){
                return View('studentSearch');  

    }
    public function getStudent(request $req) {
        $firstname = $req ->input('firstname');
        $data = DB::table('students')->select('*')->where('first_name',$firstname)->get(); 
         
        return View('studentSearch', ['data'=>$data]);  
          
    }
}
