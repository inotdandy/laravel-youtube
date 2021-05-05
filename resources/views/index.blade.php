@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach($videoLists->items as $key => $item)
            <div class="col-4">
                <a href="{{ route('youtube.watch', $item->id->videoId) }}">
                    <div class="card mb-4">
                        <img src="{{ $item->snippet->thumbnails->medium->url }}" alt="" class="img-fluid">
                        <div class="car-body">
                            <h5 class="card-title">{{Str::limit( $item->snippet->title, 50)}}</h5>
                            <div class="card-footer text-muted">
                                Published at: {{ date('d M Y', strtotime($item->snippet->publishTime))}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach
            
        </div>
    </div>
@endsection