<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubsUser;

class SubsUserController extends Controller
{
    public function index()
    {
        return SubsUser::all();
    }
    
    public function store(Request $request)
    {
        $user = SubsUser::create($request->all());

        return response()->json($user, 201); 
    }
}
