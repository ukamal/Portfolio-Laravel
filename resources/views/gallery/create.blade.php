@extends('layouts/main')
@section('content')
    <div class="callout primary">
        <article class="grid-container text-center">
            <div class="">
                <h1>Portfolio Gallery.</h1>
                <p class="lead">Create Portfolio Gallery</p>
            </div>
        </article>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="maindiv">
            {!! Form::open(array('action' => 'GalleryController@store', 'enctype' =>
            'multipart/form-data')) !!}

            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $value = null, $attributes = ['placeholder' =>
             'Gallery Name', 'name' => 'name', 'required' => 'required']) !!}

            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', $value = null, $attributes = ['placeholder' =>
             'Gallery description', 'description' => 'description', 'required' => 'required']) !!}

            {!! Form::label('cover_image', 'cover_image') !!}
            {!! Form::file('cover_image') !!}
            {!! Form::submit('Submit', $attributes = ['class' => 'button']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    @stop