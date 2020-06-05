<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class WelcomeController extends Controller
{
    public function index(){
    	return view('welcome');

    }

    public function getQuestions(){

    	$questions = Question::orderBy('id', 'desc')->get();
    	 return response()->json($questions , 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE); 

    	//return response()->json(['h'=>date("d-m-Y H:i:s")]);

    	//echo date("d-m-Y H:i:s");

    }
    public function createQuestion(Request $request){

		    $newQuestion = new Question();
		    $newQuestion->user_id = 1;
		    $newQuestion->question =  $request->question;
		    $newQuestion->save();
		    return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
