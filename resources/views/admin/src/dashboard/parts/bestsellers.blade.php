<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-table-three p-15">
        <div class="widget-heading">
            <h5 class="">@lang("website.top_selling_product")</h5>
        </div>
        <div class="widget-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            <div class="th-content">@lang("website.product_code")</div>
                        </th>
                        <th>
                            <div class="th-content">@lang("website.product")</div>
                        </th>
                        <th>
                            <div class="th-content th-heading">@lang("website.price")</div>
                        </th>
                        <th>
                            <div class="th-content">@lang("website.sold")</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $bestsellers = \App\Library\DashboardHelper::getBestsellers(); ?>
                    @foreach($bestsellers as $bestseller)
                        @if(isset($bestseller->product))
                            <tr>
                                <td>
                                    <div class="td-content product-name">
                                        @if(\Illuminate\Support\Str::length($bestseller->product->code)>8)
                                            {{\Illuminate\Support\Str::substr($bestseller->product->code,0,8)}}
                                            ..
                                        @else
                                            {{$bestseller->product->code}}
                                        @endif
                                    </div>
                                </td>
                                @if(count($bestseller->product->images))
                                    <td>
                                        <div class="td-content product-name"><img
                                                src="{{$bestseller->product->images[0]->image}}"
                                                alt="product">
                                            @if(\Illuminate\Support\Str::length(\App\Library\LibHelper::echoJson($bestseller->product->name,__('website.lang')))>10)
                                                {{\Illuminate\Support\Str::substr(\App\Library\LibHelper::echoJson($bestseller->product->name,__('website.lang')),0,10)}}
                                                ..
                                            @else
                                                {{\App\Library\LibHelper::echoJson($bestseller->product->name,__('website.lang'))}}
                                            @endif

                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <div class="td-content product-name"><img src=""
                                                                                  alt="product">
                                            {{\App\Library\LibHelper::echoJson($bestseller->product->name,__('website.lang'))}}
                                        </div>
                                    </td>
                                @endif
                                <td>
                                    <div class="td-content"><span
                                            class="pricing">{{$bestseller->product->price}}{!! $conf->currency !!}</span>
                                    </div>
                                </td>
                                <td>
                                    <div
                                        class="td-content">{{$bestseller->sumqty}}</div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
