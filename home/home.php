<?php
    session_start();
    $wsdl="../lib/cache/server.wsdl";
    $soap= new SoapClient($wsdl);
    global $risposta;
    $risposta = $soap->info_utente($_SESSION["email"]);
?>
    <div class = "jumbotron">
        <h1>Benvenuto <?php echo $risposta[1]." ".$risposta[2] ?></h1>
        <?php
            if($risposta[6] == 1){
                echo "<h2>Sei amministratore </h2>";
            }else{
                echo "<h2>Sei un Utente</h2>";
            }
        ?>
    </div>
