@extends('emails.layout.app')
@section('content')
    <div style="direction: ltr; margin: 0 auto; max-width: 854px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="direction:ltr;width:100%;" width="100%">
            <tbody style="direction:ltr;">
            <tr style="direction:ltr;">
                <td style="direction:ltr;font-size:0px;padding:0 4%;text-align:center;vertical-align:top;"
                    align="center" valign="top">
                    <div
                        style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"
                        class="yiv4681228628mj-column-per-100 yiv4681228628outlook-group-fix">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                               style="direction:ltr;">
                            <tbody style="direction:ltr;">
                            <tr style="direction:ltr;">
                                <td style="direction:ltr;vertical-align:top;padding:0;" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="direction:ltr;" width="100%">
                                        <tbody>
                                        <tr style="direction:ltr;">
                                            <td align="center"
                                                style="direction:ltr;font-size:0px;padding:0;padding-top:20px;padding-bottom:20px; background: #222;">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                       role="presentation"
                                                       style="direction:ltr;border-collapse:collapse;border-spacing:0px;">
                                                    <tbody style="direction:ltr;">
                                                    <tr style="direction:ltr;">
                                                        <td style="direction:ltr;width:149px;" width="149"><img
                                                                height="auto" src="{{asset($myData['conf']->logo)}}"
                                                                width="149"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv4681228628section-title">
                                                <div
                                                    style="direction:ltr;font-family:Arial;text-align:left;color:#000000;font-size:12px;line-height:12px;margin-top:30px;">
                                                    @if($myData['order']->status==0)
                                                        Thank you for your purchase
                                                    @elseif($myData['order']->status==1)
                                                        Your order has been paid successfully
                                                    @elseif($myData['order']->status==2)
                                                        Your order has been confirmed
                                                    @elseif($myData['order']->status==3)
                                                        Your order is on its way
                                                    @elseif($myData['order']->status==4)
                                                        Your order has been shipped
                                                    @else
                                                        Your order has been rejected
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td style="direction:ltr;font-size:0px;padding:0;padding-top:20px;">
                                                <p style="direction:ltr;border-top:solid 1px #dddddd;font-size:0;margin:0px auto;width:100%;"></p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="direction:ltr;Margin:0px auto;max-width:854px;">
        <table align="left" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="direction:ltr;width:100%;" width="100%">
            <tbody style="direction:ltr;">
            <tr style="direction:ltr;">
                <td style="direction:ltr;font-size:0px;padding:0 4%;text-align:left;vertical-align:top;"
                    align="left" valign="top">
                    <div
                        style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"
                        class="yiv4681228628mj-column-per-100 yiv4681228628outlook-group-fix">
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="direction:ltr;Margin:0px auto;max-width:854px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="direction:ltr;width:100%;" width="100%">
            <tbody style="direction:ltr;">
            <tr style="direction:ltr;">
                <td style="direction:ltr;font-size:0px;padding:0 4%;text-align:center;vertical-align:top;"
                    align="center" valign="top">
                    <div
                        style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"
                        class="yiv8343871452mj-column-per-100 yiv8343871452outlook-group-fix">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                               style="direction:ltr;">
                            <tbody style="direction:ltr;">
                            <tr style="direction:ltr;">
                                <td style="direction:ltr;vertical-align:top;padding:0;" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="direction:ltr;" width="100%">
                                        <tbody>
                                        <tr style="direction:ltr;">
                                            <td align="center"
                                                style="direction:ltr;font-size:0px;padding:0;padding-bottom:20px;"
                                                class="yiv8343871452section-title">
                                                <div
                                                    style="direction:ltr;font-weight:bold;font-family:Arial;text-align:left;color:#000000;font-size:12px;line-height:20px;margin-top:20px;">
                                                    Order summary
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach($myData['order']->items as $item)
                                            <tr style="direction:ltr; display: flex; justify-content: space-between;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0 0 23px;"
                                                    class="yiv8343871452product-img">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="direction:ltr;border-collapse:collapse;border-spacing:0px;">
                                                        <tbody style="direction:ltr;">
                                                        <tr style="direction:ltr; display: flex; justify-content: space-between;">
                                                            <td style="direction:ltr;"><img
                                                                    height="auto"
                                                                    src="@if($item->color!="")
                                                                    {{asset($item->color)}}
                                                                    @elseif($item->image!="")
                                                                    {{asset($item->image)}}
                                                                    @else
                                                                        /assets/noimg.png @endif"

                                                                    style="direction:ltr;border:0;display:block;outline:none;text-decoration:none;height: 100%; width:70px;
                                                                                object-fit: contain; padding-right: 15px;"
                                                                ></td>
                                                            <td align="center"
                                                                style="direction:ltr;font-size:0px;padding:0;">
                                                                <div
                                                                    style="direction:ltr;font-family:Arial;font-size:12px;line-height:20px;text-align:left;text-transform:uppercase;color:#000000;">
                                                                    {{\App\Library\LibHelper::echoJson($item->product->name,__('website.lang'))}}
                                                                    @if($item->size!='') (size: {{$item->size}} @endif
                                                                </div>
                                                                <div
                                                                    style="direction:ltr;font-family:Arial;font-size:12px;line-height:20px;text-align:left;color:#7f7f7f;">
                                                                    @if($item->sku!='')
                                                                        {{$item->sku}}
                                                                    @else
                                                                        {{$item->product->code}}
                                                                    @endif
                                                                </div>
                                                                <div
                                                                    style="direction:ltr;font-family:Arial;text-align:left;color:#000000;font-size:12px;line-height:17px;margin-top:10px;"> {{$item->qty}}
                                                                    x {{$item->price}}
                                                                    &nbsp;Lek
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td style="direction:ltr;font-size:0px;padding:0;">
                                                    <p style="direction:ltr;border-top:solid 1px #dddddd;font-size:1;margin:0px auto;width:100%;"></p>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td style="direction:ltr;font-size:0px;">
                                                    <div style="direction:ltr;min-height:15px;"> &nbsp;</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="direction:ltr;"
                               width="100%">
                            <tbody>
                            <tr style="direction:ltr;">
                                <td align="center" style="direction:ltr;font-size:0px;padding:0;padding-bottom:23px;"
                                    class="yiv8343871452section-title">
                                    <div
                                        style="display: flex; justify-content: space-between; direction:ltr;font-family:Arial;text-align:center;color:#000000;font-size:12px;line-height:20px;margin-top:10px;">
                                        <div>
                                            Subtotal
                                        </div>
                                        <div>
                                            <div>{{$myData['order']->subtotal}} &nbsp;Lek</div>
                                        </div>
                                    </div>
                                    <div
                                        style="display: flex; justify-content: space-between; direction:ltr;font-family:Arial;text-align:center;color:#000000;font-size:12px;line-height:20px;">
                                        <div>
                                            Shipping
                                        </div>
                                        <div>
                                            <div>{{$myData['order']->shipping_price}} &nbsp;Lek</div>
                                        </div>
                                    </div>
                                    <div
                                        style="display: flex; justify-content: space-between; direction:ltr;font-family:Arial;text-align:center;color:#000000;font-size:12px;line-height:20px;">
                                        <div>
                                            Discount
                                        </div>
                                        <div>
                                            <div>{{$myData['order']->discount}} &nbsp;Lek</div>
                                        </div>
                                    </div>
                                    <div
                                        style="display: flex;  font-weight: 600; justify-content: space-between; direction:ltr;font-family:Arial;text-align:center;color:#000000;font-size:12px;line-height:20px;margin-top:20px;">
                                        <div>
                                            Total
                                        </div>
                                        <div>
                                            <div>{{$myData['order']->total}} &nbsp;Lek</div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                               style="direction:ltr;">
                            <tbody style="direction:ltr;">
                            <tr style="direction:ltr;">
                                <td style="direction:ltr;vertical-align:top;padding:0;" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="direction:ltr;" width="100%">
                                        <tbody>
                                        <tr style="direction:ltr;">
                                            <td style="direction:ltr;font-size:0px;">
                                                <p style="direction:ltr;border-top:solid 1px #dddddd;font-size:1;margin:0px auto;width:100%;"></p>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="left"
                                                style="direction:ltr;font-size:0px;padding:0;padding-bottom:15px;"
                                                class="yiv4681228628section-title">
                                                <div
                                                    style="direction:ltr;font-weight:bold;font-family:Arial;font-weight: 600; text-align:left;color:#000000;font-size:12px;line-height:12px;margin-top:20px;">
                                                    Payment processing method

                                                </div>
                                                <div
                                                    style="direction:ltr;font-family:Arial;text-align:left;color:#000000;font-size:12px;line-height:12px;padding-bottom:10px;">
                                                    @if($myData['order']->payment_method == 'bank-transfer')
                                                        Bank Transfer
                                                    @else
                                                        Cash on delivery (COD)
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="left" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv4681228628send-time-received">
                                                <div
                                                    style="direction:ltr;font-family:Arial;text-align:left;color:#000000;line-height:12px;font-size:12px;">
                                                    <div style="direction:ltr; font-weight: 600; font-weight:bold;">
                                                        Shipping Address
                                                    </div>

                                                    <div
                                                        style="direction:ltr;max-width:358px;font-family:Arial;font-size:12px;text-align:left;color:#000000;line-height:12px;">
                                                        {{$myData['order']->name}}
                                                    </div>
                                                    <div
                                                        style="direction:ltr;max-width:358px;font-family:Arial;font-size:12px;text-align:left;color:#000000;line-height:12px;">
                                                        {{$myData['order']->address}},
                                                        {{$myData['order']->zip}}
                                                        {{$myData['order']->city}}
                                                        {{$myData['order']->country}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center"
                                                style="direction:ltr;padding-top:8px;text-transform:uppercase;font-size:0px;padding:0;line-height:19px;padding-bottom:25px;"
                                                class="yiv4681228628send-time-description">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:left;color:#000000;">
                                                    <div style="direction:ltr;"></div>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr style="direction:ltr;">
                                            <td style="direction:ltr;font-size:0px;">
                                                <p style="direction:ltr;border-top:solid 1px #dddddd;font-size:1;margin:0px auto;width:100%;"></p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="direction:ltr;Margin:0px auto;max-width:854px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
               style="direction:ltr;width:100%;" width="100%">
            <tbody style="direction:ltr;">
            <tr style="direction:ltr;">
                <td style="direction:ltr;font-size:0px;padding: 20px 4% 0; text-align:center;vertical-align:top;"
                    align="center" valign="top">
                    <div
                        style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"
                        class="yiv8343871452mj-column-per-100 yiv8343871452outlook-group-fix">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                               style="direction:ltr;">
                            <tbody style="direction:ltr;">
                            <tr style="direction:ltr;">
                                <td style="direction:ltr;vertical-align:top;padding:0;" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="direction:ltr;" width="100%">
                                        <tbody>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv8343871452footer-link">
                                                <div
                                                    style="direction:ltr;font-family:Arial;line-height:20px;text-align:left;color:#000000;font-size:12px;">
                                                    <a rel="nofollow noopener noreferrer" target="_blank"
                                                       href="{{$myData['pageUrl']}}/page/terms_and_conditions"
                                                       style="direction:ltr;color:#000;letter-spacing:0.2px;text-transform:uppercase;font-size:12px;">Purchase
                                                        conditions</a></div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv8343871452footer-link">
                                                <div
                                                    style="direction:ltr;margin-bottom:20px;font-family:Arial;line-height:20px;text-align:left;color:#000000;font-size:12px;">
                                                    <a rel="nofollow noopener noreferrer" target="_blank"
                                                       href="{{$myData['pageUrl']}}/page/privacy_policy"
                                                       style="direction:ltr;color:#000;letter-spacing:0.2px;text-transform:uppercase;font-size:12px;">Privacy
                                                        policy</a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
