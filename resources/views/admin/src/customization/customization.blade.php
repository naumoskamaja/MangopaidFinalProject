@extends('admin.layout.app')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>@lang("website.homepage_style")</h4>
                            </div>
                        </div>
                        <hr/>
                        <div>
                            <div class="layout-px-spacing">
                                <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                                    <div class="col-lg-12">
                                        <div class="widget-content searchable-container list">
                                            <div class="row">
                                                @for($i=1;$i<=4;$i++)
                                                    <div class="col-md-3">
                                                        <div id="infobox3" class="layout-spacing">
                                                            <div class="statbox widget box box-shadow">
                                                                <div class="widget-content widget-content-area">
                                                                    <div class="infobox-3">
                                                                        <div class="info-icon"
                                                                             @if($conf->template==$i) style="background: #1b55e2;" @endif
                                                                        >
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="20" height="20"
                                                                                 viewBox="0 0 24 24"
                                                                                 fill="none" stroke="currentColor"
                                                                                 stroke-width="2"
                                                                                 stroke-linecap="round"
                                                                                 stroke-linejoin="round"
                                                                                 class="feather feather-aperture">
                                                                                <circle cx="12" cy="12"
                                                                                        r="10"></circle>
                                                                                <line x1="14.31" y1="8" x2="20.05"
                                                                                      y2="17.94"></line>
                                                                                <line x1="9.69" y1="8" x2="21.17"
                                                                                      y2="8"></line>
                                                                                <line x1="7.38" y1="12" x2="13.12"
                                                                                      y2="2.06"></line>
                                                                                <line x1="9.69" y1="16" x2="3.95"
                                                                                      y2="6.06"></line>
                                                                                <line x1="14.31" y1="16" x2="2.83"
                                                                                      y2="16"></line>
                                                                                <line x1="16.62" y1="12" x2="10.88"
                                                                                      y2="21.94"></line>
                                                                            </svg>
                                                                        </div>
                                                                        <h5 class="info-heading">Style {{$i}}</h5>
                                                                        <ul class="style-list">
                                                                            @include('admin.src.customization.styles.style'.$i)
                                                                        </ul>
                                                                        @if($conf->template==$i)
                                                                            <button class="border-0 background-none"
                                                                                    disabled>Selected
                                                                                <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-check">
                                                                                    <polyline
                                                                                        points="20 6 9 17 4 12"></polyline>
                                                                                </svg>
                                                                            </button>
                                                                            <a href="/admin/banners"
                                                                               class="info-link border-0 background-none">
                                                                                Customize
                                                                                <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-arrow-right">
                                                                                    <line x1="5" y1="12" x2="19"
                                                                                          y2="12"></line>
                                                                                    <polyline
                                                                                        points="12 5 19 12 12 19"></polyline>
                                                                                </svg>
                                                                            </a>
                                                                        @else
                                                                            <a href="/admin/customization/set_style/{{$i}}"
                                                                               class="info-link border-0 background-none"
                                                                               style="cursor: pointer">
                                                                                Select
                                                                                <svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 24 24"
                                                                                    fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-arrow-right">
                                                                                    <line x1="5" y1="12" x2="19"
                                                                                          y2="12"></line>
                                                                                    <polyline
                                                                                        points="12 5 19 12 12 19"></polyline>
                                                                                </svg>
                                                                            </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
