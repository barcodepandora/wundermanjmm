<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use wundermanjmm\entities\Client;
use Validator;

class ClientController extends Controller
{
    //
   public function index()
   {
   }

   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
      // Validation //

        // New
        $client = new Client;
		$client->firstname = $request->input('firstname');
		$client->lastname = $request->input('lastname');
		$client->typeid = $request->input('typeid');
		$client->noid = $request->input('noid');
		$client->mobile = $request->input('mobile');
		$client->email = $request->input('email');
		
		// Save
		$client->save();

		// Back
        return view('gallery');
   }

   /**
    */
   public function show($id)
   {
   }

   /**
    */
   public function edit($id)
   {
   }

   /**
    */
   public function update(Request $request, $id)
   {
   }

   /**
    */
   public function destroy($id)
   {
   }}
