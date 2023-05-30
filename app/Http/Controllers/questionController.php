<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class questionController extends Controller
{
    public function question(){
        return view('question.question');
    }
}
