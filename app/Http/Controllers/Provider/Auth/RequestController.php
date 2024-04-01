<?php

namespace App\Http\Controllers\Provider\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider_licence;
use App\Http\Requests\EmpRequest ;

class RequestController extends Controller
{
    public function join(EmpRequest $request){
        // dd('jjjj');

        $req=Provider_licence::create($request->validated());

       return response()->json(['message'=>"your request has recivied "],200);



    }
}
