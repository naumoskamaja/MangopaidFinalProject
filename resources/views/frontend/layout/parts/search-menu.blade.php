<div class="search-box-wrapper">
    <!--== Start Aside Search Menu ==-->
    <div class="search-box-content-inner">
        <div class="search-box-form-wrap">
            <div class="search-note">
                <p>@lang('website.start-typing-and-press-enter-to-search')</p>
            </div>
            <form role="search" method="post" action="/search">
                @csrf
                <div class="search-form position-relative">
                    <label for="search-input" class="sr-only">@lang('website.search')</label>
                    <input type="search" class="form-control" placeholder="@lang("website.search_here")..."
                           value="{{session('search')}}"
                           id="search-input"   name="search" onkeyup="countProductsFound()" autocomplete="off">
{{--                    <input id="search2" class="filter-header" placeholder="@lang('website.search-products')…">--}}
                    <a class="clear-search-section" href="/clear-search-session"><i class="lastudioicon-e-remove"></i> </a>
                    <button class="search-button hidden" type="submit"><i class="lastudioicon-zoom-1"></i></button>
                </div>
                <span id="products_found" class="font-10">@lang('website.searched-products')</span>
                <div id="result"><ul id="searchedList"></ul></div>
            </form>
        </div>
    </div>
    <!--== End Aside Search Menu ==-->
    <a href="javascript:;" class="search-close close-button-size"><i class="lastudioicon-e-remove"></i></a>
</div>
