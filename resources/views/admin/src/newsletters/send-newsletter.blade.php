@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.send_newsletter")</h4>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            <div class="widget-content widget-content-area br-6">
                                <form action="{{url('/admin/newsletter/send/'.$newsletter->id) }}" method="post"
                                      enctype="multipart/form-data">
                                    <div class="row mb-5">
                                        <div class="col-lg-6">
                                            <p class="align-left"></p>
                                            <div
                                                class="widget-content widget-content-area max-image-100 newsletter-content align-center">
                                                {!! html_entity_decode($newsletter->content) !!}
                                            </div>
                                        </div>

                                        <div class="col-lg-6 widget-content widget-content-area">
                                            <div>
                                                @if (session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <p class="align-left">@lang("website.select_subscribers")</p>
                                                <form class="w-100" action="" method="GET" id="send-newsletter">
                                                    @csrf
                                                    <div class="row mb-4">
                                                        <div class="col-md-12 mb-20">
                                                            <input name="search"
                                                                   placeholder="@lang("website.search_here").."
                                                                   type="text"
                                                                   class="form-control"
                                                                   value="{{$search}}" onkeyup="submitForm()"
                                                            />
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="newsletter-subscribers-sections">
                                                    @foreach($subscribers_list as $subscriber)
                                                        <div class="n-chk">
                                                            <label class="new-control new-checkbox checkbox-success">
                                                                <input type="checkbox" value="{{$subscriber}}"
                                                                       name="selectedSubscribers[]"
                                                                       class="new-control-input">
                                                                <span
                                                                    class="new-control-indicator subscriber-name"></span>{{$subscriber}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="align-right mt-40">
                                                    <button type="submit"
                                                            class="btn btn-info">@lang("website.send")</button>
                                                    <a href="{{url('/admin/newsletter/send_to_all/'.$newsletter->id)}}"
                                                       type="button"
                                                       class="btn btn-info">@lang("website.send_to_all")</a>
                                                </div>
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
    <script>
        function submitForm() {
            document.getElementById('send-newsletter').submit();
        }
    </script>
@endsection
