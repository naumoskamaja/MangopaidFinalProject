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
                                                class="yiv4681228628header-text">
                                                <div
                                                    style="direction:ltr;font-family:Arial;font-size:10px;line-height:20px;text-align:center;color:#000000;">
                                                    <p style="font-size: 10px; direction:ltr;margin:0 0 18px;text-transform:uppercase;">
                                                        <a href="{{$myData['pageUrl']}}">Visit Site</a></p>
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
                        class="yiv4681228628mj-column-per-100 yiv4681228628outlook-group-fix">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                               style="direction:ltr;">
                            <tbody style="direction:ltr;">
                            <tr style="direction:ltr;">
                                <td style="direction:ltr;vertical-align:top;padding:0;" valign="top">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="direction:ltr;" width="100%">
                                        <tbody>
                                        {!! html_entity_decode($myData['content']) !!}
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
                                           style="direction:ltr;" width="100%"></table>
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
