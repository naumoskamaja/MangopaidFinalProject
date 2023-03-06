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
                            <div class="col-6 float-right align-right">
                                @if(isset($newsletter) && $newsletter->id!=0)
                                    <a type="button" href="/admin/newsletter/preview/{{$newsletter->id}}"
                                       class="btn btn-info mr-2">@lang("website.view")</a>
                                    <a type="button" href="/admin/newsletter/send/{{$newsletter->id}}"
                                       class="btn btn-info">@lang("website.share")</a>
                                @endif
                            </div>
                        </div>
                        <hr/>
                        <div class="widget-content widget-content-area br-6" id="editNewsletter">
                            <form action="{{url('/admin/newsletter/store') }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="newsletter_id" value="{{$newsletter->id ?? 0}}"/>
                                <div class="row mb-5">
                                    @if(isset($newsletter) && $newsletter->id!=0)
                                        @include('admin.src.newsletters.vuejs.add-products')
                                    @endif
                                    <div class="col-lg-12 col-md-12">
                                        <label for="title">@lang("website.title")</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                               value="{{$newsletter->title ?? old('title')}}" required>
                                        @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="statbox widget box box-shadow-none">
                                            <label for="contentEditor">@lang("website.content")</label>
                                            <textarea id="contentEditor" name="content"
                                                      placeholder="*@lang("website.insert_content_of_the_page")">{{$newsletter->content ?? old('content')}} </textarea>
                                            @error('content') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 text-right pb-10">
                                        <hr/>
                                        <a type="button" class="btn btn-outline-info  mb-4 mr-2"
                                           href="/admin/newsletters">@lang("website.cancel")</a>
                                        <button type="submit"
                                                class="btn btn-info  mb-4 mr-2">@lang("website.save")</button>
                                    </div>
                                    @if(isset($newsletter) && $newsletter->id!=0)
                                        @include('admin.src.newsletters.vuejs.media')
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function () {
            ClassicEditor
                .create(document.querySelector('#contentEditor'))
                .catch(error => {
                    console.error(error);
                });
        })();
    </script>

@endsection
