@extends('emails.layout.app')
@section('content')

    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12 text-center" style=" padding:50px 0; text-align: center !important;">
                    <div class="row" style="text-align: center !important;"><h1>@lang("website.new_customer_message")</h1></div>

                    <hr />
                    <small>
                        @lang("website.you_have_received_an_order_from"){{$myData['email']}}.
                        <br/>
                        <div>
                            " {{$myData['message'] }}"
                        </div>
                    </small>
                </div>

            </div>
        </div>
    </main>

@endsection
