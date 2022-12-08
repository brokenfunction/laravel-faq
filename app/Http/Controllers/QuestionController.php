<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(10);
        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|max:255|min:15'
        ]);
        $question = new Question();
        $question->title = $request->title;
        $question->description = $request->description;
        $question->user()->associate(Auth::id());

        if ($question->save()) {
            session()->flash('message', 'Question successfully created.');
            session()->flash('class', 'success');
            return redirect()->route('questions.show', $question->id);
        } else {
            session()->flash('message', 'Something went wrong.');
            session()->flash('class', 'warning');
            return redirect()->route('questions.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        if ($question->user->id !== Auth::id()) {
            return abort(403);
        }
        return view('questions.edit')->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        if ($question->user->id !== Auth::id()) {
            return abort(403);
        }
        $this->validate($request, [
            'title' => 'required|max:255|min:15'
        ]);
        $question->title = $request->title;
        $question->description = $request->description;

        if ($question->save()) {
            session()->flash('message', 'Question successfully updated.');
            session()->flash('class', 'success');
            return redirect()->route('questions.show', $question);
        } else {
            session()->flash('message', 'Something went wrong.');
            session()->flash('class', 'warning');
            return redirect()->route('questions.edit', $question->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        if ($question->user->id !== Auth::id()) {
            return abort(403);
        }
        if ($question->delete()) {
            session()->flash('message', 'Question successfully deleted.');
            session()->flash('class', 'success');
            return redirect()->route('questions.index');
        } else {
            session()->flash('message', 'Something went wrong.');
            session()->flash('class', 'warning');
            return redirect()->route('questions.show', $question);
        }
    }
}
