<script src="script/riepilogo.js"></script>
<?php
session_start();
?>
<table id="tabellaProdotti" class="table table-striped">
    <thead>
    <tr>
        <th>Immagine</th>
        <th>Nome</th>
        <th>Descrizione</th>
        <th>Prezzo</th>
        <th>Quantit&agrave;</th>
    </tr>
    </thead>
    <tbody>
    <?php
    session_start();
    require_once('../lib/class.phpwsdl.php');
    ini_set('soap.wsdl_cache_enabled',0);
    PhpWsdl::$CacheTime=0;
    $wsdl="../lib/cache/server.wsdl";
    $soap= new SoapClient($wsdl);
    $risposta = $soap->visualizza_piatti();

    foreach ($risposta as $row) {
        ?>
        <tr id="<?php  echo $row['idProdotto'];  ?>">
            <td><img width="200" height="200" class="img-responsive" src="<?php echo "immagini_prodotti/".$row['immagine']; ?>"></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['descrizione']; ?></td>
            <td><?php echo $row['prezzo']."€"; ?></td>
            <td><input class="form-control" type="number" name="quantita" value="0" min="0" ></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>

<button type="button" class="btn btn-info btn-lg" id="btnRiepilogo">Riepilogo</button>
<div class="alert" id="alert" style="margin-top: 10px">
</div>
<div id="modalRiepilogo" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Riepilogo Ordine</h4>
            </div>
            <div class="modal-body">
                <table id="tabellaRiepilogo" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Quantit&agrave;</th>
                        <th>Prezzo</th>
                    </tr>
                    </thead>
                    <tbody id="bodyTabellaRiepilogo">
                        
                    </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2"><strong>Totale</strong></td>
                            <td id="totaleRiepilogo"><strong></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="form-group" style="margin-left: 10px; margin-right: 10px">
                <label for="indirizzoSpedizione">Indirizzo Spedizione:</label>
                <input type="text" value="<?php echo $_SESSION['indirizzo']."  ".$_SESSION['citta']; ?>"
                       class="form-control" id="indirizzoSpedizione"/>
            </div>
            <div class="alert alert-danger" id="alertIndirizzo" style="margin: 10px">
                <strong>Attenzione!</strong> Devi inserire un indirizzo di spedizione!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-lg" id="confermaOrdine">Conferma Ordine</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="esciButton">Esci</button>
            </div>

        </div>

    </div>
</div>