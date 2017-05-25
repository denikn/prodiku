<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Trial;

use App\Result;
use App\ChoiceCourse;
use App\Course;
use App\Criteria;
use App\QuestionCategory;

class FuzzyController extends Controller
{
	public function resultCoba()
	{
		$resPot=Result::where('id_t', 1)->value('result');

		return [
            'prodikudata' => $resPot,
            'success' => 1
        ];
	}

    public function getRecomendation($nid)
    {
    	//initialization
    	$getIdChoice=ChoiceCourse::with('course')->where('nid', 'like', $nid)->where('choice', 1)->value('id_course');
    	$getType=Course::where('id_course', 'like', $getIdChoice)->value('type');

    	// ------------------- GET RESULT --------------------------- //

    	// POTENTIAL
        $idPot=Trial::where('subject', 'potential')->where('nid', $nid)->value('id_t');
        $resPot=Result::where('id_t', $idPot)->value('result');
        // MATDAS*/
        $idMatdas=Trial::where('subject', 'matdas')->where('nid', $nid)->value('id_t');
        $resMatdas=Result::where('id_t', $idMatdas)->value('result');
        // INDONESIAN
        $idIndo=Trial::where('subject', 'indonesian')->where('nid', $nid)->value('id_t');
        $resIndo=Result::where('id_t', $idIndo)->value('result');
        // ENGLISH
        $idEng=Trial::where('subject', 'english')->where('nid', $nid)->value('id_t');
        $resEng=Result::where('id_t', $idEng)->value('result');

        	try {
		        // MATH
		        $idMath=Trial::where('subject', 'math')->where('nid', $nid)->value('id_t');
		        $resMath=Result::where('id_t', $idMath)->value('result');
	    	} catch (\Illuminate\Database\QueryException $e) {
        		$resMath=0;
        	}
        	try {
		        // PHYSIC
		        $idPhy=Trial::where('subject', 'physic')->where('nid', $nid)->value('id_t');
		        $resPhy=Result::where('id_t', $idPhy)->value('result');
        	} catch (\Illuminate\Database\QueryException $e) {
        		$resPhy=0;
        	}
        	try {
		        // BIOLOGY
		        $idBio=Trial::where('subject', 'biology')->where('nid', $nid)->value('id_t');
		        $resBio=Result::where('id_t', $idBio)->value('result');
		    } catch (\Illuminate\Database\QueryException $e) {
        		$resBio=0;
        	}
        	try {
		        // CHEMISTRY
		        $idChe=Trial::where('subject', 'chemistry')->where('nid', $nid)->value('id_t');
		        $resChe=Result::where('id_t', $idChe)->value('result');
        	} catch (\Illuminate\Database\QueryException $e) {
        		$resChe=0;
        	}
        	try {
        		$idSoc=Trial::where('subject', 'sociology')->where('nid', $nid)->value('id_t');
        		$resSoc=Result::where('id_t', $idSoc)->value('result');
        	} catch (\Illuminate\Database\QueryException $e) {
        		$resSoc=0;
        	}
        	try {
        		$idHis=Trial::where('subject', 'history')->where('nid', $nid)->value('id_t');
        		$resHis=Result::where('id_t', $idHis)->value('result');
        	} catch (\Illuminate\Database\QueryException $e) {
        		$resHis=0;
        	}
        	try {
        		$idGeo=Trial::where('subject', 'geography')->where('nid', $nid)->value('id_t');
        		$resGeo=Result::where('id_t', $idGeo)->value('result');
        	} catch (\Illuminate\Database\QueryException $e) {
        		$resGeo=0;
        	}
        	try {
        		$idEco=Trial::where('subject', 'economy')->where('nid', $nid)->value('id_t');
        		$resEco=Result::where('id_t', $idEco)->value('result');
        	} catch (\Illuminate\Database\QueryException $e) {
        		$resEco=0;
        	}

        // ------------------- GET PATERN --------------------------- //

        // PATERN CHOICE 1
        $getIdCho1=ChoiceCourse::where('nid', 'like', $nid)->where('choice', 1)->value('id_course');
        $cho1=Criteria::where('id_course', $getIdCho1);

        $patPot1=$cho1->value('potential');
        $patMatdas1=$cho1->value('matdas');
        $patIndo1=$cho1->value('indonesian');
        $patEng1=$cho1->value('english');
        $patMath1=$cho1->value('math');
        $patPhy1=$cho1->value('physic');
        $patBio1=$cho1->value('biology');
        $patChe1=$cho1->value('chemistry');
        $patSoc1=$cho1->value('sociology');
        $patHis1=$cho1->value('history');
        $patGeo1=$cho1->value('geography');
        $patEco1=$cho1->value('economy');

        // PATERN CHOICE 2
        $getIdCho2=ChoiceCourse::where('nid', 'like', $nid)->where('choice', 2)->value('id_course');
        $cho2=Criteria::where('id_course', $getIdCho2);

        $patPot2=$cho2->value('potential');
        $patMatdas2=$cho2->value('matdas');
        $patIndo2=$cho2->value('indonesian');
        $patEng2=$cho2->value('english');
        $patMath2=$cho2->value('math');
        $patPhy2=$cho2->value('physic');
        $patBio2=$cho2->value('biology');
        $patChe2=$cho2->value('chemistry');
        $patSoc2=$cho2->value('sociology');
        $patHis2=$cho2->value('history');
        $patGeo2=$cho2->value('geography');
        $patEco2=$cho2->value('economy');

        // PATERN CHOICE 3
        $getIdCho3=ChoiceCourse::where('nid', 'like', $nid)->where('choice', 3)->value('id_course');
        $cho3=Criteria::where('id_course', $getIdCho3);

        $patPot3=$cho3->value('potential');
        $patMatdas3=$cho3->value('matdas');
        $patIndo3=$cho3->value('indonesian');
        $patEng3=$cho3->value('english');
        $patMath3=$cho3->value('math');
        $patPhy3=$cho3->value('physic');
        $patBio3=$cho3->value('biology');
        $patChe3=$cho3->value('chemistry');
        $patSoc3=$cho3->value('sociology');
        $patHis3=$cho3->value('history');
        $patGeo3=$cho3->value('geography');
        $patEco3=$cho3->value('economy');

        // ------------------- FUZZYFIKASI --------------------------- //

        	// FUZZYFIKASI RESULT 
        	if($resPot>=79.6) 
        	{ $resPot=0.8; } else if($resPot>=59.6)
        	{ $resPot=0.6; } else if($resPot>=39.6)
        	{ $resPot=0.4; } else { $resPot=0; }

        	if($resMatdas>=79.6) 
        	{ $resMatdas=0.8; } else if($resMatdas>=59.6)
        	{ $resMatdas=0.6; } else if($resMatdas>=39.6)
        	{ $resMatdas=0.4; } else { $resMatdas=0; }

        	if($resIndo>=79.6) 
        	{ $resIndo=0.8; } else if($resIndo>=59.6)
        	{ $resIndo=0.6; } else if($resIndo>=39.6)
        	{ $resIndo=0.4; } else { $resIndo=0; }

        	if($resEng>=79.6) 
        	{ $resEng=0.8; } else if($resEng>=59.6)
        	{ $resEng=0.6; } else if($resEng>=39.6)
        	{ $resEng=0.4; } else { $resEng=0; }

        	if($resMath>=79.6) 
        	{ $resMath=0.8; } else if($resMath>=59.6)
        	{ $resMath=0.6; } else if($resMath>=39.6)
        	{ $resMath=0.4; } else { $resMath=0; }

        	if($resPhy>=79.6) 
        	{ $resPhy=0.8; } else if($resPhy>=59.6)
        	{ $resPhy=0.6; } else if($resPhy>=39.6)
        	{ $resPhy=0.4; } else { $resPhy=0; }

        	if($resBio>=79.6) 
        	{ $resBio=0.8; } else if($resBio>=59.6)
        	{ $resBio=0.6; } else if($resBio>=39.6)
        	{ $resBio=0.4; } else { $resBio=0; }

        	if($resChe>=79.6) 
        	{ $resChe=0.8; } else if($resChe>=59.6)
        	{ $resChe=0.6; } else if($resChe>=39.6)
        	{ $resChe=0.4; } else { $resChe=0; }

        	if($resSoc>=79.6) 
        	{ $resSoc=0.8; } else if($resSoc>=59.6)
        	{ $resSoc=0.6; } else if($resSoc>=39.6)
        	{ $resSoc=0.4; } else { $resSoc=0; }

        	if($resHis>=79.6) 
        	{ $resHis=0.8; } else if($resHis>=59.6)
        	{ $resHis=0.6; } else if($resHis>=39.6)
        	{ $resHis=0.4; } else { $resHis=0; }

        	if($resGeo>=79.6) 
        	{ $resGeo=0.8; } else if($resGeo>=59.6)
        	{ $resGeo=0.6; } else if($resGeo>=39.6)
        	{ $resGeo=0.4; } else { $resGeo=0; }

        	if($resEco>=79.6) 
        	{ $resEco=0.8; } else if($resEco>=59.6)
        	{ $resEco=0.6; } else if($resEco>=39.6)
        	{ $resEco=0.4; } else { $resEco=0; }

        	// FUZZYFIKASI PATTERN 1
        	if($patPot1>=79.6) 
        	{ $patPot1=0.8; } else if($patPot1>=59.6)
        	{ $patPot1=0.6; } else if($patPot1>=39.6)
        	{ $patPot1=0.4; } else { $patPot1=0; }

        	if($patMatdas1>=79.6) 
        	{ $patMatdas1=0.8; } else if($patMatdas1>=59.6)
        	{ $patMatdas1=0.6; } else if($patMatdas1>=39.6)
        	{ $patMatdas1=0.4; } else { $patMatdas1=0; }

        	if($patIndo1>=79.6) 
        	{ $patIndo1=0.8; } else if($patIndo1>=59.6)
        	{ $patIndo1=0.6; } else if($patIndo1>=39.6)
        	{ $patIndo1=0.4; } else { $patIndo1=0; }

        	if($patEng1>=79.6) 
        	{ $patEng1=0.8; } else if($patEng1>=59.6)
        	{ $patEng1=0.6; } else if($patEng1>=39.6)
        	{ $patEng1=0.4; } else { $patEng1=0; }

        	if($patMath1>=79.6) 
        	{ $patMath1=0.8; } else if($patMath1>=59.6)
        	{ $patMath1=0.6; } else if($patMath1>=39.6)
        	{ $patMath1=0.4; } else { $patMath1=0; }

        	if($patPhy1>=79.6) 
        	{ $patPhy1=0.8; } else if($patPhy1>=59.6)
        	{ $patPhy1=0.6; } else if($patPhy1>=39.6)
        	{ $patPhy1=0.4; } else { $patPhy1=0; }

        	if($patBio1>=79.6) 
        	{ $patBio1=0.8; } else if($patBio1>=59.6)
        	{ $patBio1=0.6; } else if($patBio1>=39.6)
        	{ $patBio1=0.4; } else { $patBio1=0; }

        	if($patChe1>=79.6) 
        	{ $patChe1=0.8; } else if($patChe1>=59.6)
        	{ $patChe1=0.6; } else if($patChe1>=39.6)
        	{ $patChe1=0.4; } else { $patChe1=0; }

        	if($patSoc1>=79.6) 
        	{ $patSoc1=0.8; } else if($patSoc1>=59.6)
        	{ $patSoc1=0.6; } else if($patSoc1>=39.6)
        	{ $patSoc1=0.4; } else { $patSoc1=0; }

        	if($patHis1>=79.6) 
        	{ $patHis1=0.8; } else if($patHis1>=59.6)
        	{ $patHis1=0.6; } else if($patHis1>=39.6)
        	{ $patHis1=0.4; } else { $patHis1=0; }

        	if($patGeo1>=79.6) 
        	{ $patGeo1=0.8; } else if($patGeo1>=59.6)
        	{ $patGeo1=0.6; } else if($patGeo1>=39.6)
        	{ $patGeo1=0.4; } else { $patGeo1=0; }

        	if($patEco1>=79.6) 
        	{ $patEco1=0.8; } else if($patEco1>=59.6)
        	{ $patEco1=0.6; } else if($patEco1>=39.6)
        	{ $patEco1=0.4; } else { $patEco1=0; }

        	// FUZZYFIKASI PATTERN 2
        	if($patPot2>=79.6) 
        	{ $patPot2=0.8; } else if($patPot2>=59.6)
        	{ $patPot2=0.6; } else if($patPot2>=39.6)
        	{ $patPot2=0.4; } else { $patPot2=0; }

        	if($patMatdas2>=79.6) 
        	{ $patMatdas2=0.8; } else if($patMatdas2>=59.6)
        	{ $patMatdas2=0.6; } else if($patMatdas2>=39.6)
        	{ $patMatdas2=0.4; } else { $patMatdas2=0; }

        	if($patIndo2>=79.6) 
        	{ $patIndo2=0.8; } else if($patIndo2>=59.6)
        	{ $patIndo2=0.6; } else if($patIndo2>=39.6)
        	{ $patIndo2=0.4; } else { $patIndo2=0; }

        	if($patEng2>=79.6) 
        	{ $patEng2=0.8; } else if($patEng2>=59.6)
        	{ $patEng2=0.6; } else if($patEng2>=39.6)
        	{ $patEng2=0.4; } else { $patEng2=0; }

        	if($patMath2>=79.6) 
        	{ $patMath2=0.8; } else if($patMath2>=59.6)
        	{ $patMath2=0.6; } else if($patMath2>=39.6)
        	{ $patMath2=0.4; } else { $patMath2=0; }

        	if($patPhy2>=79.6) 
        	{ $patPhy2=0.8; } else if($patPhy2>=59.6)
        	{ $patPhy2=0.6; } else if($patPhy2>=39.6)
        	{ $patPhy2=0.4; } else { $patPhy2=0; }

        	if($patBio2>=79.6) 
        	{ $patBio2=0.8; } else if($patBio2>=59.6)
        	{ $patBio2=0.6; } else if($patBio2>=39.6)
        	{ $patBio2=0.4; } else { $patBio2=0; }

        	if($patChe2>=79.6) 
        	{ $patChe2=0.8; } else if($patChe2>=59.6)
        	{ $patChe2=0.6; } else if($patChe2>=39.6)
        	{ $patChe2=0.4; } else { $patChe2=0; }

        	if($patSoc2>=79.6) 
        	{ $patSoc2=0.8; } else if($patSoc2>=59.6)
        	{ $patSoc2=0.6; } else if($patSoc2>=39.6)
        	{ $patSoc2=0.4; } else { $patSoc2=0; }

        	if($patHis2>=79.6) 
        	{ $patHis2=0.8; } else if($patHis2>=59.6)
        	{ $patHis2=0.6; } else if($patHis2>=39.6)
        	{ $patHis2=0.4; } else { $patHis2=0; }

        	if($patGeo2>=79.6) 
        	{ $patGeo2=0.8; } else if($patGeo2>=59.6)
        	{ $patGeo2=0.6; } else if($patGeo2>=39.6)
        	{ $patGeo2=0.4; } else { $patGeo2=0; }

        	if($patEco2>=79.6) 
        	{ $patEco2=0.8; } else if($patEco2>=59.6)
        	{ $patEco2=0.6; } else if($patEco2>=39.6)
        	{ $patEco2=0.4; } else { $patEco2=0; }

        	// FUZZYFIKASI PATTERN 3
        	if($patPot3>=79.6) 
        	{ $patPot3=0.8; } else if($patPot3>=59.6)
        	{ $patPot3=0.6; } else if($patPot3>=39.6)
        	{ $patPot3=0.4; } else { $patPot3=0; }

        	if($patMatdas3>=79.6) 
        	{ $patMatdas3=0.8; } else if($patMatdas3>=59.6)
        	{ $patMatdas3=0.6; } else if($patMatdas3>=39.6)
        	{ $patMatdas3=0.4; } else { $patMatdas3=0; }

        	if($patIndo3>=79.6) 
        	{ $patIndo3=0.8; } else if($patIndo3>=59.6)
        	{ $patIndo3=0.6; } else if($patIndo3>=39.6)
        	{ $patIndo3=0.4; } else { $patIndo3=0; }

        	if($patEng3>=79.6) 
        	{ $patEng3=0.8; } else if($patEng3>=59.6)
        	{ $patEng3=0.6; } else if($patEng3>=39.6)
        	{ $patEng3=0.4; } else { $patEng3=0; }

        	if($patMath3>=79.6) 
        	{ $patMath3=0.8; } else if($patMath3>=59.6)
        	{ $patMath3=0.6; } else if($patMath3>=39.6)
        	{ $patMath3=0.4; } else { $patMath3=0; }

        	if($patPhy3>=79.6) 
        	{ $patPhy3=0.8; } else if($patPhy3>=59.6)
        	{ $patPhy3=0.6; } else if($patPhy3>=39.6)
        	{ $patPhy3=0.4; } else { $patPhy3=0; }

        	if($patBio3>=79.6) 
        	{ $patBio3=0.8; } else if($patBio3>=59.6)
        	{ $patBio3=0.6; } else if($patBio3>=39.6)
        	{ $patBio3=0.4; } else { $patBio3=0; }

        	if($patChe3>=79.6) 
        	{ $patChe3=0.8; } else if($patChe3>=59.6)
        	{ $patChe3=0.6; } else if($patChe3>=39.6)
        	{ $patChe3=0.4; } else { $patChe3=0; }

        	if($patSoc3>=79.6) 
        	{ $patSoc3=0.8; } else if($patSoc3>=59.6)
        	{ $patSoc3=0.6; } else if($patSoc3>=39.6)
        	{ $patSoc3=0.4; } else { $patSoc3=0; }

        	if($patHis3>=79.6) 
        	{ $patHis3=0.8; } else if($patHis3>=59.6)
        	{ $patHis3=0.6; } else if($patHis3>=39.6)
        	{ $patHis3=0.4; } else { $patHis3=0; }

        	if($patGeo3>=79.6) 
        	{ $patGeo3=0.8; } else if($patGeo3>=59.6)
        	{ $patGeo3=0.6; } else if($patGeo3>=39.6)
        	{ $patGeo3=0.4; } else { $patGeo3=0; }

        	if($patEco3>=79.6) 
        	{ $patEco3=0.8; } else if($patEco3>=59.6)
        	{ $patEco3=0.6; } else if($patEco3>=39.6)
        	{ $patEco3=0.4; } else { $patEco3=0; }

        	// ---------------------- NORMALISASI -----------------------------
        	$normal1 = 0; $normal2 = 0; $normal3 = 0;

        	// PILIHAN 1
        	if($resPot>=$patPot1) { $normal1=$normal1+1; }
        	if($resMatdas>=$patMatdas1) { $normal1=$normal1+1; }
        	if($resIndo>=$patIndo1) { $normal1=$normal1+1; }
        	if($resEng>=$patEng1) { $normal1=$normal1+1; }
        	if($resMath>=$patMath1) { $normal1=$normal1+1; }
        	if($resPhy>=$patPhy1) { $normal1=$normal1+1; }
        	if($resBio>=$patBio1) { $normal1=$normal1+1; }
        	if($resChe>=$patChe1) { $normal1=$normal1+1; }
        	if($resSoc>=$patSoc1) { $normal1=$normal1+1; }
        	if($resHis>=$patHis1) { $normal1=$normal1+1; }
        	if($resGeo>=$patGeo1) { $normal1=$normal1+1; }
        	if($resEco>=$patEco1) { $normal1=$normal1+1; }

        	// PILIHAN 2
        	if($resPot>=$patPot2) { $normal2=$normal2+1; }
        	if($resMatdas>=$patMatdas2) { $normal2=$normal2+1; }
        	if($resIndo>=$patIndo2) { $normal2=$normal2+1; }
        	if($resEng>=$patEng2) { $normal2=$normal2+1; }
        	if($resMath>=$patMath2) { $normal2=$normal2+1; }
        	if($resPhy>=$patPhy2) { $normal2=$normal2+1; }
        	if($resBio>=$patBio2) { $normal2=$normal2+1; }
        	if($resChe>=$patChe2) { $normal2=$normal2+1; }
        	if($resSoc>=$patSoc2) { $normal2=$normal2+1; }
        	if($resHis>=$patHis2) { $normal2=$normal2+1; }
        	if($resGeo>=$patGeo2) { $normal2=$normal2+1; }
        	if($resEco>=$patEco2) { $normal2=$normal2+1; }

        	// PILIHAN 3
        	if($resPot>=$patPot3) { $normal3=$normal3+1; }
        	if($resMatdas>=$patMatdas3) { $normal3=$normal3+1; }
        	if($resIndo>=$patIndo3) { $normal3=$normal3+1; }
        	if($resEng>=$patEng3) { $normal3=$normal3+1; }
        	if($resMath>=$patMath3) { $normal3=$normal3+1; }
        	if($resPhy>=$patPhy3) { $normal3=$normal3+1; }
        	if($resBio>=$patBio3) { $normal3=$normal3+1; }
        	if($resChe>=$patChe3) { $normal3=$normal3+1; }
        	if($resSoc>=$patSoc3) { $normal3=$normal3+1; }
        	if($resHis>=$patHis3) { $normal3=$normal3+1; }
        	if($resGeo>=$patGeo3) { $normal3=$normal3+1; }
        	if($resEco>=$patEco3) { $normal3=$normal3+1; }

        	// DEFUZIFIKASI
        	if($normal1>$normal2)
        	{
        		if($normal2>$normal3)
        		{
        			$getRecom1=ChoiceCourse::with('course.getcampus')->where('choice', 1)->where('nid', 'like', $nid)->get();
        			$getRecom2=ChoiceCourse::with('course.getcampus')->where('choice', 2)->where('nid', 'like', $nid)->get();
        			$getRecom3=ChoiceCourse::with('course.getcampus')->where('choice', 3)->where('nid', 'like', $nid)->get();
        		} else {
        			$getRecom1=ChoiceCourse::with('course.getcampus')->where('choice', 1)->where('nid', 'like', $nid)->get();
        			$getRecom2=ChoiceCourse::with('course.getcampus')->where('choice', 3)->where('nid', 'like', $nid)->get();
        			$getRecom3=ChoiceCourse::with('course.getcampus')->where('choice', 2)->where('nid', 'like', $nid)->get();
        		}
        	} else {
        		if($normal2>$normal3)
        		{
        			$getRecom1=ChoiceCourse::with('course.getcampus')->where('choice', 2)->where('nid', 'like', $nid)->get();
        			$getRecom2=ChoiceCourse::with('course.getcampus')->where('choice', 3)->where('nid', 'like', $nid)->get();
        			$getRecom3=ChoiceCourse::with('course.getcampus')->where('choice', 1)->where('nid', 'like', $nid)->get();	
        		} else {
        			$getRecom1=ChoiceCourse::with('course.getcampus')->where('choice', 3)->where('nid', 'like', $nid)->get();
        			$getRecom2=ChoiceCourse::with('course.getcampus')->where('choice', 1)->where('nid', 'like', $nid)->get();
        			$getRecom3=ChoiceCourse::with('course.getcampus')->where('choice', 2)->where('nid', 'like', $nid)->get();
        		}
        	}

        	//$getRecom=ChoiceCourse::with('course.getcampus')->where('choice', 1)->where('nid', 'like', $nid)->get();

        	//$users = Result::select('select * from result');

        //library[title] = {"foregrounds" : foregrounds,"backgrounds" : backgrounds};
        	//$resPot=$resPot*100;
        return [
            'prodikudata' => array([  'rekomendasi_1' => $getRecom1,
            					'rekomendasi_2' => $getRecom2,
            					'rekomendasi_3' => $getRecom3,]),
            'success' => 1
        ];
    }
}
