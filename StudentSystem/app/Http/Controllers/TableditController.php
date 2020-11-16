<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class TableditController extends Controller
{
    //
     public function index() {
       $data = Db::table('students')->get(); 
       $classid = DB::select('select id from classrooms');
       return view('studentUpdate',['data'=>$data,'classid'=>$classid]); 
    }
    
     function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'first_name'	=>	$request->first_name,
    				'last_name'		=>	$request->last_name,
    				'classroom_id'		=>	$request->classroom_id
    			);
    			DB::table('students')
    				->where('id', $request->id)
    				->update($data);
    		}
    		
    		return response()->json($request);
    	}
    }
}

