
<!-- 

image-list.blade.php.

Extension for loading gallery
Juan Manuel Moreno B. 29/04/2016

REFERENCES:
http://the-amazing-php.blogspot.com.co/2015/06/laravel-5.1-image-gallery-crud.html
-->
@extends('global-layout')

<!--
	Body section
	This will be added in yield field of extends blade
-->
@section('body')

   <div class="row">
   
      @if(count($images) > 0) <!-- There are images. -->
      
         <div class="col-md-12 text-center" >
         
         	{{ Form::hidden('client', $client->id) }} 

			{!! Form::open(['route'=>'nueva', 'class'=>'pull-left']) !!}
				{!! Form::hidden('client', $client->id) !!} <!-- Hidden client. -->
				{!! Form::submit('Add another new image', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}

			 <!-- 
				<a href="{{ url('/image/create') }}" class="btn btn-primary" role="button"> <!-- link for adding -->
            
               		Add new image
            	</a>
			 -->
            
            <hr />
         </div>
      @endif
      
      @forelse($images as $image) <!-- Loading section. -->
      
         <div class="col-md-3">
            <div class="thumbnail">

            	<a  data-toggle="modal" data-target="#myModal">
               		<img src="{{asset($image->file)}}"/>
               	</a>

               <div class="caption">
               
                  <h3>{{$image->caption}}</h3>
                  <p>{!! substr($image->description, 0,100) !!}</p>
                  <p>
                     <div class="row text-center" style="padding-left:1em;">

                     	<span class="pull-left">&nbsp;</span>
                     	
							{!! Form::open(['url'=>'/image/'.$image->id, 'class'=>'pull-left']) !!}
								{!! Form::hidden('_method', 'DELETE') !!}
								{!! Form::submit('Remove', ['class' => 'btn btn-danger btnform', 'onclick'=>'return confirm(\'Are you sure?\')']) !!}
							{!! Form::close() !!}
                     </div>
                  </p>
               </div>
            </div>
         </div>
      @empty
      
		{!! Form::open(['route'=>'nueva', 'class'=>'pull-left']) !!}
			{!! Form::hidden('client', $client->id) !!} <!-- Hidden client. -->
			{!! Form::submit('No images yet. Add a new one', ['class' => 'btn btn-primary']) !!}
		{!! Form::close() !!}

         <!-- 
         	<p>No images yet, <a href="{{ url('/image/create') }}">add a new one</a>?</p>
         -->
      @endforelse
   </div>
   <div align="center">{!! $images->render() !!}</div>
@stop