<html>
  <head>
    <meta charset="utf-8">
    <title>Challenge For Earth</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>

body {
  background: #F8A434;
  font-family: 'Lato', sans-serif;
  color: #FDFCFB;
  text-align: center;
}


form {
  width: 100%;
  margin: 5% auto;
}


.header {
  font-size: 35px;
  text-transform: uppercase;
  letter-spacing: 5px;
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
    height: 100%;
}

.row {
    margin: 0;
    padding: 0;
}
    </style>
  </head>
  <body class="content">
    <div class="row">
        <div class="col-12">
            <form action="/register" method="post" name="sign up for beta form">
                @csrf
              <div class="header">
                 <p>Ne manquez pas le top départ</p>
              </div>
              <div class="description">
                <p>Relevez des défis à votre échelle, seul·e ou en groupe.</p>
                <p>Challenge For Earth est en cours de conception, lancement en Juin.</p>
                <p>Soyez-prêts !</p>
              </div>
              <div class="input">
                <input type="text" class="button" id="email" name="email" placeholder="VOTRE@MAIL.COM">
                <input type="submit" id="submit" value="S'INSCRIRE" class="button g-recaptcha" 
        data-sitekey="reCAPTCHA_site_key" 
        data-callback='onSubmit' 
        data-action='submit'>
              </div>
              <div class="description">
                <p>En vous inscrivant, vous concédez à recevoir des nouvelles par email concernant Challenge For Earth.</p>
                <p>
                    @isset($msg)
                        {{ $msg }}
                    @endisset
                </p>
              </div>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
       function onSubmit(token) {
         document.getElementById("demo-form").submit();
       }
    </script>
  </body>
</html>