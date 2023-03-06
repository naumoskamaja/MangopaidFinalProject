<aside class="sidebar-filter-modal">
    <form method="post" action="" novalidate>
        @csrf
        <div class="sidebar-filter-inner">
            <div class="sidebar-filter-content">
                <p class="filter-section-title">@lang('website.filter')</p>
                <a class="filter-close" href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
                <div class="widget">
                    <div class="widget-custom-filter">
                        <ul style="padding-right: 10px;">
                            <li class="has-sub m-0 filter-item border-btm">
                                <a class="collapsed filter-header-mobile style-{{$conf->template}}-color" role="button" aria-expanded="false"
                                   id="price-title-mobile"
                                   onclick="openSubcategoriesMobile(null, '#price-title-mobile','#has-sub-price-mobile')"
                                ><span>@lang('website.price')</span></a>
                                <ul class="collapse" id="has-sub-price-mobile">
                                    <li>
                                        <div class="row price-filter-row" style="padding:0 15px;">
                                            <div
                                                style="display:flex;width: 100%;justify-content: space-between;margin-bottom:10px;">
                                                <span id="slider-range-value1-mobile"></span>
                                                <span id="slider-range-value2-mobile"></span>
                                            </div>

                                            <div class="slider-range" id="slider-range-mobile"></div>
                                            <div class="slider-labels">
                                                <div class="caption">
                                                    <input name="price_from" value="{{$priceFrom}}" type="hidden"
                                                           id="minPriceMobile" min="0" max="300">
                                                </div>
                                                <div class="caption">
                                                    <input name="price_to" value="{{$priceTo}}" type="hidden"
                                                           id="maxPriceMobile" min="1" max="100000">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </li>

                            @foreach($mainFilters as $filter)
                                @if(count($filter->options)>0)
                                    <?php
                                    $flag = false;
                                    $counter = 0;
                                    foreach ($filter->options as $option) {
                                        if ($filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]!='*' && in_array($option->id, explode(',', $filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]))) {
                                            $flag = true;
                                            $counter += 1;
                                        }
                                    }
                                    ?>
                                    <li class="has-sub m-0 filter-item border-btm" id="filters_container">
                                        <a class="filter-header-mobile collapsed style-{{$conf->template}}-color  @if($flag==true) selected-text @endif main-filter-title"
                                           id="filterTitleMobile_{{$filter->id}}"
                                           onclick="openSubcategoriesMobile('#icon-{{$filter->id}}-filter', '#filterTitleMobile_{{$filter->id}}','#has-sub-{{preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))}}-mobile')"
                                           role="button"
                                           aria-expanded="false">
                                            <span>
                                                {{strtoupper(\App\Library\LibHelper::echoJson($filter->title,__('website.lang')))}}
                                            @if($flag==true)
                                                ({{$counter}})
                                            @endif</span>
                                            <span id="icon-{{$filter->id}}-filter" style="color: #949494" class="icon fa">&#xf107;</span>

                                        </a>
                                        <ul class="collapse"
                                            id="has-sub-{{preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))}}-mobile">
                                            <input type="hidden"
                                                   value="{!! $filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))] ?? '' !!}"
                                                   name="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))); !!}"
                                                   id="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))).'-mobile' !!}"/>

                                            @foreach($filter->options as $option)
                                                <?php if($filtersFromCategory == 'none' || in_array($option->id, $filtersFromCategory)) { ?>
                                                <li class="filter-option">
                                                    <a id="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))); !!}-{{$option->id}}-mobile"
                                                       class="pointer pointer-filter filter-subheader-mobile style-{{$conf->template}}-color @if($filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]!='*' && in_array($option->id,explode(',',$filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]))) selected-text @endif font-14 text-gray-333"
                                                       onclick="selectFilterMobile('{!! $filter->id !!}', '{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))) !!}','{!! $option->id !!}')"
                                                       title="{{strtolower(\App\Library\LibHelper::echoJson($option->title,__('en')))}}">

                                                        {{strtoupper(\App\Library\LibHelper::echoJson($option->title,__('website.lang')))}}
                                                        ({{count($option->products)}})
                                                        <span
                                                            class="@if($filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]=='*' || !in_array($option->id,explode(',',$filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]))) hide @endif"
                                                            id="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))); !!}-{{$option->id}}-mobile-check-btn">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                    </a>

                                                </li>
                                                <?php } ?>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="sidebar-filter-inner">
            <button type="submit" class="btn btn-theme-dark btn-theme-dark-2"> @lang('website.view_items')</button>
            <br/>
            <a class="font-10"
               href="/reset">@lang('website.reset-filters')</a>
        </div>
    </form>
</aside>
<div class="sidebar-filter-overlay"></div>
