<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campus;
use App\Course;
use App\Discuss;
use Carbon\Carbon;

class DiscussController extends Controller
{
    public function getDiscussbyCourse($id_campus, $id_course)
    {
    	$discuss=Discuss::with('fromcourse.getcampus')->where('id_course', $id_course)->where('id_campus', $id_campus)->get();
        
        return [
            'prodikudata' => $discuss,
            'success' => 1
        ];

        // $user=Identity::all()->get(['username','password']);
    	// return $user;
    }

    public function sendCommentOnDiscuss(Request $request)
    {
    	//$dt = new DateTime('now');

    	/*$current = Carbon::now();
    	$current = new Carbon();*/

        $discuss = new Discuss;
        $discuss->create([
            'comment' => $request['comment'],
            'id_campus' => $request['id_campus'],
            'id_course' => $request['id_course'],
            'nid' => $request['nid'],
        ]);

        return $request->all();
    }
}

