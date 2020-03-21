<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Symfony\Component\Console\Question\Question as QuestionQuestion;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*
         * only to show result in query format we are changing view
         * other wise this works fine
         * [
         * $question= Question::latest()->paginate(5);
        return view('question.index',compact('question'));
         * ]
         * new changed function is [
         *\DB :: enableQueryLog();
        $question= Question::with('user')->latest()->paginate(10);
        view('question.index',compact('question'))->render();
        dd(\DB::getQueryLog());
         * ]
         * */
        \DB :: enableQueryLog();
        $question= Question::with('user')->latest()->paginate(10);
       return view('question.index',compact('question'));
        //dd(\DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $question= new Question();
        return view('question.create',compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        //dd('store');
        $request->user()->questions()->create($request->only('title','body'));
        return redirect()->route('question.index')->with('success','Your Question Has Been Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        $question->increment('views');
        //dd($question->body);
        return view('question.show',compact('question'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title','body'));
        return redirect('question/')->with('success',"Your Question Has Been Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('question/')->with('success','Question Deleted Successfully');
    }

    public function bal(Request $request, $id)
    {
        # code...
        //dd($id);
    }
}
