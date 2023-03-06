@extends('emails.layout.app')
@section('content')

    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12 text-left" style=" padding:50px 0; text-align: center !important;">
                    Dear {{$myData->name}},
                    <hr />

                    To reset your account and get the new password <a href="{{url('/resetPassword/'.$myData->two_factor_recovery_codes)}}">click here</a>.
                </div>

            </div>
        </div>
    </main>

@endsection
