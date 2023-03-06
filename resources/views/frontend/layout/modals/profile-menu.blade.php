<aside class="sidebar-profile-modal">
    <div class="sidebar-profile-inner">
        <div class="sidebar-profile-content">
            <a class="profile-close" href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
            @if(auth()->check() && auth()->user()->role!='admin')
                <div class="sidebar-profile">
                    <h4 class="sidebar-profile-title">@lang('website.account')</h4>
                    <div class="product-profile">
                        <div class="product-profile-item">
                            <div class="product-info">
                                <h4 class="title title-custome"><a href="/profile?tab=account">@lang('website.my-account')</a></h4>
                            </div>
                        </div>
                        <div class="product-profile-item">
                            <div class="product-info">
                                <h4 class="title title-custome"><a href="/profile?tab=orders">@lang('website.purchases')</a></h4>
                            </div>
                        </div>
                        <div class="product-profile-item">
                            <div class="product-info">
                                <h4 class="title title-custome"><a href="/logout">@lang('website.logout')</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(auth()->check() && auth()->user()->role=='admin')
                <div class="sidebar-profile">
                    <h4 class="sidebar-profile-title">@lang('website.admin')</h4>
                    <div class="product-profile">
                        <div class="product-profile-item">
                            <div class="product-info">
                                <h4 class="title title-custome"><a href="/admin">@lang('website.manage-shop')</a></h4>
                            </div>
                        </div>
                        <div class="product-profile-item">
                            <div class="product-info">
                                <h4 class="title title-custome"><a href="/logout">@lang('website.logout')</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</aside>
<div class="sidebar-profile-overlay"></div>
