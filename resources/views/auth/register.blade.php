<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Challenge For Earth</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ URL::asset('/images/logo.png') }}" />
    <style>

body {
  font-family: 'Nunito', sans-serif;
  font-weight: bold;
  color: #FDFCFB;
  text-align: center;
}


form {
  width: 100%;
  margin: 5% auto;
}


.header {
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 5px;
  font-weight: bold;
}


.description {
  font-size: 0.9rem;
  letter-spacing: 1px;
  line-height: 1.3em;
}


.input {
  display: flex;
  align-items: center;
}


.button {
  height: 44px;
  border: none;
}

  
#email {
  width: 60%;
  background: #FDFCFB;
  font-family: inherit;
  color: #737373;
  letter-spacing: 1px;
  text-indent: 5%;
  border-radius: 5px 0 0 5px;
}


#submit {
  width: 40%;
  height: 46px;
  background: #44bd32;
  font-family: inherit;
  font-weight: bold;
  color: inherit;
  letter-spacing: 1px;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  transition: background .3s ease-in-out;
}
  

#submit:hover {
  background: #22ab10;
}
  

input:focus {
  outline: none;
  outline: 2px solid #44bd32;
  box-shadow: 0 0 2px #44bd32;
}

.content {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}

.row {
    margin: 0;
    padding: 0;
}

#bg {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  filter: brightness(50%);
}

.grecaptcha-badge {
  display: none !important;
  visibility: hidden !important;
}

    </style>
  </head>
    <video muted autoplay loop id="bg">
      <source src="{{ URL::asset('/images/bg_forest.mp4') }}" type="video/mp4">
    </video>
  <body class="content">
    <div class="row">
        <div class="col-12">
            <img src="{{ URL::asset('/images/logo.png') }}" alt="logo Challenge For Earth" style="width: 30%;" />
            <form action="{{ route('register.store') }}" method="post">
                @csrf
              <div class="header">
                 <p>Ne manquez pas le top départ</p>
              </div>
              <div class="description">
                <p>Relevez des défis à votre échelle, seul·e ou en communauté.</p>
                <p>Challenge For Earth est en préparation, lancement en Juin.</p>
                <p>Soyez-prêts !</p>
              </div>
              <div class="input">
                <input required type="text" class="button" id="email" name="email" placeholder="VOTRE@MAIL.COM">
                <input type="hidden" name="recaptcha" id="recaptcha">
                <input type="submit" id="submit" value="S'INSCRIRE" class="button">
              </div>
              <div class="description">
                <p>En vous inscrivant, vous concédez à recevoir des nouvelles par email concernant Challenge For Earth.</p>
                <p>
                  Session::get('msg');
                </p>
              </div>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?render=6LcxdrAaAAAAAAueNWoROgntxDtWGCqgIg0yBhgX"></script>
<script>
         grecaptcha.ready(function() {
             grecaptcha.execute('6LcxdrAaAAAAAAueNWoROgntxDtWGCqgIg0yBhgX', {action: 'register'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
</script>
  </body>
</html>