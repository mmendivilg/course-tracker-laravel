<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Validations\User\UserSignUpValidation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    'errors' => [
                        'password' => __('auth.failed')
                    ]
                ], 401);
        }

        $nombreToken = Str::random(10);

        $token = $user->createToken($nombreToken)->plainTextToken;
        return response()->json([
            "token" => $token,
            'user' => $request->email, 
            'name' => $user->name, 
            "abilities" => ['*']]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => __('auth.logout_success'),
        ]);
    }

    public function register(Request $request)
    {
        try {
            $validation = new UserSignUpValidation( null, $request->all() );
            if( $validation->fails() ) {
                return response()->json(array('errors' => $validation->errors() ), 400);
            }

            $user = new User();
            $user->email = mb_strtolower($request->email);
            $user->name = mb_strtoupper($request->name);
            $user->password = Hash::make($request->password);
            $user->save();

            $user = User::find($user->id);

            return $user;
        } catch (\Exception | \Throwable | \Error $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}