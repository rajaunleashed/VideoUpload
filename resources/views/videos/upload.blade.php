@extends('layouts.default')
@section('content')
    <div class="container mt-5">
        <div class="d-flex flex-column justify-content-center">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <h3>Upload Video</h3>
                        <form id="upload-form" action="{{ route('video.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Video Title" id="title" />
                                @error('title')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Video Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="upload">Upload Video</label>
                                <input type="file" name="file" class="form-control" id="upload" accept="video/*">
                                @error('file')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" name="tags" class="form-control" placeholder="Tags" id="tags" data-role="tagsinput" />
                            </div>
                            <div class="form-group">
                                <input type="button" class="btn btn-primary" id="upload" value="Upload" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    @parent
    <script src="{{ asset('plugins/jqueryTags/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $('#upload-form input[type=button]').on('click', function() {
            $('#upload-form').submit();
        })
    </script>
@stop
