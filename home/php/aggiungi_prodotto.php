<?php
require_once('../../lib/class.phpwsdl.php');
ini_set('soap.wsdl_cache_enabled',0);
PhpWsdl::$CacheTime=0;
if(isset($_FILES["immagine"]["type"]))
{

    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["immagine"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["immagine"]["type"] == "image/png") || ($_FILES["immagine"]["type"] == "image/jpg") || ($_FILES["immagine"]["type"] == "image/jpeg")
        ) && ($_FILES["immagine"]["size"] < 10000000)
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["immagine"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["immagine"]["error"];
        }
        else
        {
            if (file_exists("../immagini_prodotti/" . $_FILES["immagine"]["name"])) {
                echo $_FILES["immagine"]["name"] . " già esistente";
            }
            else
            {
                $sourcePath = $_FILES['immagine']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "../immagini_prodotti/" .$_FILES['immagine']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                $wsdl="../../lib/cache/server.wsdl";
                $soap= new SoapClient($wsdl);
                $targetPath = $_FILES['immagine']['name'];
                $risposta = $soap->aggiungi_piatto($_POST["nome"],$_POST["descrizione"],$_POST["prezzo"],$targetPath);

                if($risposta != "Prodotto aggiunto correttamente"){
                    unlink("../immagini_prodotti/".$targetPath);
                }
                echo $risposta;
            }
        }
    }
    else
    {
        echo "Formato Immagine non valido oppure Immagine troppo grande";
    }
}
?>
