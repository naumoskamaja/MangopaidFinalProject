@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <form action="{{url('/admin/action_category/store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="action_id" value="{{$action->id ?? 0}}">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="category">
                                        @lang("website.select_category")
                                    </label>
                                    <select id="category" class="form-control" name="category_id" required>
                                        <option value="">@lang("website.select_a_category")</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @if(isset($action) && $action->category_id==$category->id) selected @endif
                                            > {{$category->title['en']}}</option>
                                        @endforeach
                                        @error('category_id') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="new_price">
                                        @lang("website.discount") (%)
                                    </label>
                                    <input type="number" min="0.00" step="0.10" name="discount" class="form-control" value="{{$action->discount ?? old('discount')}}" required>
                                    @error('discount') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="valid_till">
                                        @lang("website.valid_till")@lang("website.date")
                                    </label>
                                    <?php $today = \App\Library\ConfigurationHelper::getTodaysDate(); ?>
                                    <input type="date" min="{{$today}}" name="valid_till" class="form-control"
                                           value="{{$action->valid_till ?? old('valid_till')}}" required>
                                    @error('valid_till') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 text-right">
                                    <div class="action-btn align-right mt-40">
                                        <a type="button" href="/admin/action_categories"
                                           class="btn btn-outline-info"> @lang("website.cancel") </a>
                                        <button type="submit"
                                                class="btn btn-info"> @lang("website.save") </button>
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
