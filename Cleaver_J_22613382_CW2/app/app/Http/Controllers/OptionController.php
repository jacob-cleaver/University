<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*
 * This calls the models into the control that extend eloquent.
 */
use App\Http\Requests;
use App\Option;
use App\Question;
class OptionController extends Controller
{

    public function __construct()
    {
    //The use of public function allows for the function to be us across the system.
        $this->middleware('auth');
        //This sets the authorisation to routes file using the middleware function
    }

    public function create($id)
    {
        $options = Option::where('q_id', '=', $id)->get();
        //This public function gets all options where 'q_id' has the same value as 'id'.
        $question = Question::find($id);
        //It also finds the question that has the same value as the 'id'.
        return view('admin/options/create', ['question' => $question, 'options' => $options]);
        //Finally, it returns the value to the view where 'admin/options/create' is the page.
    }


    public function store(Request $request, $id)
    {
    //The code here is the logic behind the storing new options.
        $option = new Option;
        //New option is generating a new instance within the database.
        $option->name = $request->name;
        //The next line sets options name to the name that was submitted from the form.
        $option->q_id = $id;
        //Next is setting the option to the specified field within the database. This is done via the use of
        //'$option->q_id = $id;'.
        $option->save();
        //This shows how the option is saved to the database.
        return redirect('admin/option/'.$id);
        //The final line of code redirects to the correct page to continue the activity process.
    }
}
