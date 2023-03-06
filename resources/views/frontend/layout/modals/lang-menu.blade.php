<aside class="sidebar-lang-modal style-{{$conf->template}}-background">
    <div class="sidebar-lang-inner">
        <div class="sidebar-lang-content">
            <a class="lang-close close-button-size style-{{$conf->template}}-color" href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
            <div class="sidebar-lang">
                <div class="product-lang">
                    <?php $languages = \App\Library\LibHelper::languages;?>
                    @foreach($languages as $lang)
                        <div class="product-lang-item">
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="/change/lang/{{$lang}}" class="style-{{$conf->template}}-color">
                                        <img src="/assets/{{$lang}}.png"
                                             alt="{{$lang}}" width="18" height="12">
                                        @lang('website.'.$lang)
                                    </a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</aside>
<div class="sidebar-lang-overlay"></div>
