@extends("layouts.app")

@section("content")
  <h1>EDIT POST</h1>
  {!! Form::open(['action'=> ['PostsController@update', $post->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
      <div class="form-group">
          {{Form::label("title", "Title")}}
          {{Form::text("title",  $post->title, ["class"=> "form-control", "placeholder"=>"Title"])}}
      </div>
      <div class="form-group">
          {{Form::label("body", "Body")}}
          {{Form::textarea("body", $post->body, ["id"=>"article-ckeditor", "class"=> "form-control", "placeholder"=>"Body Text"])}}
      </div>

      <!-- <div class="form-group">
        {{Form::file("cover_image")}}
      </div> -->
      <div class="form-group">
        {{Form::label("topic", "Topic")}}
        {{Form::select('topic', array($post->topic, 'Local Coffee Shop' => 'Local Coffee Shop', 'Local Restaurant' => 'Local Restaurant', 'Local Event'=>'Local Event'),  null, array('class'=>'form-control','style'=>'' )) }}
      </div>

      {{Form::hidden('_method', 'PUT')}}
      {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

  {!! Form::close() !!}

@endsection
