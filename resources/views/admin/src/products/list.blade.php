@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.manage_products")</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/product/add" class="btn btn-info">+@lang("website.new_product")</a>
                                @if(count($removed_products)>0)
                                    <a href="/admin/products/revert"
                                       class="btn btn-secondary">@lang("website.revert_products")
                                        ({{count($removed_products)}})</a>
                                @endif
                            </div>
                        </div>
                        <hr/>
                        <div>
                            <form class="w-100" action="" method="GET" id="products-form">
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
                                            <th class="width-180px"></th>
                                            <th class="wd-15p border-bottom-0">@sortablelink('name',
                                                __('website.product'))
                                            </th>
                                            <th>@sortablelink('price', __('website.price'))</th>
                                            <th class="text-center width-130px">@lang("website.stock")</th>
                                            <th class="text-center">@lang("website.action")</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>
                                                    <img
                                                        src="{{\App\Library\ProductsHelper::get_product_image($product)}}"
                                                        class="height-40" alt="img">
                                                <td>
                                                    @foreach(\App\Library\LibHelper::languages as $lang)
                                                        {{$lang}}
                                                        : {{ \App\Library\ConfigurationHelper::echoJson($product->name,$lang) }}
                                                        <br/>
                                                    @endforeach
                                                </td>
                                                <td>{{ $product->price }} €</td>
                                                <td>
                                                    <?php $flag = \App\Library\ProductsHelper::checkStockStatus($product->id); ?>
                                                    @if($flag == true)
                                                        <span
                                                            class="d-block text-center rounded px-2 py-1 small border border-info bg-info">@lang("website.in_stock")</span>
                                                    @else
                                                        <span
                                                            class="d-block text-center rounded px-2 py-1 small border border-info bg-outline-info text-info">@lang("website.out_of_stock")</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" style="min-width: 200px;">

                                                    <a href="/show/{{ $product->id }}" target="_blank"
                                                       style="color: #888ea8; font-size: 20px;"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="Front View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="/admin/product/show/{{$product->id}}" title="Edit"
                                                       data-toggle="tooltip"
                                                       data-placement="top" >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 24 24"
                                                             fill="none" stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-edit-2">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="/admin/product/clone/{{ $product->id }}"
                                                       style="color: #888ea8;" data-toggle="tooltip"
                                                       data-placement="top"  title="Clone">
                                                        <svg version="1.1" class="feather feather-check-circle"
                                                             id="Layer_1"
                                                             xmlns="http://www.w3.org/2000/svg"
                                                             width="20" height="20" x="0px" y="0px"
                                                             viewBox="0 0 115.77 122.88"
                                                             style="enable-background:new 0 0 115.77 122.88"
                                                             xml:space="preserve"><style type="text/css">.st0 {
                                                                    fill-rule: evenodd;
                                                                    clip-rule: evenodd;
                                                                }</style>
                                                            <g>
                                                                <path class="st0"
                                                                      d="M89.62,13.96v7.73h12.19h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02v0.02 v73.27v0.01h-0.02c-0.01,3.84-1.57,7.33-4.1,9.86c-2.51,2.5-5.98,4.06-9.82,4.07v0.02h-0.02h-61.7H40.1v-0.02 c-3.84-0.01-7.34-1.57-9.86-4.1c-2.5-2.51-4.06-5.98-4.07-9.82h-0.02v-0.02V92.51H13.96h-0.01v-0.02c-3.84-0.01-7.34-1.57-9.86-4.1 c-2.5-2.51-4.06-5.98-4.07-9.82H0v-0.02V13.96v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07V0h0.02h61.7 h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02V13.96L89.62,13.96z M79.04,21.69v-7.73v-0.02h0.02 c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v64.59v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h12.19V35.65 v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07v-0.02h0.02H79.04L79.04,21.69z M105.18,108.92V35.65v-0.02 h0.02c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v73.27v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h61.7h0.02 v0.02c0.91,0,1.75-0.39,2.37-1.01c0.61-0.61,1-1.46,1-2.37h-0.02V108.92L105.18,108.92z"/>
                                                            </g></svg>
                                                    </a>
                                                    @if($product->status==0)
                                                        <a href="{{url('/admin/product/'.$product->id.'/activate')}}"
                                                           data-toggle="tooltip"
                                                           data-placement="top" title="Activate">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20"
                                                                 viewBox="0 0 24 24"
                                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round"
                                                                 stroke-linejoin="round"
                                                                 class="feather feather-check-circle">
                                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                            </svg>

                                                        </a>
                                                    @else
                                                        <a href="{{url('/admin/product/'.$product->id.'/deactivate')}}"
                                                           data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="Deactivate">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20"
                                                                 viewBox="0 0 24 24"
                                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round"
                                                                 stroke-linejoin="round"
                                                                 class="feather feather-x-circle">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                                            </svg>
                                                        </a>
                                                    @endif

                                                    <a href="{{url('/admin/product/'.$product->id.'/archive')}}"
                                                       data-toggle="tooltip" data-placement="top"
                                                       title="Archive">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 24 24"
                                                             fill="none" stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center text-center">
                                {!! $products->appends(Request::except('page'))->render('pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm() {
            document.getElementById('products-form').submit();
        }
    </script>
@endsection
