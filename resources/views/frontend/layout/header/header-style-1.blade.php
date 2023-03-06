<!--== Start Header Wrapper ==-->
<header
    class="header-area header-default sticky-header @if($conf->template==1) style-1-background @elseif($conf->template==2) style-2-background-header @endif">
    @include('frontend.layout.parts.marquee')

    <div>
        <div class="container-fluid">
            <div class="row row-gutter-0 align-items-center">
                <div class="col-xl-2 col-xxl-2">
                </div>
                <div class="col-12 col-xs-3 col-sm-3 col-md-3 col-xl-8 col-xxl-8 logoCenter">
                    <div class="header-logo-area logo-size">
                        <a href="/">
                            <img class="logo-main" src="{{asset($conf->logo)}}" alt="Logo"/>
                            <img class="logo-light" src="{{asset($conf->logo)}}" alt="Logo"/>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-xs-9 col-sm-9 col-md-9 col-xl-2 col-xxl-2">
                    <div class="header-action-area">
                        <div class="header-action-search header-action-cart">
                            <button class="btn-search btn-search-menu">
                                <i class="lastudioicon-zoom-1 search-icon"></i>
                            </button>
                        </div>
                        <div class="header-action-cart">
                            @if(auth()->check())
                                <button class="btn-login profile-icon">
                                    <i class="lastudioicon-single-01-2"></i>
                                </button>
                            @else
                                <a class="btn-login " href="/login"><i class="lastudioicon-single-01-2"></i></a>
                            @endif
                        </div>

                        <?php $counter_wish = 0 ?>
                        @if(session('wishlist')!=null)
                            <?php $counter_wish = count(session('wishlist')) ?>
                        @endif

                        <div class="header-action-cart m-r-20">
                            <a href="/wishlist" class="btn-cart wish-icon">
                                <span class="cart-count top--6"
                                      style="font-family: 'Poppins', sans-serif;">{{$counter_wish}}</span>
                                <i class="lastudioicon-heart-2"></i>
                            </a>
                        </div>
                        <?php $counter_cart = 0 ?>
                        @if(session('cart')!=null)
                            <?php $counter_cart = count(session('cart')) ?>
                        @endif
                        <div class="header-action-cart m-r-20">
                            <button class="btn-cart cart-icon">
                                <span class="cart-count top-40"
                                      style="font-family: 'Poppins', sans-serif;">{{$counter_cart}}</span>
                                <i class="lastudioicon-shopping-cart-2"></i>
                            </button>
                        </div>
                        <?php $sessionLang = session()->get('lang');?>
                        <div class="header-action-cart">
                            @if(isset($sessionLang) && $sessionLang!=null)
                                <a href="#" class="lang-icon" style="display:flex; width: 20px;">
                                    <img src="/assets/{{$sessionLang}}.png" alt="{{$sessionLang}}" width="18" height="12">
                                </a>
                            @else
                                <a href="#" class="lang-icon" style="display:flex; width: 20px;">
                                    <img src="/assets/en.png" alt="en" width="18" height="12">
                                </a>
                            @endif
                        </div>

                        <div class="header-action-cart">
                            @if(session('currency')=='$')
                                <a href="#" class="currency-icon">
                                    <span class="cart-count top--6 text-theme-1">$</span>
                                </a>
                            @elseif(session('currency')=='Lek')
                                <a href="#" class="currency-icon">
                                    <span class="cart-count top--6 text-theme-1">Lek</span>
                                </a>
                            @elseif(session('currency')=='MKD')
                                <a href="#" class="currency-icon">
                                    <span class="cart-count top--6 text-theme-1">MKD</span>
                                </a>
                            @else
                                <a href="#" class="currency-icon">
                                    <span class="cart-count top--6 text-theme-1">€</span>
                                </a>
                            @endif
                        </div>
                        <button class="btn-menu d-xl-none">
                            <i class="lastudioicon-menu-3-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-none d-xl-block">
                <div class="header-align">
                    <div class="header-navigation-area">
                        <ul class="main-menu nav justify-content-center position-relative">
                            <li><a href="/">@lang('website.home')</a></li>
                            @foreach($main_categories as $category)
                                @if(count($category->subcategories)>0)
                                    <li class="nav-item dropdown" id="menu-li">
                                        <a class="nav-link dropdown-toggle"
                                           style="@if(strpos($category->title['en'], 'sale') !== false) font-weight:700;color: #D71E25; @endif"
                                           href="/search/{!! $category->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}"
                                           data-bs-toggle="dropdown" id="menuitems"
                                           onclick="routing(event)"
                                        > {{$category->title[session('lang')??'en']}} </a>

                                        <ul class="dropdown-menu" id="xxx">
                                            @foreach($category->subcategories as $subcategory)
                                                @if(count($subcategory->subcategories)>0)
                                                    <?php $fourSubsFlag = false; ?>
                                                    @foreach($subcategory->subcategories as $child)
                                                        @if(count($child->subcategories)>0)
                                                            <?php $fourSubsFlag = true; ?>
                                                        @endif
                                                    @endforeach
                                                    @if($fourSubsFlag == false)
                                                        {{--  three levels --}}
                                                        <li>
                                                            <a class="dropdown-item uppercase" onclick="routing(event)"
                                                               href="/search/{!! $subcategory->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}">
                                                                {{$subcategory->title[session('lang')??'en']}}&raquo;
                                                            </a>
                                                            <ul class="submenu dropdown-menu">
                                                                @foreach($subcategory->subcategories as $child)
                                                                    <li>
                                                                        <a class="dropdown-item cat-subtitle"
                                                                           href="/search/{!! $child->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}/{!! urlencode($child->title[session('lang')??'en']) !!}">
                                                                            {{$child->title[session('lang')??'en']}}
                                                                            ({{count($child->products)}})
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <li>
                                                        </li>
                                                    @else
                                                        {{--        four levels       --}}
                                                        <li class="has-megasubmenu" id="megamenu">
                                                            <a class="dropdown-item uppercase"
                                                               onclick="routing(event,{!! $subcategory->id !!})"
                                                               href="/search/{!! $subcategory->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}">
                                                                {{$subcategory->title[session('lang')??'en']}} &raquo;
                                                            </a>

                                                            <div class="megasubmenu dropdown-menu" id="megasubmenu"
                                                                 style="min-width: 730px;">
                                                                <div class="row">
                                                                    @foreach($subcategory->subcategories as $child)
                                                                        <div class="col-4">
                                                                            <a href="/search/{!! $child->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}/{!! urlencode($child->title[session('lang')??'en']) !!}"
                                                                               class="title cat-title">{{$child->title[session('lang')??'en']}}</a>
                                                                            <ul class="list-unstyled">
                                                                                @foreach($child->subcategories as $subtitle)
                                                                                    <li>
                                                                                        <a class="cat-subtitle"
                                                                                           href="/search/{!! $subtitle->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}/{!! urlencode($child->title[session('lang')??'en']) !!}/{!! urlencode($subtitle->title[session('lang')??'en']) !!}">
                                                                                            {{$subtitle->title[session('lang')??'en']}}
                                                                                            ({{count($subtitle->products)}}
                                                                                            )
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div><!-- end col-3 -->
                                                                    @endforeach
                                                                </div><!-- end row -->
                                                            </div>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li><a class="dropdown-item uppercase"
                                                           href="/search/{!! $subcategory->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}/{!! urlencode($subcategory->title[session('lang')??'en']) !!}">{{$subcategory->title[session('lang')??'en']}} </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item"><a
                                            class="nav-link"
                                            style="@if(strpos($category->title['en'], 'sale') !== false) font-weight:700;color: #D71E25; @endif"
                                            href="/search/{!! $category->id !!}/{!! urlencode($category->title[session('lang')??'en']) !!}">{{$category->title[session('lang')??'en']}} </a>
                                    </li>
                                @endif
                            @endforeach
                            @if(isset($conf->instagram) && $conf->instagram!="")
                                <li><a href={{$conf->instagram}} target="_blank"><i
                                            class="lastudioicon lastudioicon-b-instagram"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>

    function showSubSubCategories(subcatId) {
        console.log(subcatId);
    }
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.dropdown-menu').forEach(function (element) {
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })


        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {
            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
                everydropdown.addEventListener('hidden.bs.dropdown', function () {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });

            document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
                element.addEventListener('click', function (e) {

                    let nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains('submenu')) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        console.log(nextEl);
                        if (nextEl.style.display == 'block') {
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }

                    }
                });
            })
        }
        // end if innerWidth

    });
    // DOMContentLoaded  end
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
// make it as accordion for smaller screens
        if (window.innerWidth < 992) {

            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
                everydropdown.addEventListener('hidden.bs.dropdown', function () {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });

            document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
                element.addEventListener('click', function (e) {
                    let nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains('submenu')) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        if (nextEl.style.display == 'block') {
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }

                    }
                });
            })
        }
// end if innerWidth
    });
</script>

<script>
    function routing(e, subId = 0) {
        e.preventDefault();
        const target = e.target;
        const rect = target.getBoundingClientRect();
        const x = e.clientX - rect.left;
        if (x < target.clientWidth - 15) {
            window.location = e.target.href;
        } else {
            if (subId != 0) {
                let subMegaMenu = target.nextElementSibling;
                if (subMegaMenu.style.display == 'none' || subMegaMenu.style.display == '' || subMegaMenu.style.display == null) {
                    subMegaMenu.style.display = 'block';
                    subMegaMenu.children[0].style.display = 'block';
                    subMegaMenu.children[0].children[0].style.display = 'block';
                    subMegaMenu.children[0].children[1].style.display = 'block';
                    subMegaMenu.children[0].children[2].style.display = 'block';
                } else {
                    subMegaMenu.style.display = 'none';
                    subMegaMenu.children[0].style.display = 'none';
                    subMegaMenu.children[0].children[0].style.display = 'none';
                    subMegaMenu.children[0].children[1].style.display = 'none';
                    subMegaMenu.children[0].children[2].style.display = 'none';
                }
            }
        }
    }
</script>

<script>
    function setposition(e) {
        var bodyOffsets = document.body.getBoundingClientRect();
        let tempX = e.pageX - bodyOffsets.left;
        let tempY = e.pageY;
        document.getElementById('xxx').style.top = tempY;
        document.getElementById('xxx').style.left = tempX;
        let elem = document.getElementById('menu-li');
    }

    function openMenu(event) {
        setposition(event);
    }

</script>
<style>
    li:hover > .dropdown-menu {
        display: block;
    }

    .red {
        color: red !important;
    }
</style>
