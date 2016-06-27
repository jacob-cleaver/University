<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//The relevant models have been added here
use App\Http\Requests;
use App\Survey;
use App\Question;
use App\Option;
use Session;
class SurveyController extends Controller
{

    public function __construct()//The authorisation login has been included to only allow admins to access
    {
        $this->middleware('auth');
    }

    public function index()//This is supplying the view for the survey index page
    {
        $surveys = Survey::all();//This is setting the $surveys variable to show all the surveys
        return view('admin/survey/index',['surveys' => $surveys]);//The returning of the view is carried out here
                                                                  //returning the $surveys variable
    }

    public function create()//This returns the survey create view
    {
        return view('admin/survey/create');
    }

    public function store(Request $request)//This function involves storing the surveys
    {
        $survey = new Survey;//The $survey variable is being saved as a new instance in the database
        $survey->name = $request->name;//This requested name from the form is being saved into the variable $survey
        $survey->description = $request->description;//The requested description is being saved in the $survey variable
        $survey->save();//Now that all the data has been gathered the $survey variable is saved to the database
        return redirect('admin/survey/' . $survey->id);//This is redirecting to the admin survey page
    }

    public function show($id)//This works behind the view buttons to view the selected survey
    {
        $survey = Survey::find($id);//This is finding the correct survey with the associated id in the database
        $questions = Question::where('s_id', '=', $id)->get();//This is finding the questions where the survey id is
                                                              //the same as the value passed in by the URL
        $options = Option::all();//This shows all the questions associated with the survey and filtered within the view
        $url_q = Question::where('s_id', '=', $id)->first();//This is finding the first question in a specific survey
        return view('admin/survey/show' , ['survey' => $survey , 'questions' => $questions, 'options' => $options, 'url_q' => $url_q]);//This returns the view and sends the variable to the view to be used
    }

    public function store_question(Request $request, $id)//This stores the questions in the database
    {
        $s_id = $id;//This is setting the survey id to the $id variable
        $question = new Question;//This adds a new instance to the database
        $question->name = $request->name;//This requests the question name and sets it to the $question variable
        $question->s_id = $s_id;//This is setting the question to the survey id variable ($s_id)
        $question->save();//This is saving the question to the database
        return redirect('admin/survey/' . $s_id);//Here is the redirection to the admin survey page
    }

    public function destroy($id)//This public function is the deletion of surveys
    {
        $survey = Survey::find($id);//This finds the correct survey using the $id variable
        $questions = Question::where('s_id', '=', $id);//This gathers the questions associated with the correct survey
                                                       //to be deleted
        $question = Question::where('s_id', '=', $id)->first();
        $options = Option::all();//This sets all the options to follow the action of the survey and questions

            foreach($options as $option){
                if($option->s_id == $question->id) {//This if statement is gathering the options from the survey id
                                                    //that are equal to the question ide in the database
                    $option->delete();//This deletes the option from the database.
                }
            }

        $survey->delete();//This deletes the survey
        $questions->delete();//This deletes the questions
        return redirect('admin/survey');//Once the process is deleted correctly the page will be directed to the My
                                        //Surveys page
    }
}
