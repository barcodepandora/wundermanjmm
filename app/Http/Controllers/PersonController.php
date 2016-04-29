<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use wundermanjmm\entities\Person;
use Validator;

class PersonController extends Controller
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
        $person = new Person;
		$person->firstname = $request->input('firstname');
		$person->lastname = $request->input('lastname');
		$person->typeid = $request->input('typeid');
		$person->noid = $request->input('noid');
		$person->mobile = $request->input('mobile');
		$person->email = $request->input('email');
		
		// Save
		$person->save();

		// Back
        return view('welcome');
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
