
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

	<!-- Javascript -->
	<script type="text/javascript">
	
		 /*
		 	Orders div images by caption field
		 	
		 	REFERENCE: http://jsfiddle.net/NfVxk/
		 */
		function order_caption() {
	
			var div = $('#photos');
			var listitems = div.children('.col-md-3');
			listitems.sort(function (a, b) {
	
				//alert("order_caption do it 4 " + $(a).attr('caption'));
				return (+$(a).attr('caption') > +$(b).attr('caption')) ?
				1 : (+$(a).attr('caption') < +$(b).attr('caption')) ? 
				-1 : 0;
			})
			$.each(listitems, function (idx, itm) { div.append(itm); });
		}

		/*
			Orders div images by date field
			
			REFERENCE: http://jsfiddle.net/NfVxk/
		 */
		 function order_date() {
 
				var div = $('#photos');
				var listitems = div.children('.col-md-3');
				listitems.sort(function (a, b) {
		
					return (+$(a).attr('saved') > +$(b).attr('saved')) ?
					-1 : (+$(a).attr('saved') < +$(b).attr('saved')) ? 
					1 : 0;
				})
				$.each(listitems, function (idx, itm) { div.append(itm); });
			}

	</script>
	
   <div class="row" id="photos"> <!-- Wrapper image list section-->
   
      @if(count($images) > 0) <!-- There are images. -->
      
         <div class="col-md-12 text-center" caption="a" saved="1" >
         
         	<!-- Loading view for adding another new image. -->
			{!! Form::open(['route'=>'nueva', 'class'=>'pull-left']) !!}
				{!! Form::hidden('client', $client->id) !!} <!-- Hidden client. -->
				{!! Form::submit('Add another new image', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}

			<input type="button" value="Ordenar por titulo" onclick="order_caption();"/>
			<input type="button" value="Ordenar por fecha" onclick="order_date();"/>
			
			 <!-- 
				<a href="{{ url('/image/create') }}" class="btn btn-primary" role="button"> <!-- link for adding -->
            
               		Add new image
            	</a>
			 -->
            
            <hr />
         </div>
      @endif
      
      @forelse($images as $image) <!-- Loading section. -->
      
         <div class="col-md-3"  caption="{{$image->caption}}" saved="{{$image->created_at}}" > <!-- Image section-->
         
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
      
      	<!-- Loading view for adding the first image. -->
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