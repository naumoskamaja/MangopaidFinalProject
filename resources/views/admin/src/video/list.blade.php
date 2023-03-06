@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.".$page)</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/video/add" class="btn btn-primary">+ @lang("website.add-video-banner")</a>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-12 p-0 pt-3 pb-3">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>@lang("website.title")</th>
                                        <th>@lang("website.description")</th>
                                        <th>@lang("website.link")</th>
                                        <th>@lang("website.youtube-link")</th>
                                        <th class="text-center">@lang("website.status")</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $video)
                                        <tr style="height: 225px !important;">
                                            <td class="text-center">
                                               {{$video->title}}
                                            </td>
                                            <td class="text-center">
                                               {{$video->description}}
                                            </td>
                                            <td class="text-center">
                                               {{$video->link}}
                                            </td>
                                            <td class="text-center">
                                                {{$video->youtube_link}}
                                            </td>

                                            <td>
                                                @if($video->status==0)
                                                    <span class="d-block text-center rounded px-2 py-1 small border border-danger bg-danger">@lang("website.deactive")</span>
                                                @else
                                                    <span class="d-block text-center rounded px-2 py-1 small border border-success bg-success">@lang("website.active")</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="/admin/video/show/{{$video->id}}" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>

                                                @if($video->status==1)
                                                    <a href="/admin/video/{{$video->id}}/deactivate" data-toggle="tooltip" data-placement="top" title="Deactivate"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>
                                                @else
                                                    <a href="/admin/video/{{$video->id}}/activate"  data-toggle="tooltip" data-placement="top" title="Activate"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
