<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\QuestionCategory;
use App\QuestionSubject;
use App\QuestionFill;
use App\QuestionAnswer;

class QuestionController extends Controller
{
    public function index()
    {
    	//$question=QuestionCategory::with('question_subject.question_fill.question_answer')->get();

        $question=QuestionFill::with('question_answer')->with('reverseQuestionSubject.reverseQuestionCategory')->get();

    	//return $question;

        return [
            'prodikudata' => $question,
            'success' => 1
        ];
    }

    public function getbynid($nid)
    {
    	$question=QuestionCategory::where('nid', 'like', $nid.'%');
    	$join = $question->with('question_subject.question_fill.question_answer')->get();

    	//return $join;

        return [
            'prodikudata' => $join,
            'success' => 1
        ];
    }

    public function getbycategory($category)
    {
    	$question=QuestionCategory::where('category', 'like', $category.'%');
    	$join = $question->with('question_subject.question_fill.question_answer')->get();

    	return [
            'prodikudata' => $join,
            'success' => 1
        ];
    }

    public function getbysubject($subject)
    {
    	/*$question=QuestionSubject::where('subject', 'like', $subject.'%');
    	$join = $question->with('question_fill.question_answer')->get();*/

        $question=QuestionFill::with('question_answer')->with('reverseQuestionSubject.reverseQuestionCategory')->where('subject', 'like', $subject.'%')->get();

    	return [
            'prodikudata' => $question,
            'total_item' => count($question),
            'success' => 1
        ];
    }

    /*public function inputQuestion(Request $request)
    {
        $getIdCat = QuestionCategory::with('question_category')->max('id_category');
        $idCat = $getIdCat+1;

        $questCat = new QuestionCategory;
        $questCat->create([
            'id_category' => $idCat,
            'category' => $request['category'],
            'nid' => $request['nid'],
        ]);

        $getIdSbj = QuestionSubject::with('question_subject')->max('id_subject');
        $idSbj = $getIdSbj+1;

        $questSbj = new QuestionSubject;
        $questSbj->create([
            'id_subject' => $idSbj,
            'id_category' => $idCat,
            //'desc' => $request['desc'],
        ]);

        $getIdFil = QuestionFill::with('question_fill')->max('id_fill');
        $idFil = $getIdFil+1;

        $questFil = new QuestionFill;
        $questFil->create([
            'id_fill' => $idFil,
            'id_subject' => $idSbj,
            'desc' => $request['desc'],
            'type' => $request['type'],
            'key' => $request['key'],
            'question' => $request['question'],
            'image' => $request['image'],
        ]);
        
        return $request->all();
    }*/

    public function inputQuestion(Request $request)
    {
        $questFil = new QuestionFill;
        $questFil->create([
            'subject' => $request['subject'],
            'type' => $request['type'],
            'key' => $request['key'],
            'question' => $request['question'],
            'image' => $request['image'],
            'nid' => $request['nid'],
        ]);
        
        $idFil=QuestionFill::with('question_answer')->max('id_fill');

        return [
            'prodikudata' => array($request->all()),
            'id_fill' => $idFil,
            'success' => 1
        ];
    }

    public function inputAnswer(Request $request)
    {
        $questAns = new QuestionAnswer;
        $questAns->create([
            'id_fill' => $request['id_fill'],
            'choice' => $request['choice'],
            'option' => $request['option'],
            'image' => $request['image'],
        ]);
        
        return $request->all();
    }
}
