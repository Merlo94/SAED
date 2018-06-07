<?php
require_once('lib/class.phpwsdl.php');
ini_set('soap.wsdl_cache_enabled',0);
PhpWsdl::$CacheTime=0;
if(isset($_SESSION["email"])) {
    header('location: home/index.php');
}
if($_POST){
    controllaLogin();
}
function controllaLogin(){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $wsdl="lib/cache/server.wsdl";
	$soap= new SoapClient($wsdl);
	global $risposta;
    $risposta = $soap->controlla_login($email,$password);
    if($risposta[0] == "Login verificato!"){
        session_start();
        $_SESSION['email'] = $risposta[1];
        $_SESSION['superuser'] = $risposta[2];
        $_SESSION['indirizzo'] = $risposta[3];
        $_SESSION['citta'] = $risposta[4];
        header('location: home/index.php');
    }
}


?>

<html>
	<head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="registrazione.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
		<title>Login</title>
	</head>
	<body>
		<div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <img src="logo.jpg" />
                    <form role="form" method="post" action="">
                        <div class="form-group" >
                            <label for="email">Email:</label>
                            <input name ="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input name="password"type="password" class="form-control" id="pwd" required>
                        </div>
                        <button type="submit" class="btn btn-info btn-block" >Login</button>
                    </form>
                    <button id="btnRegistrazione" class="btn btn-info btn-block">Registrati</button>
                    <div id="risRegistrazione"></div>
                    <div class="risLogin" >
                        <?php
                        if($_POST){
                            echo $risposta[0];
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>

		</div>
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="modal-register-label">Registrati adesso</h3>
                        <p>Compila i campi:</p>
                    </div>

                    <div class="modal-body">

                        <form role="form" action="" method="post" id="form-registrazione" class="registration-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-first-name">Nome</label>
                                <input type="text"  placeholder="Nome..." class="form-first-name form-control" id="txtNome" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Cognome</label>
                                <input type="text" placeholder="Cognome..." class="form-last-name form-control" id="txtCognome" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Email</label>
                                <input type="email"  placeholder="Email..." class="form-email form-control" id="txtEmail" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password:</label>
                                <input placeholder="Password..." type="password" class="form-control" id="txtPassword" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Citta:</label>
                                <input placeholder="Città..." type="text" class="form-control" id="txtCitta">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">CAP:</label>
                                <input placeholder="CAP..." type="number" class="form-control" id="txtCAP">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-indirizzo">Indirizzo:</label>
                                <input placeholder="Indirizzo..." type="text" class="form-control" id="txtIndirizzo">
                            </div>
                            <button id="btnConfermaRegistrazione" type="submit" class="btn btn-info btn-block">Registrati!</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
	</body>
</html>