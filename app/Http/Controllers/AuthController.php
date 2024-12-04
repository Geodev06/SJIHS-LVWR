<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function save(Request $request)
    {
        try {
            $user_model = new User();
            $validator = Validator::make($request->all(), $user_model->rules);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 200);
            }

            DB::beginTransaction();

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('Default@123'),
                'role' => User::where('role', USER_ADMIN)->count() <= 0 ? USER_ADMIN : USER_TEACHER,
                'sex' => $request->sex,

            ]);
            DB::commit();

            return response()->json([
                'success' => true,
                'msg' => 'User has been created.',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'errors' => $th->getMessage(),
            ], 500);
        }
    }

    public function auth(Request $request)
    {
        try {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'email' => 'required|email', // Ensure the email is provided and valid
                'password' => 'required', // Ensure the password is provided and at least 6 characters
            ]);

            // If validation fails, return a response with the validation errors
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 200);
            }

            // Check if the user exists in the database
            $user = User::where('email', $request->email)->first();

            // If the user is not found, return an error message
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'errors' => 'User not found.',
                ], 404);
            }

            // Attempt to log the user in using the provided password
            if (Hash::check($request->password, $user->password)) {
                // If password is correct, authenticate the user
                Auth::login($user);
                return response()->json([
                    'success' => true,
                    'msg' => 'Login successful.',
                    'link' => route('admin.dashboard')
                ], 200);
            } else {
                // If the password is incorrect, return an error
                return response()->json([
                    'success' => false,
                    'errors' => 'Invalid credentials.',
                ], 401);
            }
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'errors' => $th->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Optionally, invalidate the session (if needed, depending on the application context)
        session()->invalidate();
        session()->regenerateToken();

        // Return a success response after logout
        return response()->json([
            'success' => true,
            'message' => 'User successfully logged out.',
            'redirect' => route('login')
        ], 200);
    }

    public function forbidden()
    {
        return view('error.forbidden');
    }
}
