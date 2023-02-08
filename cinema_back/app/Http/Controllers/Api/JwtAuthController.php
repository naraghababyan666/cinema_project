<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewUser;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;


class JwtAuthController extends Controller
{
//    public $token = true;

    public function sendCode(Request $request)
    {
        if ($request->email) {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['errors' => ['login' => 'Неверные учетные данные',]], 401);
            }

//            $token = Token::create(['user_id' => $user->id]);
//            dd($token);
            $min = pow(10, 5);
            $max = $min * 10 - 1;
            $code = mt_rand($min, $max);
            $token = User::where('email', $user->email)->update(['password' => bcrypt($code)]);
            if($token){
                if ($user->sendEmail($code, $user)) {
                    return response()->json(['message' => 'Code is sent vie email'], 200);
                }
            }
        }
//        else {
//            $user = User::where([
//                'country_code' => $request->code,
//                'phone' => $request->phone
//            ])->first();
//
//            if (!$user) {
//                return response()->json(['errors' => ['login' => 'Неверные учетные данные',]], 401);
//            }
//
//            $token = Token::create(['user_id' => $user->id]);
//
//            // return $token->sendSms();
//
//            if ($token->sendSms()) {
//                return response()->json(['message' => 'Code is sent vie sms'], 200);
//            }
//        }

        return response()->json(['error' => "Error while sending sms"], 424);
    }

    public function login(Request $request)
    {
        if ($request->email) {
            $validator =  Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            if (! $token = auth()->attempt($validator->validated())) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
//            if (! $token = JWTAuth::fromUser($user)) {
//                return response()->json(['error' => 'Unauthorized'], 401);
//            }
            return $this->createNewToken($token);
        }
//        else {
//            $validator =  Validator::make($request->all(), [
//                'code' => 'required',
//                'phone' => 'required',
//                'sms' => 'required'
//            ]);
//            $user = User::where([
//                'country_code' => $request->code,
//                'phone' => $request->phone
//            ])->first();
//            if ($validator->fails()) {
//                return response()->json(['errors' => $validator->errors()], 422);
//            }
//        }
//        $checkCode = Token::where('user_id', $user->id)->latest()->first();
//        $checkCode->used = 1;
//        $checkCode->save();
//        DB::table('tokens')->where('id', $checkCode->id)->update(['used'=>$checkCode->used]);
//        if(Hash::check($user->email, $user->password)){
//            $password = Hash::make($user->email);
//        }
//        if (!($token = auth()->attempt(['email' =>  $request->email]))) {
//            dd(1);
////            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//        dd($token);
//        $jwt_token = $this->createNewToken($token);
//        dd($jwt_token);
//        if ($token->isValid() && $token->code == $request->sms) {
//            $jwt_token = JWTAuth::fromUser($user);
//            $token->used = true;
//        }
//
//        if (!$jwt_token) {
//            return response()->json([
//                'success' => false,
//                'errors' => [
//                    'sms' => 'Неверный код'
//                ],
//            ], 401);
//        }
//        Auth::login($user);
//        return response()->json([
//            'success' => true,
//            'token' => $jwt_token,
//            'user' => Auth::user(),
//        ]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        try {
            JWTAuth::manager()->invalidate(new \Tymon\JWTAuth\Token($request->token));
            // JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {

            return response()->json([
                'success' => false,
                'message' => 'The user could not log out'
            ], 500);
        }
    }

    public function getUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }
    public function checkAuth(Request $request){
        dd($request);
    }
    public function register(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'country_code' => 'required|numeric',
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if($request->role_id == 'cinema'){
            $request['role_id']=6;
            $request['percent'] = 50;
        }else{
            $request['role_id']=4;
            $request['percent'] = 25;
        }
        $user = User::create($request->all());

        if(!$user){
            return response()->json(['errors' => 'User was not created'], 500);
        }

        Mail::to($user->email)->send(new NewUser($user));
        if (! $token = JWTAuth::fromUser($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => auth()->user()
        ]);
    }
}
