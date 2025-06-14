<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class profileController extends Controller {

    public function userProfilePage() {
        return view('pages.dashboard.profile-page');
    }

    //get user profile
    public function userProfile(Request $request) {
        $email = $request->header('email');
        $user = User::where('email', $email)->first();

        return response()->json([
            'status'  => 'success',
            'message' => 'user profile',
            'data'    => $user,
        ], 200);
    }

    //user profile update
    public function userProfileUpdate(Request $request) {
        try {
            $email = $request->header('email');
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $mobile = $request->mobile;
            $password = $request->password;

            User::where('email', $email)->update([
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'mobile'     => $mobile,
                'password'   => $password,

            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'user profile updated successfully',
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'status'  => 'success',
                'message' => 'unable to update user profile',

            ], 500);
        }
    }
}
