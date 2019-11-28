<?php

namespace App\Http\Controllers\Snippets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Snippet, Step};

class StepController extends Controller
{
    public function update(Snippet $snippet, Step $step, Request $request) {

        $step->update($request->only('title', 'body'));
    }
}
