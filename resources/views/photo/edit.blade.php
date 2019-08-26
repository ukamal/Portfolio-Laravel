@extends('layouts/main')
@section('content')
    <div class="callout primary">
        <article class="grid-container text-center">
            <div class="">
                <a href="/gallery/show/{{$photo->gallery_id}}">
                    Back to Portfolio
                </a>
                <h1>Update Portfolio Data</h1>
                <p class="lead">Update the portfolio photo</p>
            </div>
        </article>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="maindiv">
            {!! Form::open(array('action' => 'PhotoController@update', 'enctype' =>
            'multipart/form-data')) !!}

            <input type="hidden" name="id" value="{{$photo->id}}">

            {!! Form::label('title', 'title') !!}
            {!! Form::text('title', $value = $photo->title, $attributes = ['name' => 'title', 'required' => 'required']) !!}

            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', $value = $photo->description, $attributes = ['name' => 'description', 'required' => 'required']) !!}

            {!! Form::label('location', 'Location') !!}
            {!! Form::text('location', $value = $photo->location, $attributes = ['name' => 'location', 'required' => 'required']) !!}

            <div class="upnew">
            {!! Form::label('image', 'Portfolio Image') !!}
            {!! Form::file('image') !!}
            </div>
            <div class="previmg">
                <img src="/images/{{$photo->image}}" alt="">
            </div>

            <input type="hidden" name="gallery_id" value="{{$photo->gallery_id}}">
            {!! Form::submit('Update', $attributes = ['class' => 'button']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop