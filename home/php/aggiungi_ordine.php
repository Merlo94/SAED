<?php
if (isset($_POST["riepilogo"])){
    $riepilogo = $_POST["riepilogo"];
    $indirizzoSpedizione = $_POST["indirizzo"];
    $totale = $_POST["totale"];
    $oggi = getdate();
    $data = $oggi["mday"]."/".$oggi["mon"]."/".$oggi["year"]. " ".$oggi["hours"].":".$oggi["minutes"];
    session_start();
    $mail = $_SESSION["email"];
    session_abort();
    require_once('../../lib/class.phpwsdl.php');
    ini_set('soap.wsdl_cache_enabled',0);
    PhpWsdl::$CacheTime=0;
    $wsdl="../../lib/cache/server.wsdl";
    $soap= new SoapClient($wsdl);
    $risposta = $soap->aggiungi_Ordine($mail,$indirizzoSpedizione,$data,$totale,$riepilogo);
    echo $risposta;

}else{
    echo "Errore Improvviso, Riprovare";
}



?>