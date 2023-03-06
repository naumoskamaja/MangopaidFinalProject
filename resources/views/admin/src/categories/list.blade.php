@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.categories")</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/category/add" class="btn btn-info">+@lang("website.add_category")</a>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            <form class="w-100" action="" method="GET" id="categories-form">
                                <div class="row">
                                    <div class="col-md-12 mb-20">
                                        <input name="search" placeholder="Search here.." type="text"
                                               class="form-control"
                                               value="{{$search}}" onkeyup="submitForm()"
                                        />
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12 p-0 pt-3 pb-3">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>@sortablelink('id', __('website.id'))</th>
                                            <th>@sortablelink('title', __('website.category_name'))</th>
                                            <th>@lang("website.image")</th>
                                            <th>@lang("website.parent_category")</th>
                                            <th>@lang("website.status")</th>
                                            <th class="text-center">@lang("website.count-products")</th>
                                            <th class="text-center">@lang("website.action")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>
                                                    <a href="" class="link-title"> {{$category->title['en']}}</a>
                                                </td>

                                                <td class="small">
                                                    @if(isset($category->image) && $category->image!=null)
                                                        <img src="{{asset($category->image)}}" alt="icon"
                                                             class="height-60">
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="col-fit">
                                                    @if(isset($category->parent)) {{$category->parent->title['en']}} @else
                                                        - @endif
                                                </td>

                                                <td>
                                                    @if($category->status == 0)
                                                        <span
                                                            class="badge outline-badge-info">@lang("website.inactive")</span>
                                                    @else
                                                        <span class="badge badge-info">@lang("website.active")</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($category->status==1)
                                                        <a href="/admin/category/count_products/{{ $category->id }}"
                                                           data-toggle="tooltip"
                                                           data-placement="top" title="Count"><span
                                                                class="badge count-badge">@lang('website.count-products')</span>
                                                        </a>({{$category->counted_products}})
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <a href="/admin/category/show/{{ $category->id }}"
                                                           data-toggle="tooltip"
                                                           data-placement="top" title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20" viewBox="0 0 24 24"
                                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round"
                                                                 stroke-linejoin="round" class="feather feather-edit-2">
                                                                <path
                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                            </svg>
                                                        </a>
                                                        @if($category->status==0)
                                                            <a href="{{url('/admin/category/'.$category->id.'/activate')}}"
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="Activate">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor" stroke-width="2"
                                                                     stroke-linecap="round" stroke-linejoin="round"
                                                                     class="feather feather-check-circle">
                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                                </svg>
                                                            </a>
                                                        @elseif($category->status==1)
                                                            <a href="{{url('/admin/category/'.$category->id.'/deactivate')}}"
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="Deactivate">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                     height="20"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor" stroke-width="2"
                                                                     stroke-linecap="round" stroke-linejoin="round"
                                                                     class="feather feather-x-circle">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                                </svg>
                                                            </a>
                                                        @endif
                                                        <a href="{{url('/admin/category/'.$category->id.'/delete')}}"
                                                           data-toggle="tooltip" data-placement="top"
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center text-center">
                                {!! $categories->appends(Request::except('page'))->render('pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm(){
            document.getElementById('categories-form').submit();
        }
    </script>
@endsection
