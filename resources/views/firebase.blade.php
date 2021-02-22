<html>
    <head>
        <title>FCM</title>
        <!-- firebase integration started -->

        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
        <!-- Firebase App is always required and must be first -->
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>

        <!-- Add additional services that you want to use -->
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-functions.js"></script>

        <!-- firebase integration end -->

        <!-- Comment out (or don't include) services that you don't want to use -->
        <!-- <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-storage.js"></script> -->

        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>
    </head>
    <body>
        Notificaiton System
    </body>

    <script type="text/javascript">
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBydtC0ldj-QMwYDjcdVHMcVuHp1ngHoYo",
            authDomain: "laravel-tutorial-3f93d.firebaseapp.com",
            databaseURL: "https://laravel-tutorial-3f93d-default-rtdb.firebaseio.com",
            projectId: "laravel-tutorial-3f93d",
            storageBucket: "laravel-tutorial-3f93d.appspot.com",
            messagingSenderId: "41684284800",
            appId: "1:41684284800:web:e4b0397607b699731dfd65",
            measurementId: "G-MQGS33D1EC"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        //firebase.analytics();
        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
        //MsgElem.innerHTML = "Notification permission granted."
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                // print the token on the HTML page
                console.log(token);



            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            console.log(payload);
            var notify;
            notify = new Notification(payload.notification.title,{
                body: payload.notification.body,
                icon: payload.notification.icon,
                tag: "Dummy"
            });
            console.log(payload.notification);
        });

        //firebase.initializeApp(config);
        var database = firebase.database().ref().child("/users/");

        database.on('value', function(snapshot) {
            renderUI(snapshot.val());
        });

        // On child added to db
        database.on('child_added', function(data) {
            console.log("Comming");
            if(Notification.permission!=='default'){
                var notify;

                notify= new Notification('CodeWife - '+data.val().username,{
                    'body': data.val().message,
                    'icon': 'bell.png',
                    'tag': data.getKey()
                });
                notify.onclick = function(){
                    alert(this.tag);
                }
            }else{
                alert('Please allow the notification first');
            }
        });

        self.addEventListener('notificationclick', function(event) {
            event.notification.close();
        });

    </script>
</html>
