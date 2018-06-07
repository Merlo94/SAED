<script src="../lib/bootstrap-filestyle.min.js"></script>
<script src="script/aggiungi_piatti.js"></script>
<form role="form" method="post" id="form_aggiungi_piatti" action="">
    <div class="form-group" >
        <label for="nome">Nome Piatto:</label>
        <input name ="nome" type="text" class="form-control" id="nome" required>
    </div>
    <div class="form-group">
        <label for="descrizione">Descrizione:</label>
        <input name="descrizione"type="text" class="form-control" id="descrizione" required>
    </div>
    <div class="form-group">
        <label for="prezzo">Prezzo:</label>
        <input name="prezzo" type="number" step="0.01" min="0" class="form-control" id="prezzo" required>
    </div>
    <div class="form-group">
        <label for="immagine">Immagine:</label>
        <input type="file" class="filestyle" data-input="false" name="immagine" id="immagine"  required/>
    </div>
    <button type="submit" class="btn btn-default">Aggiungi</button>
</form>
<div class="alert" id="alert" style="margin-top: 10px">
</div>