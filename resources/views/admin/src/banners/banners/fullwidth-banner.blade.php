<h5>Fullwidth Banner</h5>
<div class="row">
    <?php $fullwidth_banners = \App\Library\BannersHelper::getBannersAdmin()['fullwidth_banners'] ?>
    @if(count($fullwidth_banners)>0)
        <div class="col-12 pt-3 pb-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="w-20">@lang("website.image")</th>
                    <th>@lang("website.title")</th>
                    <th>@lang("website.subtitle")</th>
                    <th class="w-30">@lang("website.description")</th>
                    <th>@lang("website.position")</th>
                    <th>@lang("website.order")</th>
                    <th>@lang("website.status")</th>
                    <th class="text-center">@lang("website.action")</th>
                </tr>
                </thead>
                <tbody>
                <?php $fullwidth_banners = \App\Library\BannersHelper::getBannersAdmin()['fullwidth_banners'] ?>
                @foreach($fullwidth_banners as $banner)
                    <tr>
                        <td>
                            <img src="{{asset($banner->image)}}" alt="image" class="banner-img height-80">
                        </td>
                        <td>
                            {{$banner->title}}
                        </td>
                        <td>
                            {{$banner->subtitle}}
                        </td>
                        <td>
                            {{$banner->description}}
                        </td>
                        <td>
                            <span>Fullwidth Banner with Text (2114px/600px)</span>
                        </td>
                        <td>{{$banner->order}}</td>
                        <td>
                            @if($banner->status == 0)
                                <span class="badge outline-badge-info">@lang("website.inactive")</span>
                            @else
                                <span class="badge badge-info">@lang("website.active")</span>
                            @endif
                        </td>
                        <td class="text-center" style="width: 200px">
                            <ul class="table-controls">
                                @if($banner->order!=count($fullwidthBanners))
                                    <a href="/admin/banner/{{$banner->place}}/{{$banner->id}}/down"
                                       style="color: #888ea8; font-size:20px;"
                                       class="fa fa-arrow-down"></a>
                                @endif
                                @if($banner->order!=1)
                                    <a href="/admin/banner/{{$banner->place}}/{{$banner->id}}/up"
                                       style="color: #888ea8; font-size:20px;"
                                       class="fa fa-arrow-up"></a>
                                @endif
                                <a href="/admin/banner/show/{{ $banner->id }}" data-toggle="tooltip"
                                   data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>
                                @if($banner->status==0)
                                    <a href="/admin/banner/{{ $banner->id }}/activate" data-toggle="tooltip"
                                       data-placement="top" title="Activate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check-circle">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </a>
                                @elseif($banner->status==1)
                                    <a href="/admin/banner/{{ $banner->id }}/deactivate" data-toggle="tooltip"
                                       data-placement="top" title="Deactivate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-x-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </a>
                                @endif
                                <a href="/admin/banner/{{ $banner->id }}/delete" data-toggle="tooltip"
                                   data-placement="top"
                                   title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-trash-2">
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
                </tbody>
            </table>
        </div>
    @else
        <div class="col-lg-12 align-center ptb-30">
            There are no banner yet.
        </div>
    @endif
</div>
<hr>

