@extends('emails.layout.app')
@section('content')

    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="row">
                <div class="main-content col-md-12 text-left" style=" padding:50px 0; text-align: center !important;">
                    Dear {{$myData->name}},
                    <hr/>
                    Your new password is : <strong>{{$myPassword}}</strong>
                    <br/>
                    <br/>
                    You can always contact us for further information.
                </div>

            </div>
        </div>
    </main>

@endsection
