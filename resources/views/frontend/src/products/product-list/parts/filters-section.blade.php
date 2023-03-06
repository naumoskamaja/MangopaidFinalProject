<div class="col-lg-3 order-1 order-lg-0 hide-on-mobile">
    <div class="sidebar-area inner-right-padding shop-sidebar-area">
        <form method="post" action="" id="filterPcForm">
            @csrf
            <div class="widget">
                <div class="widget-custom-menu">
                    <ul>
                        <li class="has-sub m-0">
                            <a class="collapsed filter-header"
                               role="button" aria-expanded="false"
                               id="price-title"
                               onclick="openSubcategories(null, '#price-title','#has-sub-price-web')"
                            >@lang('website.price')</a>
                            <ul class="widget-price-filter collapse m-20-0" id="has-sub-price-web"
                                style="padding-left:18px;">
                                <div class="row">
                                    <div
                                        style="display:flex;width: 100%;justify-content: space-between;margin-bottom:10px;">
                                        <span id="slider-range-value1"></span>
                                        <span id="slider-range-value2"></span>
                                    </div>
                                    <div class="slider-range" id="slider-range"></div>
                                    <div class="slider-labels">
                                        <div class="caption">
                                            <input name="price_from" value="{{$priceFrom}}" type="hidden" id="minPrice"
                                                   min="0" max="300">
                                        </div>
                                        <div class="caption">
                                            <input name="price_to" value="{{$priceTo}}" type="hidden" id="maxPrice"
                                                   min="1" max="100000">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-submit">@lang('website.filter')</button>
                                </div>
                            </ul>
                        </li>
                        @if(!isset($fromSearch))
                            @foreach($mainFilters as $filter)
                                @if(count($filter->options)>0)
                                    <li class="has-sub m-0">
                                        <a class="collapsed filter-header"
                                           id="filterTitle_{{$filter->id}}"
                                           onclick="openSubcategories(null, '#filterTitle_{{$filter->id}}','#has-sub-{{preg_replace('/\s+/', '_',  strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))}}-web')"
                                           role="button"
                                           aria-expanded="false"
                                        >
                                            {{\App\Library\LibHelper::echoJson($filter->title,__('website.lang'))}}
                                        </a>
                                        <ul class="collapse"
                                            id="has-sub-{{preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))}}-web">
                                            <input type="hidden"
                                                   name="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))) !!}"
                                                   value="{!! $filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))] ?? '' !!}"
                                                   id="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))) !!}"/>
                                            @foreach($filter->options as $option)
                                                <?php if($filtersFromCategory == 'none' || in_array($option->id, $filtersFromCategory)) { ?>
                                                <li>
                                                    <a id="{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))) !!}-{{$option->id}}"
                                                       class="pointer @if($filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]!='*' &&
                                                                            in_array($option->id,explode(',',$filterValues[preg_replace('/\s+/', '_', strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en'))))]))
                                                                          ) selected-text @endif font-14 text-gray-333"
                                                       onclick="selectFilter('{!! $filter->id !!}', '{!! preg_replace('/\s+/','_',strtolower(\App\Library\LibHelper::echoJson($filter->title,__('en')))) !!}','{!! $option->id !!}')"
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
                        @endif
                    </ul>
                </div>
            </div>
            <div class="widget">
                <a class="font-10" href="/reset">@lang('website.reset-filters')</a>
            </div>
        </form>
    </div>
</div>
<style>
    @media only screen and (max-width: 991px) {
        .hide-on-mobile {
            display: none;
        }
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
<script>
    let currentOption = null;

    function selectFilter(filterId, filter, optionId) {
        let filterSelected = document.getElementById(filter);
        let optionsSelected = filterSelected.value.split(',');

        if (optionsSelected.includes(optionId.toString())) {
            document.getElementById(filter + '-' + optionId).classList.remove('selected-text');
            filterSelected.value = '';
            optionsSelected.map((item, i) => {
                if (item != optionId.toString() && item != '') {
                    if (filterSelected.value == '')
                        filterSelected.value += item;
                    else
                        filterSelected.value += ',' + item;

                }
            })
        } else {
            document.getElementById(filter + '-' + optionId).classList.add('selected-text');
            if (filterSelected.value == '')
                filterSelected.value = optionId;
            else
                filterSelected.value = filterSelected.value + ',' + optionId;

        }
        let filterDebounce = _.debounce(function () {
            let filterPcForm = document.getElementById('filterPcForm')
            filterPcForm.submit()
        }, 1000);
        filterDebounce();
    }


</script>
