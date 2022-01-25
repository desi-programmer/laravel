<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Seshac\Otp\Otp;


class AuthController extends Controller
{
    //
    public function register(Request $request){

        // validate fields
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required',
            'password' => 'required|string|confirmed',
        ]);

        // create a user
        // but encrypt the password 
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => bcrypt($fields['password']),

        ]);

        // Token
        $token = $user->createToken('SOME_TOKEN_HASH')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 200);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out',
        ];
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials',
            ], 400);
        }

        $token = $user->createToken('SOME_TOKEN_HASH')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 200);
    }

    public function profile(Request $request){
        // get user
        return $request->user();
    }
    
    // verify email for forgot password
    public function send_otp(Request $request){
        
        // validate
        $fields = $request->validate([
            'email' => 'required'
        ]);
        
        // get user email and check if the user exists
        
        $user = User::where('email', $fields['email'])->first();
        
        if(is_null($user)){
            // user doesn't exists
            $response = [
                'msg' => "User Doesn't exist !"
            ];
            return response($response, 400);
        }else{
            // user exists
            // generate OTP
            error_log($user['email']);
            $otp = Otp::generate($user['email']);
            
            // send email or whatever you want to
            
            // send it back in response
            // $response = [
                //     'otp' => $otp
                // ];
                
                // or
                $response = [
                    'otp' => $otp->token
                ];
                return response($response, 200);
            }
        }


        public function change_password(Request $request){

            // validate email and otp in body
            $fields = $request->validate([
                'email' => 'required',
                'otp' => 'required',
                'password' => 'required|confirmed'
            ]);

            // verify otp
            $verify = Otp::validate($fields['email'], $fields['otp']);

            if($verify->status){
                // otp matches
                // change password 
                $user = User::where('email', $fields['email'])->first();
                $user['password'] = bcrypt($fields['password']);
                $user->save();
                return $user;

            }else{
                $response = [
                    'msg' => "OTP Doesn't match !",
                ];
                return response($response, 400);
            }
        }

        public function update(Request $request){
        
            // update whatever user has sent
            // TODO : Cross check so that You don;t update crucial data
            $user = user::find($request->user()['id']);
            $user->update($request->all());
            return $user;

        }

        public function upload_image(Request $request){

            $request->validate(['image' => 'required|image']);

            $file = $request->file('image');
            if (!$file->isValid()) {
                return response()->json(['invalid_file_upload'], 400);
            }
            $path = public_path() . '/storage/uploads/';

            // TODO : Use uuid to generate unique names
            $file->move($path, $file->getClientOriginalName());

            // update in database
            $user = user::find($request->user()['id']);

            // path for public 
            $database_path  = '/storage/uploads/'.$file->getClientOriginalName();
            $user->update([
                'image' => asset($database_path),
            ]);
            return $user;

            // $file = $request->file('image');
            // return $file->extension();
        }

    }
    