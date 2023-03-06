@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.pages_banners")</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/section_banner/add"
                                   class="btn btn-info">+ @lang("website.add_banner")</a>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-12 p-0 pt-3 pb-3">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="w-20">@lang("website.image")</th>
                                        <th class="center">@lang("website.page")</th>
                                        <th>@lang("website.status")</th>
                                        <th class="text-center">@lang("website.action")</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($banners)>0)
                                        @foreach($banners as $banner)
                                            <tr class="height-150">
                                                <td>
                                                    <img src="{{asset($banner->image) ?? ""}}" alt="image"
                                                         class="banner-img banner-image-size">
                                                </td>
                                                <td class="center">
                                                    @lang('website.'.$banner->page)
                                                </td>
                                                <td>
                                                    @if($banner->status == 0)
                                                        <span
                                                            class="badge outline-badge-info">@lang("website.inactive")</span>
                                                    @else
                                                        <span class="badge badge-info">@lang("website.active")</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <a href="/admin/section_banner/show/{{ $banner->id }}"
                                                           data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-edit-2">
                                                                <path
                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                            </svg>
                                                        </a>
                                                        @if($banner->status==0)
                                                            <a href="/admin/section_banner/{{ $banner->id }}/activate"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Activate">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20" viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor" stroke-width="2"
                                                                     stroke-linecap="round" stroke-linejoin="round"
                                                                     class="feather feather-check-circle">
                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                                </svg>
                                                            </a>
                                                        @elseif($banner->status==1)
                                                            <a href="/admin/section_banner/{{ $banner->id }}/deactivate"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Deactivate">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20" viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor" stroke-width="2"
                                                                     stroke-linecap="round" stroke-linejoin="round"
                                                                     class="feather feather-x-circle">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        <a href="/admin/section_banner/{{ $banner->id }}/delete"
                                                           data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20" viewBox="0 0 24 24"
                                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round"
                                                                 stroke-linejoin="round"
                                                                 class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </a>

                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
