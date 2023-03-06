<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/frontend/images/favicon.png"/>
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/chosen.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/jquery.scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/lightbox.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/magnific-popup.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/fonts/flaticon.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/megamenu.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/dreaming-attribute.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/css/custom.css"/>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{--    <script src="//code.tidio.co/anuo0i32nxjy4an3ec5zlnyfkpdj4dq7.js" async></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <title>{{$conf->company_name ?? 'West Cosmetics'}}</title>


    <style>
        #tidio-chat-iframe {
            bottom: 50px;
        }

        .loader {
            position: fixed;
            width: 100%;
            height: 100vh;
            z-index: 999999;
            overflow: visible;
            background: #fff url('/assets/1.gif') no-repeat center center;
            opacity: 0.8;
        }
    </style>
</head>


<body>
<div class="loader hideSection" id="myScreenLoader"></div>

@yield('content')


<script src="/assets/frontend/js/jquery-1.12.4.min.js"></script>
<script src="/assets/frontend/js/bootstrap.min.js"></script>
<script src="/assets/frontend/js/chosen.min.js"></script>
<script src="/assets/frontend/js/countdown.min.js"></script>
<script src="/assets/frontend/js/jquery.scrollbar.min.js"></script>
<script src="/assets/frontend/js/lightbox.min.js"></script>
<script src="/assets/frontend/js/magnific-popup.min.js"></script>
<script src="/assets/frontend/js/slick.js"></script>
<script src="/assets/frontend/js/jquery.zoom.min.js"></script>
<script src="/assets/frontend/js/threesixty.min.js"></script>
<script src="/assets/frontend/js/jquery-ui.min.js"></script>


{{--@if(strpos(request()->url(), '/show/')!=false)--}}
{{--    <script src="/assets/frontend/js/mobilemenu2.js"></script>--}}
{{--@else--}}
{{--    <script src="/assets/frontend/js/mobilemenu.js"></script>--}}
{{--@endif--}}
<script src="/assets/frontend/js/functions.js"></script>

@yield('footer')

{{--@include('sweetalert::alert')--}}
<script>

    setTimeout(function () {
        $(".hide-div").show();
    }, 5000);

    function contProductsFound() {
        let term = $('#search_input_name').val();
        let url = '/searchAPI';
        if (term.length > 3) {
            let posting = $.post(url, {search_name: term});

            // Put the results in a div
            posting.done(function (data) {
                console.log(data);
                $('#products_found').html('Found <b>' + data.values + '</b> searched products');
                //$( "#result" ).empty().append( content );
            });
        } else {
            $('#products_found').html('Searched products');
        }
    }

    !function (window) {
        var $q = function (q, res) {
                if (document.querySelectorAll) {
                    res = document.querySelectorAll(q);
                } else {
                    var d = document
                        , a = d.styleSheets[0] || d.createStyleSheet();
                    a.addRule(q, 'f:b');
                    for (var l = d.all, b = 0, c = [], f = l.length; b < f; b++)
                        l[b].currentStyle.f && c.push(l[b]);

                    a.removeRule(0);
                    res = c;
                }
                return res;
            }
            , addEventListener = function (evt, fn) {
                window.addEventListener
                    ? this.addEventListener(evt, fn, false)
                    : (window.attachEvent)
                        ? this.attachEvent('on' + evt, fn)
                        : this['on' + evt] = fn;
            }
            , _has = function (obj, key) {
                return Object.prototype.hasOwnProperty.call(obj, key);
            }
        ;

        function loadImage(el, fn) {
            var img = new Image()
                , src = el.getAttribute('data-src');
            img.onload = function () {
                if (!!el.parent)
                    el.parent.replaceChild(img, el)
                else
                    el.src = src;

                fn ? fn() : null;
            }
            img.src = src;
        }

        function elementInViewport(el) {
            var rect = el.getBoundingClientRect()

            return (
                rect.top >= 0
                && rect.left >= 0
                && rect.top <= (window.innerHeight || document.documentElement.clientHeight)
            )
        }

        function copy() {
            var copyText = document.getElementById("copyCode");
            copyText.select();
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }

        var images = new Array()
            , query = $q('img.lazy')
            , processScroll = function () {
                for (var i = 0; i < images.length; i++) {
                    if (elementInViewport(images[i])) {
                        loadImage(images[i], function () {
                            images.splice(i, i);
                        });
                    }
                }
                ;
            }
        ;
        // Array.prototype.slice.call is not callable under our lovely IE8
        for (var i = 0; i < query.length; i++) {
            images.push(query[i]);
        }
        ;

        processScroll();
        addEventListener('scroll', processScroll);

    }(this);
</script>
<script src="//code.tidio.co/rq6ghxw1afvohx6lsmez9wo021khbjwm.js" async></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script>
    function showToast(type, message) {
        new Noty({
            type: type,
            theme: 'bootstrap-v4',
            text: message,
        }).show();
    }
</script>
@if(session('success'))
    <script>
        {{--showToast('success', '{{session('success')}}');--}}
    </script>
@endif
@if(session('error'))
    <script>
        {{--showToast('error', '{{session('error')}}');--}}
    </script>
@endif
</body>
</html>
