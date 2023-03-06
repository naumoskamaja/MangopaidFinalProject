<div class="shop-toolbar-wrap direction-inherit">
    <div class="shop-toolbar-left shop-left">
    </div>
    <div class="shop-toolbar-right shop-right" style="display: flex">
        <div class="product-sorting-menu product-view-count product-action">
            <span id="filterProducts" class="current
            sidebar-filter filter-button-texted filters-button"
            >@lang('website.filters') <i class="lastudioicon-down-arrow"></i></span>
        </div>
        <div class="product-sorting-menu product-sorting">
            <form class="akasha-ordering" method="post" action="" id="sort-form">
                @csrf
                <select title="product_cat" onchange="formSubmit()" name="orderby"
                        class="orderby sort-field filter-button-texted">
                    <option class="filter-button-texted" value="default"
                            @if($orderBy=='default') selected="selected" @endif>@lang('website.default-sorting') </option>
                    <option class="filter-button-texted" value="date"
                            @if($orderBy=='date') selected="selected" @endif>@lang('website.sort-by-latest')</option>
                    <option class="filter-button-texted" value="name-a-z"
                            @if($orderBy=='name-a-z') selected="selected" @endif>@lang('website.names-from-a-z')</option>
                    <option class="filter-button-texted" value="name-z-a"
                            @if($orderBy=='name-z-a') selected="selected" @endif>@lang('website.names-from-z-a')</option>
                    <option class="filter-button-texted" value="price"
                            @if($orderBy=='price') selected="selected" @endif>@lang('website.sort-low-to-high') </option>
                    <option class="filter-button-texted" value="price-desc"
                            @if($orderBy=='price-desc') selected="selected" @endif>@lang('website.sort-high-to-low')</option>
                </select>
            </form>
        </div>
    </div>
</div>
@include('frontend.layout.modals.side-filter')
<style>

    @media only screen and (min-width: 992px) {
        @media only screen and (max-width: 991px) {
            #filterProductsWeb {
                display: none;
            }

            #filterProducts {
                display: block;
            }

            #filterProducts .nav-tabs {
                padding-right: 20px;
            }

            #filterProducts .colors-style {
                padding: 8px !important;
                font-size: 0;
                border-radius: 0 !important;
                margin: 1px;
                display: inline-table;
                border: 1px solid #bababa;
                cursor: pointer;
            }

            .category-slider-mobile {
                display: block;
                padding: 0 !important;
            }
        }

        #filterProductsWeb {
            display: block;
        }

        #filterProducts {
            display: none;
        }

        .category-slider-mobile {
            display: none;
        }
    }

    .colors-style {
        padding: 15px;
        font-size: 0;
        border-radius: 100%;
        margin: 1px;
        display: inline-table;
        border: 1px solid #bababa;
        cursor: pointer;
    }

    .text-gray {
        color: #333;
    }

    .filter-button-texted {
        font-size: 14px !important;
        text-transform: uppercase;
    }

    .select-border {
        border: 3px solid #000 !important;
    }

    .selected-text {
        font-weight: 700 !important;
        color: #000 !important;
    }

    .pointer {
        cursor: pointer;
    }

    .btn-submit {
        text-transform: uppercase;
        border: 1px solid #333;
        border-radius: 0 !important;
        color: #333 !important;
        padding: 2px 30px;
        display: inline-block !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        line-height: 24px !important;
        position: relative !important;
        -webkit-transition: 0.3s !important;
        margin-top: 0 !important;
    }

    .font-10 {
        font-size: 10px !important;
    }

    .filter-header {
        text-transform: uppercase !important;
        font-size: 14px !important;
        color: #333 !important;

    }

    .filter-header:hover {
        font-weight: 600;
        color: #333 !important;
        cursor: pointer;
    }

    .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent
    }

    .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0
    }

    .slick-list:focus {
        outline: 0
    }

    .slick-list.dragging {
        cursor: pointer;
        cursor: hand
    }

    .slick-slider .slick-track, .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
        margin-left: auto;
        margin-right: auto
    }

    .slick-track:before, .slick-track:after {
        display: table;
        content: ''
    }

    .slick-track:after {
        clear: both
    }

    .slick-loading .slick-track {
        visibility: hidden
    }

    .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px
    }

    [dir='rtl'] .slick-slide {
        float: right
    }

    .slick-slide img {
        display: block
    }

    .slick-slide.slick-loading img {
        display: none
    }

    .slick-slide.dragging img {
        pointer-events: none
    }

    .slick-initialized .slick-slide {
        display: block
    }

    .slick-loading .slick-slide {
        visibility: hidden
    }
    .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent
    }
    .slick-arrow.slick-hidden {
        display: none
    }

</style>
<script>
    function selectFilterMobile(filterId, filter, optionId) {
        // document.getElementById(filter + '-all-mobile').classList.remove('selected-text');
        let filterSelected = document.getElementById(filter+'-mobile');
        let optionsSelected = filterSelected.value.split(',');
        if(optionsSelected.includes(optionId.toString())){
            document.getElementById(filter+'-'+optionId+'-mobile').classList.remove('selected-text');
            document.getElementById(filter+'-'+optionId+'-mobile-check-btn').classList.add('hide');
            filterSelected.value = '';
            optionsSelected.map((item,i)=>{
                if(item!=optionId.toString() && item!='') {
                    if(filterSelected.value=='')
                        filterSelected.value += item;
                    else
                        filterSelected.value +=  ','+item;
                }
            })
        }else{
            document.getElementById(filter+'-'+optionId+ '-mobile').classList.add('selected-text');
            document.getElementById(filter+'-'+optionId+'-mobile-check-btn').classList.remove('hide');

            if(filterSelected.value=='')
                filterSelected.value = optionId;
            else
                filterSelected.value = filterSelected.value + ',' + optionId;

        }
    }

</script>
<script>
    function openSubcategoriesMobile(icon, parentId, id) {
        if ($(parentId).hasClass('collapsed')) {
            $(parentId).removeClass('collapsed');
            $(id).removeClass('hide');
            $(id).addClass('show');
            if (icon != null)
                $(icon).html('&#xf106;');

        } else {
            $(parentId).addClass('collapsed');
            $(id).removeClass('show');
            $(id).addClass('hide');

            if (icon != null)
                $(icon).html('&#xf107;');

        }
    }

</script>
