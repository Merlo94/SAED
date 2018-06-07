<?php
require_once('../../lib/class.phpwsdl.php');
ini_set('soap.wsdl_cache_enabled',0);
PhpWsdl::$CacheTime=0;
$wsdl="../../lib/cache/server.wsdl";
$soap= new SoapClient($wsdl);
$idOrdine = $_POST["idOrdine"];
$risposta = $soap->visualizza_ordine_dettaglio($idOrdine);
echo json_encode($risposta);

?>