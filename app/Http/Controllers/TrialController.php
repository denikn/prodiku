<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Trial;

use App\Result;

class TrialController extends Controller
{
    public function index()
    {
    	$trial=Trial::with('result')->get();

    	//library[title] = {"foregrounds" : foregrounds,"backgrounds" : backgrounds};

        return [
            'prodikudata' => $trial,
            'success' => 1
        ];
    }

    public function getTrialByNid($nid)
    {
        $trial=Trial::with('result')->where('nid', $nid)->get();

        //library[title] = {"foregrounds" : foregrounds,"backgrounds" : backgrounds};

        return [
            'prodikudata' => $trial,
            'success' => 1
        ];
    }

    public function postTrial(Request $request)
    {
        
        $getIdTry = Trial::with('result')->max('id_t');
        $idTry = $getIdTry+1;

    	$score = 0;

    	$getkey = $request['keys'];
    	$getans = $request['answ'];

        $trial = new Trial;
        $trial->create([
            'subject' => $request['subject'],
            'keys' => $getkey,
            'answ' => $getans,
            'nid' => $request['nid'],
        ]);

    	/*$getkey=Trial::all()->lists('keys');
    	$getans=Trial::all()->lists('answ');*/
        
        for($x=2; $x<=20; $x+=2)
        {
        	if(((substr($getans, $x, 1))==(substr($getkey, $x, 1))))
        	{
        		$score = $score+4;
        	} else
        	if(substr($getans, $x, 1)=="_")
        	{
        		$score = $score+0;
        	} else
        	{
        		$score = $score-1;
        	}

        	$countscore = ($score/40)*100;
        }

        $result = new Result;
        $result->create([
            'result' => $countscore,
            'id_t' => $idTry,
            'nid' => $request['nid'],
        ]);

        return $request->all();
    }
}
