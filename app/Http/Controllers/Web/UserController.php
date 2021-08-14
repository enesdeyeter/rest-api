<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request){
        $user = Auth::user();

        $message["success"] = $user;
        return response()->json(["message" => $message], 201);
    }
}
