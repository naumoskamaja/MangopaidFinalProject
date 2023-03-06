@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-12">
                                <h4>@lang("website.reviews")</h4>
                            </div>

                        </div>
                        <hr/>
                        <div>
                            <form class="w-100" method="GET" id="form">
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
                                            <th>@sortablelink('first_name', __('website.user'))</th>
                                            <th>@lang("website.email")</th>
                                            <th>@lang("website.content")</th>
                                            <th>@sortablelink('product_id', __('website.product'))</th>
                                            <th> @sortablelink('rate', __('website.stars'))</th>
                                            <th>@lang("website.status")</th>
                                            <th class="text-center">@lang("website.action")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reviews as $review)
                                            <tr>
                                                <td>{{$review->id}}</td>
                                                <td>{{$review->first_name}}</td>
                                                <td>{{$review->email}}</td>
                                                <td>{{$review->comment}}</td>
                                                <td>{{\App\Library\LibHelper::echoJson($review->product->name,__('website.lang'))}}
                                                    ({{$review->product->code}})</td>
                                                <td>{{$review->rate}}</td>

                                                @if($review->status == 0)
                                                    <td><span
                                                            class="badge outline-badge-info">@lang("website.inactive")</span>
                                                    </td>
                                                @else
                                                    <td><span class="badge badge-info">@lang("website.active")</span>
                                                    </td>
                                                @endif
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        @if($review->status==0)
                                                            <a href="/admin/review/{{$review->id}}/activate"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Activate">
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
                                                        @else
                                                            <a href="/admin/review/{{$review->id}}/deactivate"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Deactivate">
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
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>@lang("website.id")</th>
                                            <th>@lang("website.user")</th>
                                            <th>@lang("website.email")</th>
                                            <th>@lang("website.content")</th>
                                            <th>@lang("website.product")</th>
                                            <th>@lang("website.stars")</th>
                                            <th>@lang("website.status")</th>
                                            <th class="text-center">@lang("website.action")</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center text-center">
                                {!! $reviews->appends(Request::except('page'))->render('pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm() {
            document.getElementById('form').submit();
        }
    </script>
@endsection
