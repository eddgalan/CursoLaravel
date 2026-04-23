<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $questions = Question::with('category', 'user')->latest()->get();

        return view('pages.home', ['questions' => $questions]);
    }
}
