<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register_fx(Request $data) {
        $dbuser = new User;
        $dbuser->name = $data->input('name');
        $dbuser->email = $data->input('mail');
        $dbuser->password = Hash::make($data->input('pass'));
        $dbuser->save();
        return $dbuser;
    }

    function login_fx(Request $data) {
        $dbuser = User::where('email',$data->mail)->first();
        if (!$dbuser || !Hash::check($data->pass, $dbuser->password)) {
            return response([
                'error' => ['Cross Check Email or Password']
            ]);
        }
        return $dbuser;
    }
}
