<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Users;
use App\Identity;
use App\Dummy;

class UserController extends Controller
{
    
    public function __construct()
    {
    
        // kalau mau get user harus login dulu

        $this->middleware('auth', array('only'=>array('afterLogin')));
        // $this->middleware('auth', array('except'=>array('gettoken')));
    }

    public function gettoken()
    {
        $token = ['token' => csrf_token()];
        
        return [
            'prodikudata' => [$token],
            'success' => 1
        ]; 
    }

    // show user
    public function index()
    {
    	$user=Users::with('identity')->get();
        
        return [
            'prodikudata' => $user,
            'success' => 1
        ];

        // $user=Identity::all()->get(['username','password']);
    	// return $user;
    }

    /*public function login(Request $request)
    {
        //$login = new User;

        $username = $request->username;
        $password = bcrypt($request->password);

        // $login->getbyusername($username);

        $user=Users::where('username', $username)->with('identity')->get();
        
        return [
            'prodikudata' => $user,
            'success' => 1
        ];

        //return $login;
    }*/

    public function afterLogin()
    {
        $user = \Auth::user();
        
        return [
            'prodikudata' => array($user),
            'success' => 1
        ];
    }

    public function jancuk(Request $request)
    {
        $register = new Dummy;
        $register->create([
            'username' => $request['username'],
            'password' => $request['password'],
        ]);

        return $request->all();
    }

    public function register(Request $request)
    {

        $nid = uniqid();

        $register = new User;
        $register->create([
            'nid' => $nid,
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'type' => $request['type'],
        ]);

        /*$createidentity = new Identity;
        $createidentity->create(
            $request->only([
                'nid', 'name', 'sex', 'address',
                ])
        );*/

        $createidentity = new Identity;
        $createidentity->create([
            'nid' => $nid,
            'name' => $request['name'],
            'sex' => $request['sex'],
            'address' => $request['address'],
        ]);

        return $request->all();
    }

    // public function getbynid($nid, Request $request)
    // {
    // 	$user=Users::where('nid', 'like', $nid.'%')->with('identity')->get();

    // 	if(sizeof($user)<1)
    // 	{
    // 		return $request->json(['response'=>'Data not found!']);
    // 	}

    // 	return $user;
    // }


    public function getbynid($nid)
    {
    	$user=Users::where('nid', 'like', $nid.'%')->with('identity')->get();

    	if(sizeof($user)<1) // get array length
    	{
    		return json_encode(['response'=>'Data not found!']);
    	}

    	return [
            'prodikudata' => $user,
            'success' => 1
        ];
    }

    public function getbyname($name)
    {
    	$identity=Identity::where('name', 'like', '%'.$name.'%')->with('user')->get();
    	
        return [
            'prodikudata' => $identity,
            'success' => 1
        ];
    }

    public function getbyusername($username)
    {
        $user=Users::where('username', $username)->with('identity')->get();
        
        return [
            'prodikudata' => $user,
            'success' => 1
        ];
    }

    public function getbyusertype($type)
    {
        $user=Users::where('type', $type)->with('identity')->get();
        
        return [
            'prodikudata' => $user,
            'success' => 1
        ];
    }
}
