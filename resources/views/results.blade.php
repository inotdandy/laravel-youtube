@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                @foreach($videoLists->items as $key => $item)
                
                <div class="row mb-3">
                    <a href="{{ route('youtube.watch', $item->id->videoId) }}" style="display:contents">
                        <div class="col-4">
                            <img src="{{ $item->snippet->thumbnails->medium->url }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <h5>{{Str::limit( $item->snippet->title, $limit=50, $end="...")}}</h5>
                            <p class="text-muted">Published at: {{ date('d M Y', strtotime($item->snippet->publishTime))}}</p>
                            <p>{{Str::limit( $item->snippet->description, $limit=100, $end="...")}}</p>
                        </div>
                    </a>    
                </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection