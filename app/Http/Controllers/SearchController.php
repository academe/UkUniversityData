<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;

class SearchController extends Controller
{
    
    // public function searchQuery(Request $request) {
    //     $results = Course::likeKeyword($request->search)->paginate(20);
    //     return view('search')->with('results', $results);
    // }

    public function searchQuery(Request $request) {

        $keywords = $request->query('search');

        $results = Course::likeKeyword($keywords)->paginate(15);

        return view('search')->with('results', $results);
    }
}
