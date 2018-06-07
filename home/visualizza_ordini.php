<script src="script/dettaglio_ordine.js"></script>
<table class="table table-striped" id="tabella_ordini">
    <thead>
    <tr>
        <th>Numero Ordine</th>
        <th>Cliente</th>
        <th>Data</th>
        <th>Indirizzo Spedizione</th>
        <th>Totale</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once('../lib/class.phpwsdl.php');
    ini_set('soap.wsdl_cache_enabled',0);
    PhpWsdl::$CacheTime=0;
    $wsdl="../lib/cache/server.wsdl";
    $soap= new SoapClient($wsdl);
    $risposta = $soap->visualizza_ordini();
    foreach ($risposta as $row) {
        ?>
        <tr>
            <td><?php echo $row['idOrdine']; ?></td>
            <td><?php echo $row['Utente']; ?></td>
            <td><?php echo $row['data']; ?> </td>
            <td><?php echo $row['indirizzoSpedizione']; ?> </td>
            <td><?php echo $row['totale']."€"; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div id="modalDettaglioOrdine" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Riepilogo Ordine</h4>
            </div>
            <div class="modal-body">
                <table id="tabellaDettaglioOrdine" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Quantit&agrave;</th>
                        <th>Prezzo</th>
                    </tr>
                    </thead>
                    <tbody id="BodytabellaDettaglioOrdine">
                
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Chiudi</button>
            </div>
        </div>

    </div>
</div>