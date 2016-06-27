<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//The models are added to the controller
use App\Http\Requests;
use App\Survey;
use App\Question;
use App\Option;
use DB;

class ResponsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()//This includes the authorisation in order to allow the responses to be seen
    {
        $this->middleware('auth');
    }
    public function index()//This function is the index page for displaying the surveys
    {
        $surveys = Survey::all();//
        return view('admin/responses/index', ['surveys' => $surveys]);//This returns the responses page for the admin
    }

    public function question_list($id)//This is for the table to see the responses
    {
        $survey = Survey::find($id);//This finds the survey with the correct id to show the responses
        $questions = Question::where('s_id', '=', $id)->get();//Here is where the questions from the chosen survey are
                                                              //found to show the responses
        return view('admin/responses/question_list', ['survey' => $survey, 'questions' => $questions]);//Again the view is return to show the responses
    }

    public function show($id)//This function is coded to show the questions and the response options for each question
    {
        $question = Question::find($id);//This finds the question via the id from the databse
        $o_array = array();//The options are placed in an array
        $r_array = array();//The responses are placed in an array
        $r_amount =array();//The response amount is also in an array
        $options = Option::where('q_id' ,'=', $id)->get();//To complete the process the options are called using the
                                                          //q_id setting it to id which is getting from the database.

        foreach($options as $option){//This foreach is pushing the options array to the database getting the option name
            array_push($o_array,$option->name);
        }

        foreach($options as $option){//This foreach is counting the responses for the options
            $count = DB::table('responses')//It has been done by counting the responses from the database table
                ->where('o_id', '=', $option->id)//The responses are called where the options id is set to the option id
                                                 //in the database
                ->count();//This is the count function for the options
            array_push($r_array,$count);//The next stage is to push the response array and the count.
        }

        $array = array($o_array, $r_array);//This is setting the value of '$array' to o_array and r_array
        $size = sizeOf($o_array);//$size is being set to the size of the options array

        return view('admin/responses/show',//The final stage is returning the view of the responses for the admin
            ['question' => $question ,//This is passing the question variable to the view
                'options' => $options,//This is passing the options variable to the view
                'r_array' => $r_array,//This is passing the response array variable to the view
                'o_array' => $o_array,//This is passing the options array to the view
                'arrays' => $array ,//This is passing the arrays variable to the view
                'size' => $size,//This is passing the size variable to the view
                'r_amount' => $r_amount]);//This is passing the response amount variable to the view
    }
}