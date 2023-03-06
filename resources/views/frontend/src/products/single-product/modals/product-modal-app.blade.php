<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{$conf->company_name ?? 'Mangopaid'}}</title>
    <!--== Favicon ==-->
    <link rel="shortcut icon" href="/assets/favicon.png" type="image/x-icon"/>
    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Prompt:300,400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,700,900,900i"
          rel="stylesheet">
    <!--== Bootstrap CSS ==-->
    <link href="/assets/frontend/css/bootstrap.min.css" rel="stylesheet"/>
    <!--== Font-awesome Icons CSS ==-->
    <link href="/assets/frontend/css/font-awesome.min.css" rel="stylesheet"/>
    <!--== Icofont Min Icons CSS ==-->
    <link href="/assets/frontend/css/icofont.min.css" rel="stylesheet"/>
    <!--== lastudioIcons CSS ==-->
    <link href="/assets/frontend/css/lastudioIcons.css" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="/assets/frontend/css/animate.css" rel="stylesheet"/>
    <!--== Slicknav CSS ==-->
    <link href="/assets/frontend/css/slicknav.css" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="/assets/frontend/css/swiper.min.css" rel="stylesheet"/>
    <!--== Slick CSS ==-->
    <link href="/assets/frontend/css/slick.css" rel="stylesheet"/>
    <!--== Main Style CSS ==-->
    <link href="/assets/frontend/css/style.css" rel="stylesheet"/>
    <link href="/assets/frontend/css/custom.css" rel="stylesheet"/>
    <link href="/assets/frontend/css/templates.css" rel="stylesheet"/>
    <link href="/assets/frontend/css/custom-menu.css" rel="stylesheet"/>
    <link href="/assets/frontend/css/lang.css" rel="stylesheet"/>
    <link href="/assets/frontend/css/menu.css" rel="stylesheet"/>
    <link href="/assets/frontend/css/rangeslider.css" rel="stylesheet"/>
    <link href="/assets/frontend/css/single-product-page.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    @yield('head')

</head>
<style>
    html{
        scroll-behavior: smooth;
    }
</style>
<body style="font-family: 'Poppins', sans-serif !important;">

<div class="wrapper home-default-wrapper">

    <main class="main-content">
        @yield('modal')
    </main>
    <div class="scroll-to-top"><span class="icofont-arrow-up"></span></div>
</div>


<script>

    setTimeout(function () {
        $(".hide-div").show();
    }, 5000);

    function selectSearchItem(id) {
        // document.getElementById('search-input').value = val;
        window.location.href = '/show/' + id;
    }

    function countProductsFound() {
        let lang = 'en';
        @if(session("lang") == "al")
            lang = 'al';
        @elseif(session("lang") == "mk")
            lang = 'mk';
        @elseif(session("lang") == "de")
            lang = 'de';
        @endif

        let term = $('#search-input').val();
        let url = '/searchAPI';
        if (term.length > 3) {
            let posting = $.post(url, {search: term});

            // Put the results in a div
            posting.done(function (data) {
                console.log(data);
                let len = data.values.products.data.length;
                let prods = data.values.products.data;
                // let m = document.getElementById('products_found').innerHTML = 'Found ' + len + ' searched products';
                let m = document.getElementById('products_found').innerHTML = 'Found ' + len + ' searched products';
                console.log('m', m);
                let res = document.getElementById("result");
                let list = '';
                if (prods.length > 6) {
                    for (i = 0; i < 6; i++) {
                        list += '<li class="ellipsisTextOnSearch" onclick="selectSearchItem(' + prods[i].id + ')">' + prods[i].name[lang] + '</li>';
                    }
                } else {
                    for (i = 0; i < prods.length; i++) {
                        list += '<li class="ellipsisTextOnSearch" onclick="selectSearchItem(' + prods[i].id + ')">' + prods[i].name[lang] + '</li>';
                    }
                }
                res.innerHTML = '<ul>' + list + '</ul>';
                // $('#products_found').html('Found <b>' + len + '</b> searched products');
                // $( "#result" ).empty().append( content );
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
        for (var i = 0; i < query.length; i++) {
            images.push(query[i]);
        }
        ;

        processScroll();
        addEventListener('scroll', processScroll);
    }(this);

    function showPasswordInput(e, inputTag) {
        let pwInput = document.getElementById(inputTag);
        const target = e.target;
        if (pwInput.type === "password") {
            pwInput.type = "text";
            target.classList.remove('fa-eye')
            target.classList.add('fa-eye-slash')
        } else {
            pwInput.type = "password";
            target.classList.remove('fa-eye-slash')
            target.classList.add('fa-eye')
        }
    }

</script>

<script>
    function goTo(e, link) {
        window.location = link;
        // const x = e.clientX - rect.left;
        // if (x < target.clientWidth - 30) {
        //
        // }
    }
</script>
<script>
    function openSubcategoriesMobile(icon, parentId, id) {
        if ($(parentId).hasClass('collapsed')) {
            $(parentId).removeClass('collapsed');
            $(id).removeClass('hide');
            $(id).addClass('show');
            if (icon != null) {
                $(icon).html('&#xf106;');
            }
        } else {
            $(parentId).addClass('collapsed');
            $(id).removeClass('show');
            $(id).addClass('hide');

            if (icon != null) {
                $(icon).html('&#xf107;');
            }
        }
    }
    {{--'#icon-{{$category->id}}-mobile', '#catTitle_{{$category->id}}_mobile','#has-sub4{!!$category->id !!}-mobile'--}}
    function closeSubcategoriesMobile(icon, parentId, id) {
        if (!$('#' + parentId).hasClass('collapsed')) {
            $('#' + parentId).addClass('collapsed');
            $('#' + id).removeClass('show');
            $('#' + id).addClass('hide');

            if (icon != null) {
                $('#' + icon).html('&#xf107;');
            }
        }
    }

    (function () {
        let mobileMenus = document.querySelectorAll('.filter-mainheader-mobile.collapsed'),
            subMobileMenus = document.querySelectorAll('.filter-subheader-mobile.collapsed'),
            subsubMobileMenus = document.querySelectorAll('.filter-subsubheader-mobile.collapsed');

        mobileMenus.forEach(mobileMenu => {
            mobileMenu.addEventListener('click', () => {
                mobileMenus.forEach(tmpMobileMenu => {
                    if (tmpMobileMenu != mobileMenu) {
                        closeSubcategoriesMobile(tmpMobileMenu.children[1].getAttribute('id'), tmpMobileMenu.getAttribute('id'), tmpMobileMenu.nextElementSibling.getAttribute('id'))
                    }
                })
            })
        })
        subMobileMenus.forEach(subMobileMenu => {
            subMobileMenu.addEventListener('click', () => {
                subMobileMenus.forEach(tmpSubMobileMenu => {
                    if (tmpSubMobileMenu != subMobileMenu) {
                        closeSubcategoriesMobile(tmpSubMobileMenu.children[1].getAttribute('id'), tmpSubMobileMenu.getAttribute('id'), tmpSubMobileMenu.nextElementSibling.getAttribute('id'))
                    }
                })
            })
        })
        subsubMobileMenus.forEach(subsubMobileMenu => {
            subsubMobileMenu.addEventListener('click', () => {
                subsubMobileMenus.forEach(tmpsubsubMobileMenu => {
                    if (tmpsubsubMobileMenu != subsubMobileMenu) {
                        closeSubcategoriesMobile(tmpsubsubMobileMenu.children[1].getAttribute('id'), tmpsubsubMobileMenu.getAttribute('id'), tmpsubsubMobileMenu.nextElementSibling.getAttribute('id'))
                    }
                })
            })
        })
    })()
</script>

<script src="/assets/frontend/js/modernizr.js"></script>
<script src="/assets/frontend/js/jquery-main.js"></script>
<script src="/assets/frontend/js/jquery-migrate.js"></script>
<script src="/assets/frontend/js/popper.min.js"></script>
<script src="/assets/frontend/js/bootstrap.min.js"></script>
<script src="/assets/frontend/js/jquery.appear.js"></script>
<script src="/assets/frontend/js/swiper.min.js"></script>
<script src="/assets/frontend/js/fancybox.min.js"></script>
<script src="/assets/frontend/js/aos.min.js"></script>
<script src="/assets/frontend/js/jquery.slicknav.js"></script>
<script src="/assets/frontend/js/jquery.countdown.min.js"></script>
<script src="/assets/frontend/js/tippy.all.min.js"></script>
<script src="/assets/frontend/js/isotope.pkgd.min.js"></script>
<script src="/assets/frontend/js/vivus.js"></script>
<script src="/assets/frontend/js/parallax.min.js"></script>
<script src="/assets/frontend/js/slick.min.js"></script>
<script src="/assets/frontend/js/wow.min.js"></script>
<script src="/assets/frontend/js/jquery-zoom.min.js"></script>
<script src="/assets/frontend/js/custom.js"></script>
<script src="/assets/frontend/js/rangeSlider.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>

<script>
    function showToast(type, message) {
        new Noty({
            type: type,
            theme: 'mint',
            text: message,
        }).show();
    }
</script>
@if(session('success'))
    <script>
        showToast('success', '{{session('success')}}');
    </script>
@endif

@if(session('error'))
    <script>
        showToast('error', '{{session('error')}}');
    </script>
@endif
<script>
    $('#noty_layout__topRight').show(1).delay(1000).hide(1);
</script>


@yield('footer')
</body>
</html>
