<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class RegisterController extends Controller
{
    public function index(){
        return view("register");
    }

    public function store(Request $request){
        
        $request = $request->validate([
            'name' => ['required','string','max:255'],
            'username' => ['required','string','unique:'.User::class],
            'email' => ['required','string','email:dns','lowercase', 'unique:'.User::class],
            'password' => ['required','min:8','confirmed'],
        ],[
            'name.max' =>'maksimal cahracter 255',
            'username.unique' => 'username sudah ada ',
            'email.lowercase' => 'mail harus hurf kecil',
            'email.unique'=> 'email sudah terdaftar',
            'password.min'=>'Minimal 8 character',
            'password.confirmed' => 'Maaf konfirmasi pasword salah '
        ]);

        $request['password'] = Hash::make($request['password']);
        User::create($request);
        
        return redirect()->route('login');
      
    }
}
