<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get("query");

        $users =
                    User::query()->where("name", "like", "%". $query . "%")->get();


        return view("search", compact("users", "query"));
    }
}


