{{--<aside class="off-canvas-wrapper canvas-fullpage-menu fullpage-menu-style3">--}}
{{--    <div class="off-canvas-inner">--}}
{{--        <div class="off-canvas-overlay"></div>--}}
{{--        <div class="off-canvas-content">--}}
{{--            <div class="off-canvas-header">--}}
{{--                <div class="close-action">--}}
{{--                    <button class="btn-close"><i class="lastudioicon-e-remove"></i></button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="off-canvas-item">--}}
{{--                <!-- Start Mobile Menu Wrapper -->--}}
{{--                <div class="res-mobile-menu">--}}
{{--                    <!-- Note Content Auto Generate By Jquery From Main Menu -->--}}
{{--                </div>--}}
{{--                <!-- End Mobile Menu Wrapper -->--}}
{{--            </div>--}}
{{--            <div class="off-canvas-footer"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</aside>--}}

<aside class="sidebar-menu-modal style-{{$conf->template}}-background">
    <div class="sidebar-menu-inner">
        <div class="sidebar-menu-content">
            <a class="menu-close style-{{$conf->template}}-color" href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
{{--            <div class="sidebar-menu">--}}
{{--                <div class="product-menu">--}}
{{--                    <div class="product-menu-item">--}}
                        <div class="widget">
                            <div class="widget-custom-menu">
                                <ul style="padding-right: 10px;">
                                    <li class="p-6-0 menu-item border-btm style-{{$conf->template}}-border">
                                        <a class="filter-header-mobile style-{{$conf->template}}-color filter-mainheader-mobile" href="/">@lang('website.home')</a>
                                    </li>
                                    @foreach($main_categories as $category)
                                        @if(count($category->subcategories)==0)
                                            <li class="p-6-0 menu-item border-btm style-{{$conf->template}}-border">
                                                <a class="filter-header-mobile style-{{$conf->template}}-color filter-mainheader-mobile"
                                                   style="@if(strpos($category->title['en'], 'sale') !== false) font-weight:700;color: #D71E25; @endif"
                                                   href="/search/{!! $category->id !!}/{{urlencode($category->title[session('lang')??'al'])}}">{{$category->title[session('lang')??'al']}}
{{--                                                    <span class="count font-size-8-pt">({{$category->counted_products}})</span>--}}
                                                </a>
                                            </li>
                                        @else
                                            <li class="has-sub m-0 menu-item border-btm style-{{$conf->template}}-border">
                                                <a class="collapsed filter-header-mobile style-{{$conf->template}}-color filter-mainheader-mobile"
                                                   role="button" id="catTitle_{{$category->id}}_mobile"
                                                   onclick="openSubcategoriesMobile('#icon-{{$category->id}}-mobile', '#catTitle_{{$category->id}}_mobile','#has-sub4{!!$category->id !!}-mobile')"
                                                   aria-expanded="false">
                                                    <span onclick="goTo(event,'{!! '/search/'.$category->id.'/'.urlencode($category->title[session("lang")??"al"]) !!}')">{{$category->title[session("lang")??"al"]}}</span>
{{--                                                    <span class="count font-size-8-pt">({{$category->counted_products}})</span>--}}
                                                    <span
                                                        id="icon-{{$category->id}}-mobile"
                                                        class="icon fa">&#xf107;</span>
                                                </a>


                                                <ul class="collapse" id="has-sub4{{$category->id}}-mobile">
                                                    @foreach($category->subcategories as $sub_category)
                                                        @if(count($sub_category->subcategories)==0)
                                                            <li class="has-sub m-0 submenu-title">
                                                                <a href="/search/{!! $sub_category->id !!}/{{urlencode($category->title[session('lang')??'al']) }}/{{urlencode($sub_category->title[session('lang')??'al']) }}"
                                                                   class="pointerFilter filter-subheader-mobile style-{{$conf->template}}-color font-14">{{$sub_category->title[session('lang')??'al']}}
{{--                                                                    <span class="count font-size-8-pt">({{$sub_category->counted_products}})</span>--}}
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="has-sub m-0 submenu-title">
                                                                <a class="collapsed filter-subheader-mobile style-{{$conf->template}}-color"
                                                                   id="subcatTitle_{{$sub_category->id}}_mobile"
                                                                   onclick="openSubcategoriesMobile('#icon-sub-{{$sub_category->id}}-mobile','#subcatTitle_{{$sub_category->id}}_mobile','#has-sub5{!!$sub_category->id !!}-mobile')"
                                                                   role="button">
                                                                                            <span
                                                                                                onclick="goTo(event,'{!! '/search/'.$sub_category->id.'/'.urlencode($category->title[session("lang")??"al"]).'/'.urlencode($sub_category->title[session("lang")??"al"]) !!}')">
                                                                                                {{$sub_category->title[session('lang')??'al']}}
                                                                                            </span>
{{--                                                                    <span class="count font-size-8-pt">({{$sub_category->counted_products}})</span>--}}
                                                                    <span
                                                                        id="icon-sub-{{$sub_category->id}}-mobile"
                                                                        class="icon fa">&#xf107;</span></a>

                                                                <ul class="collapse"
                                                                    id="has-sub5{{$sub_category->id}}-mobile">
                                                                    @foreach($sub_category->subcategories as $child)
                                                                        @if(count($child->subcategories)==0)
                                                                            <li>
                                                                                <a href="/search/{!! $child->id !!}/{{urlencode($category->title[session('lang')??'al'])}}/{{urlencode($sub_category->title[session('lang')??'al'])}}/{{urlencode($child->title[session('lang')??'al'])}}"
                                                                                   class="pointerFilter font-14">{{$child->title[session('lang')??'al']}}
                                                                                    <span class="count font-size-8-pt">({{count($child->products)}})</span>
                                                                                </a>
                                                                            </li>
                                                                        @else
                                                                            <li class="has-sub m-0">
                                                                                <a class="collapsed filter-subsubheader-mobile"
                                                                                   id="subcatTitle_{{$child->id}}_mobile"
                                                                                   onclick="openSubcategoriesMobile('#icon-sub-{{$child->id}}-mobile','#subcatTitle_{{$child->id}}_mobile','#has-sub6{!!$child->id !!}-mobile')"
                                                                                   role="button">
                                                                                            <span
                                                                                                onclick="goTo(event,'{!! '/search/'.$child->id.'/'.urlencode($category->title[session('lang')??'al']).'/'.urlencode($sub_category->title[session('lang')??'al']).'/'.urlencode($child->title[session('lang')??'al']) !!}')">
                                                                                                {{$child->title[session('lang')??'al']}}
                                                                                            </span>
{{--                                                                                    <span class="count font-size-8-pt">({{$child->counted_products}})</span> --}}
                                                                                        <span
                                                                                        id="icon-sub-{{$child->id}}-mobile"
                                                                                        class="icon fa">&#xf107;</span></a>

                                                                                <ul class="collapse"
                                                                                    id="has-sub6{{$child->id}}-mobile">
                                                                                    @foreach($child->subcategories as $subtitle)
                                                                                        <li>
                                                                                            <a href="/search/{{$subtitle->id}}/{{urlencode($category->title[session('lang')??'al'])}}/{{urlencode($sub_category->title[session('lang')??'al'])}}/{{urlencode($child->title[session('lang')??'al'])}}/{{urlencode($subtitle->title[session('lang')??'al'])}}"
                                                                                               class="pointerFilter font-14">{{$subtitle->title[session('lang')??'al']}}
                                                                                                <span class="count font-size-8-pt">({{count($subtitle->products)}})</span>
                                                                                            </a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
</aside>
<div class="sidebar-menu-overlay"></div>
