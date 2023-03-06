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
                                                    style="direction:ltr;font-weight:bold;font-family:Arial;text-align:center;color:#000000;font-size:20px;line-height:20px;margin-top:50px;">
                                                    One new message (help request)
                                                </div>
                                            </td>
                                        </tr>

                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv4681228628header-text">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#000000;">
                                                    <p style="direction:ltr;margin:0 0 18px;text-transform:uppercase;">
                                                        YOU HAVE RECEIVED ONE NEW MESSAGE FROM:</p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:15px 0 20px;"
                                                class="yiv4681228628order-detail-btn">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                       role="presentation"
                                                       style="direction:ltr;border-collapse:separate;line-height:100%;">
                                                    <tbody>
                                                    <tr style="direction:ltr;">
                                                        <td align="center"
                                                            style="direction:ltr;font-size:0px;padding:0;"
                                                            class="yiv4681228628address-text">
                                                            <div
                                                                style="direction:ltr;max-width:358px;font-family:Arial;font-size:14px;text-align:center;color:#000000;line-height:19px;">  {{$myData['email']}}  </div>
                                                        </td>
                                                    </tr>
                                                    <tr style="direction:ltr;">
                                                        <td align="center"
                                                            style="direction:ltr;font-size:0px;padding:0;"
                                                            class="yiv4681228628address-text">
                                                            <div
                                                                style="direction:ltr;max-width:358px;font-family:Arial;font-size:14px;text-align:center;color:#000000;line-height:19px;">  {{$myData['phone']}}  </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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
                                            <td align="center"
                                                style="direction:ltr;padding-top:8px;text-transform:uppercase;font-size:0px;padding:0;line-height:19px;padding-bottom:38px;"
                                                class="yiv4681228628send-time-description">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#000000;">
                                                    <div style="direction:ltr;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv4681228628address-text">
                                                <div
                                                    style="direction:ltr;max-width:358px;font-family:Arial;font-size:14px;text-align:center;color:#000000;line-height:19px;">
                                                    <span
                                                        style="text-decoration: underline"> {{$myData['email']}}</span>: {{$myData['message']}}
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
                                                    Target Product
                                                </div>
                                            </td>
                                        </tr>


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
                                                                @if(isset($myData['product']->images[0]))src="{{asset($myData['product']->images[0]->image)}}"
                                                                @endif style="direction:ltr;border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;"
                                                                width="240"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#000000;"></div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;text-transform:uppercase;color:#000000;"> {{$myData['product']->name['en']}} </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:14px;line-height:20px;text-align:center;color:#7f7f7f;"> {{$myData['product']->code}} </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv8343871452product-custom-warn">
                                                <div
                                                    style="direction:ltr;margin-top:10px;font-style:italic;font-family:Arial;line-height:20px;text-align:center;color:#ff930b;font-size:12px;"></div>
                                            </td>
                                        </tr>

                                        <tr style="direction:ltr;">
                                            <td align="center" style="direction:ltr;font-size:0px;padding:0;"
                                                class="yiv8343871452product-price">
                                                <div
                                                    style="direction:ltr;text-transform:uppercase;font-family:Arial;text-align:center;color:#000000;font-size:18px;line-height:17px;margin-top:10px;"> {{$myData['product']->price}}
                                                    &nbsp;€
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="direction:ltr;">
                                            <td style="direction:ltr;font-size:0px;">

                                                <div style="direction:ltr;min-height:50px;"> &nbsp;</div>

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
