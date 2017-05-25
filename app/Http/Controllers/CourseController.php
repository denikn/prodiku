<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campus;
use App\Course;
use App\Criteria;
use App\ChoiceCourse;
use App\ScoreCourse;

class CourseController extends Controller
{
    public function index()
    {
    	$course=Campus::with('course.criteria.authorCriteria')->get();

    	return $course;
    }

    public function getFavProdi()
    {
        $course=ScoreCourse::with('reverse_course.getcampus')->orderBy('score', 'desc')->take(5)->get();

        return [
            'prodikudata' => $course,
            'success' => 1
        ];
    }

    // -----------------------------------------------------------------------
    // PAGE INFO PRODI

    public function infoCampus()
    {
    	$info=Campus::with('course')->get();

    	/*$sci=Course::where('type', 'like', 'science')->with('campus')->get();
    	$cntsci=count($sci);

    	$soc=Course::where('type', 'like', 'social')->with('campus')->get();
    	$cntsoc=count($soc);*/

    	if(sizeof($info)<1) // get array length
    	{
    		return json_encode(['response'=>'Data not found!']);
    	}

    	return [
            'prodikudata' => $info,
/*            'count_science' => $cntsci,
            'count_social' => $cntsoc,*/
            'success' => 1
        ];
    }

    public function listProdi($id_campus, $type)
    {
    	$list=Course::where('id_campus', 'like', $id_campus)->where('type', 'like', $type)->get();

    	return [
            'prodikudata' => $list,
            'success' => 1
        ];
    }

    public function prodiCriteria($id_course)
    {
    	$criteria=Criteria::where('id_course', 'like', $id_course)->get();

    	return [
            'prodikudata' => $criteria,
            'success' => 1
        ];
    }

    // -----------------------------------------------------------------------
    // PAGE PILIH PRODI

    public function searchProdi($name)
    {
    	$info=Course::where('name', 'like', '%'.$name.'%')->with('getcampus')->get();

    	return [
            'prodikudata' => $info,
            'success' => 1
        ];
    }

    public function pilihProdi(Request $request)
    {
        $getvalue = 0;
        $getvalue=ScoreCourse::where('id_course', $request['id_course'])->value('score');

        $delete=ScoreCourse::where('id_course', $request['id_course'])->delete();


        $choice = new ChoiceCourse;
        $choice->create([
            'id_course' => $request['id_course'],
            'nid' => $request['nid'],
            'choice' => $request['choice'],
        ]);

        switch ($request['choice']) 
        {
            case 1: $addscore = 3; break;
            case 2: $addscore = 2; break;
            case 3: $addscore = 1; break;
            
            default:
                break;
        }

        $countscore = $getvalue + $addscore;

        $score = new ScoreCourse;
        $score->create([
            'id_course' => $request['id_course'],
            'score' => $countscore,
        ]);

        return $request->all();
    }

    public function changeCourse($choice, Request $request)
    {
    	$change=ChoiceCourse::where('nid', $request['nid'])->where('choice', $choice)->first()->update(['id_course' => $request['id_course']]);

    	//$change->save();

    	return [
            'prodikudata' => $request->all(),
            'success' => 1
        ];
    }

    public function showChoice($nid)
    {
    	$choice=ChoiceCourse::with('course.getcampus')->where('nid', 'like', $nid)->get();

    	return [
            'prodikudata' => $choice,
            'success' => 1
        ];
    }
}
