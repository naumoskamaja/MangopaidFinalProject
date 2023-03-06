
@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-6">
                                <h4>{{$newsletter->title}}</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="/admin/newsletter/send/{{$newsletter->id}}" class="btn btn-info"><i
                                        class="fa fa-share"></i></a>
                            </div>
                        </div>
                        <hr/>
                        <div class="widget-content widget-content-area br-6">
                            <div class="row mb-5">
                                <div class="col-12">
                                    <p class="align-left"></p>
                                    <div class="widget-content widget-content-area max-image-100 newsletter-content align-center">
                                        {!! html_entity_decode($newsletter->content) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
