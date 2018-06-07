<?php
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $citta = $_POST["citta"];
    $cap = $_POST["cap"];
    $indirizzo = $_POST["indirizzo"];

    require_once('../../lib/class.phpwsdl.php');
    ini_set('soap.wsdl_cache_enabled',0);
    PhpWsdl::$CacheTime=0;
    $wsdl="../../lib/cache/server.wsdl";
    $soap= new SoapClient($wsdl);
    $risposta = $soap->registrazione($email,$cognome,$nome,$password,$indirizzo,$citta,$cap);
    echo $risposta;
?>