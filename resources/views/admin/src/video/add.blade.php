@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="layout-px-spacing">
                            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                                <div class="col-lg-12">
                                    <div class="widget-content searchable-container list">
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ $error }}
                                                </div>
                                            @endforeach
                                        @endif
                                        <form action="{{ url('/admin/video/store') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="video_id" value="{{$video->id ?? 0}}" />
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label for="title">
                                                        @lang("website.title")
                                                    </label>
                                                    <input class="form-control" type="text" name="title" value="{{$video->title ?? old('title')}}">
                                                    @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label for="description">
                                                        @lang("website.description")
                                                    </label>
                                                    <textarea rows="3" class="form-control" name="description">{{$video->description ?? old('description')}}</textarea>
                                                    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label for="link">
                                                        @lang("website.link")
                                                    </label>
                                                    <input class="form-control"  type="text" name="link" value="{{$video->link ?? old('link')}}">
                                                    @error('link') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label for="youtubeLink">
                                                        @lang("website.youtube-link")
                                                    </label>
                                                    <input class="form-control" type="text" name="youtubeLink" value="{{$video->youtube_link ?? old('youtube_link')}}">
                                                    @error('youtubeLink') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col-12 text-right">
                                                    <div class="action-btn" style="text-align: right; margin-top: 40px;">
                                                        <a type="button" href="/admin/video" class="btn btn-danger"> @lang("website.cancel") </a>
                                                        <button type="submit" class="btn btn-success"> @lang("website.save") </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
