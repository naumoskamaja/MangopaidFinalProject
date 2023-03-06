@extends('admin.layout.app')
@section('content')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.newsletters")</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/newsletter/add"
                                   class="btn btn-info">+ @lang("website.add_newsletter")</a>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            <form class="w-100" action="" method="GET" id="newsletters-form">
                                <div class="row">
                                    <div class="col-md-12 mb-20">
                                        <input name="search" placeholder="Search here.." type="text"
                                               class="form-control"
                                               value="{{$search}}" onkeyup="submitForm()"
                                        />
                                    </div>
                                </div>
                            </form>
                            <hr/>
                            <div class="row">
                                <div class="col-12 p-0 pt-3 pb-3">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>@sortablelink('id', __('website.id'))</th>
                                            <th>@sortablelink('title', __('website.title'))</th>
                                            <th class="text-center">@lang("website.action")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($newsletters as $newsletter)
                                            <tr>
                                                <td>{{ $newsletter->id }}</td>
                                                <td>{{ $newsletter->title }}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <a href="/admin/newsletter/show/{{ $newsletter->id }}"
                                                           class="text-warning" data-toggle="tooltip"
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
                                                        <a class="text-danger" data-toggle="modal"
                                                           data-target="#deleteModal{{$newsletter->id}}"
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
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModal{{$newsletter->id}}"
                                                             tabindex="-1"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title"
                                                                            id="exampleModalLabel">@lang("website.are_you_sure_you_want_to_delete_this_item")</h6>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="widget-content widget-content-area">
                                                                            <a href="{{'/admin/newsletter/'.$newsletter->id.'/delete'}}"
                                                                               class="btn btn-info"
                                                                               data-toggle="tooltip"
                                                                               data-placement="top" title="Delete"
                                                                               data-dismiss="modal">
                                                                                @lang("website.yes")
                                                                            </a>
                                                                            <a data-dismiss="modal" aria-label="Close"
                                                                               class="btn btn-outline-info">
                                                                                @lang("website.cancel")
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </td>
                                                <td class="text-center">
                                                    <a href="/admin/newsletter/preview/{{ $newsletter->id }}"
                                                       class="text-secondary"
                                                       data-toggle="tooltip" data-placement="top" title="View">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 24 24"
                                                             fill="none" stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-eye">
                                                            <path
                                                                d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="/admin/newsletter/send/{{ $newsletter->id }}"
                                                       class="badge badge-info"
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="Send">@lang("website.send")</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $newsletters->appends(Request::except('page'))->render('pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm(){
            document.getElementById('newsletters-form').submit();
        }
    </script>

@endsection
