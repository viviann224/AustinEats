@extends("layouts.app")

@section("content")
  <h1>CREATE POST</h1>
  {!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
      <div class="form-group">
          {{Form::label("title", "Title")}}
          {{Form::text("title", "", ["class"=> "form-control", "placeholder"=>"Title"])}}
      </div>

      <!-- <div class="form-group dropdown">
          {{Form::label("topic", "Topic")}}
          {{Form::text("topic", "", ["dropdown-toggle",
          "data-toggle"=>"dropdown", "aria-haspopup"=>"true", "aria-expanded"=>"true",
          "class"=> "form-control", "placeholder"=>"Topic"])}}
      </div> -->
      <div class="form-group">
          {{Form::label("body", "Body")}}
          {{Form::textarea("body", "", ["id"=>"article-ckeditor", "class"=> "form-control", "placeholder"=>"Body Text"])}}
      </div>

      <div class="form-group">
        {{Form::label("topic", "Topic")}}
        {{Form::select('topic', array('Local Coffee Shop' => 'Local Coffee Shop', 'Local Restaurant' => 'Local Restaurant', 'Local Event'=>'Local Event'),  null, array('class'=>'form-control','style'=>'' )) }}
      </div>
      <!-- <div class="form-group">
        {{Form::file("cover_image")}}
      </div> -->

      {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

  {!! Form::close() !!}


@endsection
