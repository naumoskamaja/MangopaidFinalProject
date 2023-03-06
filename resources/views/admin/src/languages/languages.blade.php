@extends('admin.layout.app')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row my-4">
                            <div class="col-lg-12 col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="row">
                                            <div class="col-6">
                                                <h4 style="padding: 10px 0">Languages</h4>
                                            </div>
                                        </div>
                                    </div>
                                    @include('admin.src.languages.parts.add')
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="row" style="padding: 20px 0;">
                                            <div class="col-md-6">
                                                <h6>Variable List</h6>
                                            </div>
                                            <div class="col-md-6 text-right" style="text-align: right">
                                                <a href="{{url('admin/languages/generate')}}" class="btn btn-info"
                                                   style="width: fit-content;">
                                                    <i class="fa fa-save"></i> @lang('website.generate_language')
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="table-responsive">
                                            @include('admin.src.languages.parts.list')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeVariable(nr) {
            var langVar = $('#langVar' + nr).val();
            var en = $('#en' + nr).val();
            var al = $('#al' + nr).val();
            var mk = $('#mk' + nr).val();
            var de = $('#de' + nr).val();
            var data = {
                'langVar': langVar,
                'en': en,
                'al': al,
                'mk': mk,
                'de': de
            };


            $.post('/admin/languages/update', data, function (response) {
                if (response.status == true) {
                    Swal.fire('Variable changed successfully !');
                }
            });
        }

        $(document).ready(function () {
            $('#test2').remove();
        })
    </script>

@endsection

