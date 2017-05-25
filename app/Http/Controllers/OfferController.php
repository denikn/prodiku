<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Users;
use App\Identity;
use App\Offer;

class OfferController extends Controller
{
    public function index()
    {
    	$offer=Offer::with('identity')->get();
        
        return [
            'prodikudata' => $offer,
            'success' => 1
        ];

        // $user=Identity::all()->get(['username','password']);
    	// return $user;
    }

    public function getOfferByNid($nid)
    {
    	$offer=Offer::with('reverse_identity')->where('nid', $nid)->get();
        
        return [
            'prodikudata' => $offer,
            'success' => 1
        ];

        // $user=Identity::all()->get(['username','password']);
    	// return $user;
    }

    public function sendOffer(Request $request)
    {
        $offer = new Offer;
        $offer->create([
            'sender' => $request['sender'],
            'nid' => $request['nid'],
            'type_offer' => $request['type_offer'],
            'offer' => $request['offer'],
            'image' => $request['image'],
        ]);

        return $request->all();
    }
}
