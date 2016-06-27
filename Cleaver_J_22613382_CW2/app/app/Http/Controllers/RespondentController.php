<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Survey;
use App\Question;
use App\Option;
use App\Response;
//All of the models for accessing the database have been included here
class RespondentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id , $q_id) //This is targeting the index page for the respondents
    {
        $survey = Survey::find($id); //This finds the survey id to display the correct survey on the index page
        $questions = Question::where('s_id','=', $id)->count();
        $question = Question::findOrFail($q_id); //This statement simply finds or fails finding the question for
                                                 //the survey using the q_id
        $options = Option::all(); //Fetching all the options for the questions is done via this code
        return view('Respondents/index', ['survey' => $survey, 'question' => $question, 'questions' => $questions, 'options' => $options]);//The return view for the respondents index page included the survey, question and options
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id, $q_id) //The request is present in the form and it calling the $id
                                                         //and $q_id
    {
        $s_id = $id; //This sets the survey id ($s_id) to variable $id coming from the URL
        $response = new Response; //This creates a new instance in the database for the response
        $response->o_id = $request->o_id; //The response to the option id (o_id) is set to the request for o_id
        $response->save(); //This is saving the response to the database
        return redirect("Respondents/$s_id/" . $q_id = $q_id +1); //This cycles through the questions and options for
                                                                  //the respondent
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $question_id) //The public function store focuses on storing the
                                                               //responses in the database
    {
       $survey_id = $id; //This sets the $survey_id to $id
        $response = new Response; //Again this creates a new instance in the database
        $response->o_id = $request->o_id;
        $response->save(); //The response to the option id (o_id) is set to the request for o_id
        return redirect("respondent/$survey_id/" . $question_id = $question_id +1); //This cycles through to go to the
                                                                                    //next question
    }
}
