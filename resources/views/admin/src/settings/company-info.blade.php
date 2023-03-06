@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mt-4 mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>@lang("website.shop_information")</h4>
                                </div>
                            </div>
                            <hr/>
                            <form action="{{url('/admin/company_info/set_shop_information')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            @foreach(\App\Library\LibHelper::languages as $lang)
                                                <div class="col-12">
                                                    <div class="statbox widget box box-shadow-none">
                                                        <label>@lang("website.shop_information") ({{$lang}})</label>
                                                        <textarea class="form-control min-height-300 textEditor"
                                                                  name="shop_information_{{$lang}}"
                                                                  placeholder="*@lang("website.insert_shop_information")"
                                                                  required>
                                                                        {{$conf->shop_information[$lang] ?? old('shop_information_'.$lang)}}
                                                                    </textarea>
                                                        @error('shop_information_'.$lang) <span
                                                            class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12 text-right">
                                            <div class="action-btn align-right mt-40">
                                                <a type="button" href="/admin"
                                                   class="btn btn-outline-info"> @lang("website.cancel") </a>
                                                <button type="submit"
                                                        class="btn btn-info"> @lang("website.update") </button>
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

