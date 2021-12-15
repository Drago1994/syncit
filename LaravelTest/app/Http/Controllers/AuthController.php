<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{

    public function login(Request $req){
        try{
            $content = json_decode($req->getContent(), true);
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln($req->input('username'));
            $username = $req->input('username');
            $password = $req->input('password');
            $users =Admin::where('username',$username)->limit(1)->get();
            if (count($users)>0){
                $admin = $users[0];
                if (Hash::check($password, $admin['password']))
                    return response()->json(['isAdmin' => true]);
                else
                    return response()->json(['isAdmin' => false]);

            }
            else
                return response()->json(['isAdmin' => false]);

        }
        catch(Exception $ex){
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln($ex);
        }

    }


}
