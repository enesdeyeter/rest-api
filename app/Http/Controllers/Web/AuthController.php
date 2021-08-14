<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Token;

class AuthController extends Controller
{
    public function home(){
        return view('home');
    }

    public function pageRegister(){
        return view('auth.register');
    }

    /**
     * Kullanıcı Oluşturma
     *
     * @param [string] name
     * @param [string] email
     * @param [string] password
     * @return [string] message
     */
    public function register(Request $request)
    {
        //dd($request);

        $validated = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|string|email|unique:users",
            'password' => 'required|required_with:password_confirmation|string|confirmed|min:6'
        ]);

        if ($validated->fails()){
            return response()->json(["message" => $validated->messages()], 201);
        }

        else{
            $user = new User([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ]);

            $user->save();
            $message["status"] = "Success";
            $message["user-info"] = $user;
            return response()->json(["message" => $message], 201);
        }
    }

    public function pageLogin(){
        return view('auth.login');
    }

    /**
     * Kullanıcı Girişi ve token oluşturma
     *
     * @param [string] email
     * @param [string] password
     * @return [string] token
     * @return [string] token_type
     * @return [string] expires_at
     * @return [string] success
     */
    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            "email" => "required|string|email",
            "password" => "required|string|min:6"
        ]);

        if ($validated->fails()){
            return response()->json(["message" => $validated->messages()], 201);
        }

        else{
            //$credentials = request(["email", "password"]);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $message["token"] = $user->createToken("login")->accessToken;
                $message["token_type"] = "Bearer";
                //$message["experies_at"] = Carbon::parse(Carbon::now()->addWeeks(1))->toDateTimeString();
                $message["success"] = "Kullanıcı Girişi Başarılı";

//                return response()->json(["message" => $message],200);
                return view('home');
            }

            else {
                return response()->json(["error" => "Kullanıcı adı veya şifre hatalı"], 401);
            }
        }
    }

    public function logout(){

        if (Auth::check()){

            Auth::user()->authUserToken()->delete();
            Auth::logout();

//            return response()->json(['message'=>"başarıyla çıkış yapıldı..."],200);
            return view('home');
        }

        else {
            return response()->json(["error" => "giriş yapılamadı"], 401);
        }
    }
}
