<table class="table table-striped">
    <thead>
    <tr>
        <th>Immagine</th>
        <th>Nome</th>
        <th>Descrizione</th>
        <th>Prezzo</th>
    </tr>
    </thead>
    <tbody>
    <?php
        require_once('../lib/class.phpwsdl.php');
        ini_set('soap.wsdl_cache_enabled',0);
        PhpWsdl::$CacheTime=0;
        $wsdl="../lib/cache/server.wsdl";
        $soap= new SoapClient($wsdl);
        $risposta = $soap->visualizza_piatti();
        foreach ($risposta as $row) {
            ?>
            <tr>
                <td><img width="200" height="200" class="img-responsive" src="<?php echo "immagini_prodotti/".$row['immagine']; ?>"/></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['descrizione']; ?></td>
                <td><?php echo $row['prezzo']."€"; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
