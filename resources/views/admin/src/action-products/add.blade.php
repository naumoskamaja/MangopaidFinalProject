@extends('admin.layout.app')
@section('content')
    <?php $products = \App\Library\ProductsHelper::getActiveProducts(); ?>
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <form action="{{url('/admin/action/store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="action_id" value="{{$action->id ?? 0}}">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <label for="product">
                                        @lang("website.select_code_and_product")
                                    </label>
                                    <select name="product" class="form-control" id="select" name="product_id"
                                            onchange="selectProduct()" required>
                                        <option value="">@lang("website.select_a_product")</option>
                                        @foreach($products as $product)
                                            <option @if(isset($action) && $action->product_id == $product->id) selected
                                                    @endif value="{{$product->id}}">{{$product->code}}
                                                - {{\App\Library\LibHelper::echoJson($product->name,__('website.lang'))}}</option>
                                        @endforeach
                                        @error('product_id') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <label for="old_price">
                                        @lang("website.product_price")
                                    </label>
                                    <input type="number" min="0.00" step="0.10" id="old_price" name="old_price"
                                           readonly="readonly"
                                           class="form-control" value="{{$action->old_price ?? ''}}" required>
                                    @error('old_price') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <label for="new_price">
                                        @lang("website.sale_price")
                                    </label>
                                    <input type="number" min="0.00" step="0.10" name="new_price"
                                           value="{{$action->new_price ?? ''}}"
                                           class="form-control" required>
                                    @error('new_price') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <label for="valid_till">
                                        @lang("website.valid_till")@lang("website.date")
                                    </label>
                                    <?php $today = \App\Library\ConfigurationHelper::getTodaysDate(); ?>
                                    <input type="date" min="{{$today}}" name="valid_till" class="form-control"
                                           value="{{$action->valid_till ?? ''}}" required
                                    >
                                    @error('valid_till') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-12 text-right">
                                    <div class="action-btn align-right mt-40">
                                        <a type="button" href="/admin/actions"
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
    <script>
        function selectProduct() {
            let selectValue = document.getElementById('select').value;
            let price = 0;
            let products = {!! json_encode($products) !!};
            for (let i = 0; i < products.length; i++) {
                if (products[i].id == selectValue)
                    price = products[i].price;
            }
            document.getElementById('old_price').value = price;
        }
    </script>
@endsection
