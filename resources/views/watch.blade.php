@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="card mb-4">
                    <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="600" src="https://www.youtube.com/embed/{{ $single_video->items[0]->id}}" title="{{ $single_video->items[0]->snippet->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5>{{ $single_video->items[0]->snippet->title }}</h5>
                        <p class="text-dark">Published at: {{ date('d M Y', strtotime($single_video->items[0]->snippet->publishedAt)) }}</p>
                        <p>{{ $single_video->items[0]->snippet->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="container">
                    <div class="row mb-3">
                        @foreach($videoLists->items as $key => $item )
                        <a href="{{ route('youtube.watch', $item->id->videoId) }}">
                            <div class="col-12">
                                <img src="{{ $item->snippet->thumbnails->medium->url }}" alt="" class="img-fluid">
                                <div class="card-body">
                                    <h5>{{ Str::limit($item->snippet->title, $limit=20, $end="...") }}</h5>
                                </div>
                                <div class="card-footer">
                                    <p class="text-muted">Published at: {{ date('d M Y', strtotime($item->snippet->publishTime)) }}</p>
                                </div>
                            </div>
                        </a>    
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection