<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use wundermanjmm\entities\Image;
use Validator;
use wundermanjmm\entities\Client;

class ImageController extends Controller
{
    //
   public function index()
   {
      //$images = Image::paginate(10);
      $client = Client::find($request->input('client'));
      return ClientController::to_images($client);
   }

   public function go2images()
   {
      $images = Image::paginate(10);
      return view('images-list')->with('images', $images);
   }
   
   public function create()
   {
      return view('add-new-image');
   }

   public function nueva(Request $request)
   {
   
   	  $client = Client::find($request->input('client'));
      return view('add-new-image')->with('client', $client);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request $request)
   {
      // Validation //
        $validation = Validator::make($request->all(), [
            'caption'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile'     => 'required|image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                             ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $image = new Image;

        $file = $request->file('userfile');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);
        
        $image->file = $destination_path . $filename;
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        
        $image->owner = $request->input('client'); // Adding client as a owner of the new image.
        
        $image->save();

		// Reloading image list including client owner
		$client = Client::find($image->owner);
        $images = Image::where('owner', '=', $client->id)->paginate(10); // Loading images view. Pagination is REQUIRED
        return view('images-list')->with('images', $images)->with('client', $client);
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {
      $image = Image::find($id);
      return view('image-detail')->with('image', $image);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
      $image = Image::find($id);
      return view('edit-image')->with('image', $image);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update(Request $request, $id)
   {
      // Validation //
        $validation = \Validator::make($request->all(), [
            'caption'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'userfile'    => 'sometimes|image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                             ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $image = Image::find($id);

        if( $request->hasFile('userfile') ){
           $file = $request->file('userfile');
           $destination_path = 'uploads/';
           $filename = str_random(6).'_'.$file->getClientOriginalName();
           $file->move($destination_path, $filename);
           $image->file = $destination_path . $filename;
        }
        
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->save();

        //return redirect('/image')->with('message','You just updated an image!');
        $client = Client::find($image->owner);
        $images = Image::where('owner', '=', $client->id)->paginate(10); // Loading images view. Pagination is REQUIRED
        return view('images-list')->with('images', $images)->with('client', $client);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
      $image = Image::find($id);
      $image->delete();
      return redirect('/image')->with('message','You just deleted an image!');
   }}
