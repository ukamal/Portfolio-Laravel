@extends('layouts/main')
@section('content')

    <div class="callout primary">
        <article class="grid-container">
            <div class="">
                <p><a href="/">Back to Portfolio</a></p>
                <h1>{{$gallery->name}}</h1>
                <p class="lead">{{$gallery->description}}</p>
                <?php if(Auth::check()) : ?>
                <a href="/photo/create/{{$gallery->id}}" class="button">Upload</a>
                <?php endif; ?>
            </div>
        </article>
    </div>
    <article class="grid-container">
        <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">
            <?php foreach ($photos as $photo) : ?>
            <div class="column">
                <a href="/photo/details/{{$photo->id}}">
                    <img class="thhumbnail" src="/images/{{$photo->image}}" alt="">
                </a>
                <h5>{{$photo->title}}</h5>
                <p>{{$photo->description}}</p>
            </div>
            <?php endforeach; ?>

        </div>
    </article>

@stop