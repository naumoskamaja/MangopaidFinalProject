<aside class="filter-modal">
    <div class="product-quick-view-inner">
        <div class="product-quick-view-content">
            <button type="button" class="btn-close">
                <span class="close-icon"><i class="lastudioicon-e-remove"></i></span>
            </button>
            <div class="row row-gutter-0">
                <div class="col-12">
                    <div class="sidebar-area inner-right-padding shop-sidebar-area mobile-sidebar-area">
                        <form method="post" action="" novalidate >
                            @csrf
                            <div class="widget">
                                <div class="widget-custom-menu">
                                    <ul>
                                        <li class="has-sub m-0">
                                            <a class="collapsed filter-header" role="button" aria-expanded="false"
                                               id="price-title-mobile"
                                               onclick="openSubcategoriesMobile(null, '#price-title-mobile','#has-sub-price-mobile')"
                                            >@lang('website.price')</a>
                                            <ul class="widget-price-filter collapse m-20-0" id="has-sub-price-mobile">
                                                <div class="row">
                                                    <div style="display:flex;width: 100%;justify-content: space-between;margin-bottom:10px;">
                                                        <span id="slider-range-value1-mobile"></span>
                                                        <span id="slider-range-value2-mobile"></span>
                                                    </div>

                                                    <div class="slider-range" id="slider-range-mobile"></div>
                                                    <div class="slider-labels">
                                                        <div class="caption">
                                                            <input name="price_from" value="{{$priceFrom}}" type="hidden" id="minPriceMobile"  min="0" max="300">
                                                        </div>
                                                        <div class="caption">
                                                            <input name="price_to" value="{{$priceTo}}" type="hidden" id="maxPriceMobile"  min="1" max="100000">
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li>
                                        @foreach($mainFilters as $filter)
                                            @if(count($filter->options)>0)
                                                <li class="has-sub m-0">
                                                    <a class="collapsed filter-header font-14"
                                                       id="filterTitleMobile_{{$filter->id}}"
                                                       onclick="openSubcategoriesMobile(null, '#filterTitleMobile_{{$filter->id}}','#has-sub-{{preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))}}-mobile')"
                                                       role="button"
                                                       aria-expanded="false"
                                                    >
                                                        {{\App\Library\LibHelper::echoJson($filter->title,__('website.lang'))}}

                                                    </a>
                                                    <ul class="collapse"
                                                        id="has-sub-{{preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))}}-mobile">
                                                        <input type="hidden"
                                                               value="{!! $filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))] ?? '' !!}"
                                                               name="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))); !!}"
                                                               id="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))).'-mobile' !!}"/>
                                                        @foreach($filter->options as $option)
                                                            <?php if($filtersFromCategory == 'none' || in_array($option->id, $filtersFromCategory)) { ?>
                                                            <li>
                                                                <a id="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))); !!}-{{$option->id}}-mobile"
                                                                   class="pointer @if($filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]!='*' && in_array($option->id,explode(',',$filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]))) selected-text @endif font-14 text-gray-333"
                                                                   onclick="selectFilterMobile('{!! $filter->id !!}', '{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))) !!}','{!! $option->id !!}')"
                                                                   title="{{strtolower(\App\Library\LibHelper::echoJson($option->title,__('en')))}}">
                                                                        {{mb_strtoupper(\App\Library\LibHelper::echoJson($option->title,__('website.lang')))}}

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
                            <div class="widget">
                                <button type="submit" class="btn btn-submit">@lang('website.filter')</button>
                                <br/>
                                <a class="font-10"
                                   href="/reset">@lang('website.reset-filters')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="canvas-overlay"></div>
</aside>
