@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>@lang("website.add_filter")</h4>
                            </div>
                        </div>
                        <hr/>
                        <form action="{{url('/admin/filter/store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$filter->id ?? 0}}" name="filter_id"/>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="row">
                                            @foreach(\App\Library\LibHelper::languages as $lang)
                                                <div class="col-md-6">
                                                    <label for="filter-title">Title {{$lang}}</label>
                                                    <input type="text" name="title[{{$lang}}]" class="form-control"
                                                           id="filter-title"
                                                           @if(isset($filter))
                                                           value="{{strtolower($filter->title[$lang]) ?? old('title['.$lang.']')}}"
                                                           @endif
                                                           required
                                                    >
                                                    @error('title['.$lang.']') <span
                                                        class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="filter-parent">@lang('website.filter-parent')</label>
                                                <small>* @lang("website.select_parent_of_that_filter")
                                                </small>
                                                <select class="form-control" name="parent_id" id="filter-parent"
                                                        required>
                                                    <option value=""></option>
                                                    <option value="0"
                                                            @if(isset($filter) && $filter->parent_id==0) selected @endif>
                                                        -
                                                    </option>
                                                    @foreach($main_filters as $f)
                                                        <option value="{{$f->id}}"
                                                                @if(isset($filter) && $filter->parent_id==$f->id)
                                                                selected @endif
                                                        >{{$f->title['en'] ?? old('title')}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id') <span
                                                    class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <div class="action-btn align-right mt-40">
                                        <a type="button" href="/admin/filters"
                                           class="btn btn-outline-info"> @lang("website.cancel") </a>
                                        <button type="submit" class="btn btn-info"> @lang("website.save") </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
