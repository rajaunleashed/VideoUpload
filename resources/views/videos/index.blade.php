@extends('layouts.default')
@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col-12">
                    <a href="/videos/upload" class="btn btn-primary">Upload Video</a>
                </div>
            </div>
                <div class="row mt-3">
                    @foreach($videos as $video)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $video->title }}</h3>
                            </div>
                            <div class="card-body">
                                <video class="video" width="320" height="240" controls>
                                    <source src="{{ asset($video->file_path) }}" type="video/mp4">
                                    <source src="{{ asset($video->file_path) }}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                                <p>{{$video->description}}</p>
                                @if($video->tags)
                                    @foreach($video->tags as $tag)
                                        <span class="badge badge-primary">{{$tag}}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
@stop
