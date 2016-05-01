<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use wundermanjmm\entities\Client;
use Validator;
use wundermanjmm\entities\Image;

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
		return $this->to_images($client);
   }

   /**
    */
   public function to_images($client)
   {
   
        $images = Image::where('owner', '=', $client->id)->paginate(10); // Loading images view. Pagination is REQUIRED
        return view('images-list')->with('images', $images)->with('client', $client);
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
