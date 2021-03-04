@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>

        //firebase.analytics();
        const messaging = firebase.messaging();

        function sendTokenToServer(token){
            // axios.post('/api/save-fcm-token', {
            //     token
            // }).then(res => {
            //     console.log(res);
            // });
            console.log('send token function');
        }

        messaging.getToken().then((currentToken) => {
            if (currentToken) {
                // Send the token to your server and update the UI if necessary
                sendTokenToServer('token value')
                // ...
            } else {
                // Show permission request UI
                console.log('No registration token available. Request permission to generate one.');
                // ...
            }
        }).catch((err) => {
            console.log('An error occurred while retrieving token. ', err);
            // ...
        });

    </script>
@endsection




