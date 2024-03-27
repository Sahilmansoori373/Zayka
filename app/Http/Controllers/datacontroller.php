<?php

namespace App\Http\Controllers;


 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class datacontroller extends Controller
{
    
    public function book( request $req){

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'date' => 'required',
            'time' => 'required',
            'no_of_people' => 'required|numeric',
            'message' => 'required', 
        ]);
        // $req-> validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|numeric|min:10',
        //     'date' => 'required',
        //     'time' => 'required',
        //     'no_of_people' => 'required|numeric',
        //     'message' => 'required',      
        // ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        $validator = DB::table('booking')
                    ->insert([
                        'name' => $req ->name,
                        'email' => $req ->email,
                        'phone' => $req ->phone,
                        'date' => $req ->date,
                        'time' => $req ->time,
                        'no_of_people' => $req ->no_of_people,
                        'message' => $req ->message,                ]
                    );
            if($validator){
                return redirect('/')->with('message','success');
            } 
        }

        public function conta( request $request){
            $request-> validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',      
            ]);
            $cont = DB::table('contact')
                        ->insert([
                            'name' => $request ->name,
                            'email' => $request ->email,
                            'subject' => $request ->subject,
                            'message' => $request ->message,               ]
                        );
                if($cont){
                    echo "<h1> Data Success added.</h1>";
                } 
            }
        
}
