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
                                                style="direction:ltr;font-size:0px;padding:0;padding-top:100px;padding-bottom:10px;">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                       role="presentation"
                                                       style="direction:ltr;border-collapse:collapse;border-spacing:0px;">
                                                    <tbody style="direction:ltr;">
                                                    <tr style="direction:ltr;">
                                                        <td style="direction:ltr;width:149px;
                                                                background: #222;" width="149" ><img
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
                                                    style="direction:ltr;font-weight:bold;font-family:Arial;text-align:center;color:#000000;font-size:20px;line-height:20px;margin-top:50px;">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:30px 0;"
                                                class="yiv4681228628section-title">
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv4681228628section-title">
                                                <div
                                                    style="direction:ltr;font-weight:bold;font-family:Arial;text-align:center;color:#000000;font-size:20px;line-height:20px;margin-top:50px;">
                                                    Still thinking about it?
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:30px 0;"
                                                class="yiv4681228628section-title">
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv4681228628header-text">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#000000;">
                                                    <p style="direction:ltr;margin:0 0 18px;">
                                                        Hi {{$myData['user']->first_name}}. We saw that you left some products in your cart. It's hoping you'll
                                                        come back and see it.  The products you love are still there waiting for you.
                                                        Did you have any questions or experience any problems?
                                                        Feel free to reply
                                                        to this email and we will get back to you as fast as possible.
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td style="direction:ltr;font-size:0px;padding:0;padding-top:20px;">
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
                                                style="direction:ltr;font-size:0px;padding:0;padding-bottom:23px;"
                                                class="yiv8343871452section-title">
                                                <div
                                                    style="direction:ltr;font-weight:bold;font-family:Arial;text-align:center;color:#000000;font-size:20px;line-height:20px;margin-top:50px;">
                                                    Your Cart
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center"
                                                style="direction:ltr;font-size:0px;padding:0;padding-bottom:50px;"
                                                class="yiv8343871452product-counter">
                                                <div
                                                    style="direction:ltr;text-transform:uppercase;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#000000;">  {{count($myData['order']->items)}}
                                                    items
                                                </div>
                                            </td>
                                        </tr>

                                        @foreach($myData['order']->items as $item)
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0 0 23px;"
                                                    class="yiv8343871452product-img">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="direction:ltr;border-collapse:collapse;border-spacing:0px;">
                                                        <tbody style="direction:ltr;">
                                                        <tr style="direction:ltr;">
                                                            <td style="direction:ltr;width:240px;" width="240"><img
                                                                    height="auto"
                                                                    src="@if($item->image!="")
                                                                    {{asset($item->image)}}
                                                                    @else
                                                                    {{asset('/assets/noimg.png')}} @endif"

                                                                style="direction:ltr;border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;"
                                                                width="240"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        @if($item->size!='')
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                    class="yiv8343871452product-size">
                                                    <div
                                                        style="direction:ltr;text-transform:uppercase;font-family:Arial;text-align:center;color:#000000;font-size:20px;font-weight:bold;line-height:22px;margin-bottom:8px;">
                                                        {{$item->size}} </div>
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;">
                                                    <div
                                                        style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#000000;"></div>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;">
                                                    <div
                                                        style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;text-transform:uppercase;color:#000000;">
                                                        {{\App\Library\LibHelper::echoJson($item->product->name,'en')}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;">
                                                    <div
                                                        style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#7f7f7f;"> @if($item->sku!='') {{$item->sku}} @else {{$item->product->code}} @endif</div>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                    class="yiv8343871452product-custom-warn">
                                                    <div
                                                        style="direction:ltr;margin-top:10px;font-style:italic;font-family:Arial;line-height:20px;text-align:center;color:#ff930b;font-size:12px;"></div>
                                                </td>
                                            </tr>
                                            @if($item->color!="")
                                                <tr style="direction:ltr; height: 50px;">
                                                    <td align="center" style="direction:ltr;width:30px;">
                                                        <img
                                                            height="auto"
                                                            src="{{asset($item->color)}}"
                                                            style="direction:ltr;border:0;display:block;outline:none;text-decoration:none;height:auto;width: 30px;">
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                    class="yiv8343871452product-unit">
                                                    <div
                                                        style="direction:ltr;font-family:Arial;text-align:center;color:#000000;font-size:18px;font-weight:bold;line-height:17px;margin-top:10px;"> {{$item->qty}} </div>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                    class="yiv8343871452product-unit-label">
                                                    <div
                                                        style="direction:ltr;font-family:Arial;text-align:center;color:#959595;font-size:12px;line-height:17px;">
                                                        unit
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                    class="yiv8343871452product-price">
                                                    <div
                                                        style="direction:ltr;text-transform:uppercase;font-family:Arial;text-align:center;color:#000000;font-size:18px;line-height:17px;margin-top:10px;">
                                                        @if($item->discount>0)
                                                            <span style="text-decoration:line-through">{{ $item->price + $item->discount }}</span>
                                                        @endif
                                                        {{$item->price}}
                                                        &nbsp;Lek
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr style="direction:ltr;">
                                                <td style="direction:ltr;font-size:0px;">

                                                    <div style="direction:ltr;min-height:50px;"> &nbsp;</div>

                                                </td>
                                            </tr>
                                        @endforeach
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
                                                style="direction:ltr;font-size:0px;padding:0;padding-bottom:47px;"
                                                class="yiv4681228628section-title">
                                                <div
                                                    style="direction:ltr;font-weight:bold;font-family:Arial;text-align:center;color:#000000;font-size:20px;line-height:20px;margin-top:50px;"></div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv4681228628send-time-received">
                                                <div
                                                    style="direction:ltr;font-weight:bold;text-transform:uppercase;font-family:Arial;text-align:center;color:#000000;line-height:23px;font-size:18px;">
                                                    <div style="direction:ltr;">
                                                        <a href="{{$myData['pageUrl']}}/search" style="
                                                        color: white;
                                                        background: #222;
                                                        border: 1px solid #222;
                                                        padding: 5px 10px;
                                                        text-decoration: none;
                                                        font-weight: 300;">SHOP</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center"
                                                style="direction:ltr;padding-top:8px;text-transform:uppercase;font-size:0px;padding:0;line-height:19px;padding-bottom:38px;"
                                                class="yiv4681228628send-time-description">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#000000;">
                                                    <div style="direction:ltr;"></div>
                                                </div>
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
                <td style="direction:ltr;font-size:0px;padding:0 4%;padding-bottom:125px;padding-top:41px;text-align:center;vertical-align:top;"
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
                                                    style="direction:ltr;margin-bottom:20px;font-family:Arial;line-height:20px;text-align:center;color:#000000;font-size:12px;">
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
                                                    style="direction:ltr;margin-bottom:20px;font-family:Arial;line-height:20px;text-align:center;color:#000000;font-size:12px;">
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
