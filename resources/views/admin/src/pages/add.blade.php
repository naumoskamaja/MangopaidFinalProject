@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <form action="{{url('/admin/page/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="page_id" value="{{$section->id ?? 0}}">
                            <div class="row mb-5">
                                <div class="col-lg-6 col-md-6">
                                    <label for="slug">@lang("website.slug")</label>
                                    <div class="user-zip">
                                        <?php $sections = ['about', 'privacy_policy', 'terms_and_conditions', 'home_page_info', 'faq']; ?>
                                        <select class="form-control" name="slug" id="place">
                                            <option value="">@lang("website.select_page")</option>
                                            @foreach($sections as $s)
                                                <option value="{{$s}}"
                                                        @if(isset($section) && $section->slug == $s) selected @endif>@lang("website.".$s)</option>
                                            @endforeach
                                        </select>
                                        @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                @foreach(\App\Library\LibHelper::languages as $lang)
                                    <div class="col-lg-6 col-md-12">
                                        <label for="title_{{$lang}}">@lang("website.title") ({{$lang}})</label>
                                        <input type="text" name="title_{{$lang}}" id="title_{{$lang}}"
                                               class="form-control"
                                               value="{{$section->title[$lang] ?? old('title')}}" required>
                                        @error('title_'.$lang) <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mb-5">
                                @foreach(\App\Library\LibHelper::languages as $lang)
                                    <div class="col-12">
                                        <div class="statbox widget box box-shadow-none">
                                            <label>@lang("website.content") ({{$lang}})</label>
                                            <textarea class="form-control min-height-300 textEditor"
                                                      name="content_{{$lang}}"
                                                      placeholder="*@lang("website.insert_content_of_the_page")"
                                                      required>
                            {{$section->content[$lang] ?? old('content')}}
                        </textarea>
                                            @error('content_'.$lang) <span
                                                class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mb-5">
                                <div class="col-lg-6 col-md-12">
                                    <label for="icon">@lang("website.icon")</label>
                                    <input type="file" name="icon" id="icon" class="form-control">
                                    @error('icon') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                @if(isset($section) && $section->icon!=null)
                                    <div class="col-lg-6 col-md-12">
                                        <img src="{{$section->icon}}" alt="img" style="height: 100px !important;"/>
                                    </div>
                                @endif
                            </div>

                            <div class="col-12 text-right pb-10">
                                <hr/>
                                <a type="button" class="btn btn-outline-info  mb-4 mr-2"
                                   href="/admin/pages">@lang("website.cancel")</a>
                                <button type="submit" class="btn btn-info  mb-4 mr-2">@lang("website.save")</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function () {
            for (const editor of document.getElementsByClassName("textEditor")) {
                ClassicEditor.create(editor).catch(error => {
                    console.error('hhh', error);
                });
            }
        })();
    </script>

@endsection
