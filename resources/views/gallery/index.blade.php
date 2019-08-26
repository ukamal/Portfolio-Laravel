@extends('layouts/main')
@section('content')

    <div class="callout primary">
        <article class="grid-container">
            <div class="">
                <h1>Laravel Portfolio.</h1>
                <p class="lead">See all my project click to my portfolio image</p>
            </div>
        </article>
    </div>
    <article class="grid-container">
        <div class="grid-x grid-margin-x small-up-2 medium-up-3 large-up-4">

            <?php foreach ($galleries as $gallery) : ?>
            <div class="cell">
                <a href="/gallery/show/{{$gallery->id}}">
                <img class="thumbnail" src="/images/{{$gallery->cover_image}}">
                </a>
                <h5>{{$gallery->name}}</h5>
                <p>{{$gallery->description}}</p>
            </div>
            <?php endforeach; ?>

        </div>
    </article>

    @stop