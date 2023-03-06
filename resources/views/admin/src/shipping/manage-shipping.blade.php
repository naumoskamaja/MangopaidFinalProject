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
                                    <h4>@lang("website.shipping_information")</h4>
                                </div>
                            </div>
                            <hr/>
                            <form action="{{url('/admin/shipping/setShipping')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <?php $shippingData = json_decode($conf->shipping_json, true); ?>
                                            <table id="example" class="table table-hover" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>@lang('website.region')</th>
                                                    <th>@lang('website.min_price_for_free_shipping')</th>
                                                    <th>@lang('website.shipping_price')</th>
                                                    <th>@lang('website.working_days')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $regions = \App\Library\ConstHelper::regions;?>
                                                @foreach($regions as $region)
                                                    <tr>
                                                        <td>@lang('website.'.$region)</td>
                                                        <td><input type="text" id="row-1-min-price" class="form-control"
                                                                   name="min_price-{{$region}}"
                                                                   value="{{$shippingData[$region]['min_price'] ?? 0}}"
                                                                   placeholder="4000"></td>
                                                        <td><input type="text" id="row-1-shipping"
                                                                   class="form-control"
                                                                   name="shipping_price-{{$region}}"
                                                                   value="{{$shippingData[$region]['shipping_price'] ?? 0}}"
                                                                   placeholder="180"></td>
                                                        <td><input type="text" id="row-2-days" class="form-control"
                                                                   name="working_days-{{$region}}"
                                                                   value="{{$shippingData[$region]['working_days'] ?? ''}}"
                                                                   placeholder="2-3"></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>@lang('website.region')</th>
                                                    <th>@lang('website.min_price_for_free_shipping')</th>
                                                    <th>@lang('website.shipping_price')</th>
                                                    <th>@lang('website.working_days')</th>
                                                </tr>
                                                </tfoot>
                                            </table>
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
@endsection
