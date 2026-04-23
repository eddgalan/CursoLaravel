<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * @return Factory|\Illuminate\Contracts\View\View|View
     */
    public function show(Question $question)
    {
        $question->load('answers', 'category', 'user');
        return view('questions.show', compact('question'));
    }
}
