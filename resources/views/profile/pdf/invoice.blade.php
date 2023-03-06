<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="2">
            <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path($conf->logo)))}}" style="max-height: 40px !important;"/>

        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td width="49%">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;">
                                    Order Number:
                                    {{$order->id}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:15px;">
                                    From
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;">{{$conf->company_name}} </td>
                            </tr>
                            <tr>
                                <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;"> {{$conf->address}}</td>
                            </tr>
                            <tr>
                                <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;">
                                    Email: {{$conf->email}}  </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;"> @lang("website.phone_number")
                                    : {{$conf->phone}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td width="51%" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;"
                        align="right"></td>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="right">
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="right">
                        Date : {{$order['created_at']}}</td>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:15px;" align="right">
                        To:
                    </td>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;"
                        align="right">{{$user->name}}</td>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;"
                        align="right">{{$user->tel}}</td>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;"
                        align="right">{{$user->email}}</td>
                </tr>
                <tr>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;" align="right">
                        <div>{{$user->address}}</div>
                        <div>{{$user->zip}} {{$user->city}}, {{$user->country}}</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"
                        width="15%" height="32" align="center">
                        SKU
                    </th>
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:12px; border-bottom:1px solid #B5B5C3;"
                        width="20%" height="32" align="center"> @lang("website.title")</th>
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"
                        width="15%" align="center"> @lang("website.size")</th>
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"
                        width="10%" align="center"> @lang("website.price")</th>
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"
                        width="10%" align="center"> @lang("website.quantity")</th>
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"
                        width="15%" align="center"> @lang("website.total")</th>
                </tr>
                @foreach($order->items as $item)
                    <tr style="border-bottom:1px solid rgba(0, 0, 0, 0.1); padding:40px 0 !important; line-height: 30px;">
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;" height="32" align="left" key={indexProduct}>@if($item->sku!="") {{$item->sku}} @else {{$item->product->code}} @endif</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;" align="center">{{\App\Library\LibHelper::echoJson($item->product->name,__('website.lang'))}}</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;" align="center">@if($item->size!="") {{$item->size}}@else - @endif</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;" align="center">{!! \App\Library\ConfigurationHelper::currency($item->price)!!}</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;" align="center"> {{$item->qty}}</td>
                        <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;"
                            align="right">
                            {!! \App\Library\ConfigurationHelper::currency($item->price * $item->qty)!!}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr style="background: #f5f5f5">
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border: none;"
                        width="15%" height="32" align="left">@lang("website.subtotal")</th>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border: none;"
                        align="right">
                        {!! \App\Library\ConfigurationHelper::currency($order->subtotal)!!}
                    </td>
                </tr>
                <tr style="background: #f5f5f5">
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border: none;"
                        width="15%" height="32" align="left">@lang("website.discount")</th>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border: none;"
                        align="right">
                        {!! \App\Library\ConfigurationHelper::currency($order->discount)!!}
                    </td>
                </tr>
                <tr style="background: #f5f5f5;">
                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border: none;"
                        width="15%" height="40" align="left">@lang("website.shipping_price")</th>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border: none;"
                        align="right">
                        {!! \App\Library\ConfigurationHelper::currency($order->shipping_price)!!}
                    </td>
                </tr>

                <tr style="background: #f5f5f5">
                    <th style="text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:18px; border: none;"
                        width="20%" height="40" align="left"> @lang("website.total")</th>
                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:18px; border: none;"
                        align="right">
                        {!! \App\Library\ConfigurationHelper::currency($order->total)!!}
                    </td>
                </tr>
{{--                <tr style="background: #eeeef8">--}}
{{--                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        width="15%" height="32" align="center">@lang("website.subtotal")</th>--}}
{{--                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        width="20%" height="32" align="center"> @lang("website.discount")</th>--}}
{{--                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        width="15%" align="center"> @lang("website.shipping")</th>--}}
{{--                    <th style="color: #B5B5C3 !important; text-transform: uppercase; font-family:Verdana, Geneva, sans-serif; font-weight:500; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px; border-top:1px solid #333; border-bottom:1px solid #333; border-right:1px solid #333;"--}}
{{--                        width="15%" align="center"> @lang("website.total")</th>--}}
{{--                </tr>--}}
{{--                <tr style="border-bottom:1px solid rgba(0, 0, 0, 0.1);--}}
{{--                                    padding:40px 0 !important; line-height: 55px;">--}}

{{--                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        align="center">--}}
{{--                        {!! \App\Library\ConfigurationHelper::currency($order->subtotal)!!}--}}
{{--                    </td>--}}
{{--                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        align="center">--}}
{{--                        {!! \App\Library\ConfigurationHelper::currency($order->discount)!!}--}}
{{--                    </td>--}}
{{--                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        align="center">--}}
{{--                        {!! \App\Library\ConfigurationHelper::currency($order->shipping_price)!!}--}}

{{--                    </td>--}}
{{--                    <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px; border-bottom:1px solid #B5B5C3;"--}}
{{--                        align="center">--}}
{{--                        {!! \App\Library\ConfigurationHelper::currency($order->total)!!}--}}

{{--                    </td>--}}

{{--                </tr>--}}
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    @if($order->comment!=null)
        <tr>
            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:600; font-size:13px;" colspan="2">Please
                Note:
            </td>
        </tr>
        <tr>
            <td style="font-family:Verdana, Geneva, sans-serif; font-weight:300; font-size:13px;"
                colspan="2">{{$order->comment}}</td>
        </tr>
    @endif
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>
</body>
</html>
