$( document ).ready(function() {
    $("#alert").hide();
    $("#alertIndirizzo").hide();
    var riepilogoArray = [];
    var spesaTotale = 0;
    $("#btnRiepilogo").click(function(e){
        e.preventDefault();
        spesaTotale = 0;
        riepilogoArray.length = 0;
        $("#bodyTabellaRiepilogo").empty();
        var num = 0;

        $("#tabellaProdotti tr").each(function(){
            var idProdotto = $(this).attr("id");
            var nomeP = $(this).find("td:nth-child(2)").text();
            var prezzoP = $(this).find("td:nth-child(4)").text();
            var quantitaP = $(this).find("td:nth-child(5)").children('input').val();
            if(quantitaP > 0){
                num++;
                spesaTotale = spesaTotale + parseFloat(quantitaP)*parseFloat(prezzoP);
                var prodotto = {idProdotto: idProdotto, nome: nomeP, prezzo: prezzoP, quantita: quantitaP};
                riepilogoArray.push(prodotto);
            }
        });
        if(num > 0){
            $("#modalRiepilogo").modal("show");
            for(var i = 0;i< riepilogoArray.length;i++){
                $("#bodyTabellaRiepilogo").append("<tr>"+"<td>"+ riepilogoArray[i]["nome"] +"</td>"+"<td>"+ riepilogoArray[i]["quantita"] +"</td>"+"<td>"+ riepilogoArray[i]["prezzo"] +"</td>"+"</tr>" );
            }
            $("#totaleRiepilogo").children().html(spesaTotale +"€");
        }else{
            $("#alert").removeClass("alert-success").addClass("alert-danger").html("<strong>Attenzione!</strong> Non puoi completare l'ordine senza aver scelto almeno un prodotto.").show().delay(3000).fadeOut();
        }

        

    });
    $("#confermaOrdine").click(function (e) {
        e.preventDefault();
        var indirizzo = $("#indirizzoSpedizione").val();
        if(indirizzo == ""){
            $("#alertIndirizzo").show().delay(3000).fadeOut();
            return false;
        }
        $.ajax({
            type     : "POST",
            data     : {riepilogo :riepilogoArray, indirizzo:indirizzo, totale:spesaTotale},
            url: "php/aggiungi_ordine.php",
            success: function(data) {
                if (data == "Ordine Effettuato Correttamente") {
                    $("#alert").removeClass("alert-danger").addClass("alert-success").html("<strong>Ordine Effettutato Correttamente!</strong>").show().delay(3000).fadeOut();
                    $("#tabellaProdotti tr").each(function(){
                        $(this).find("td:nth-child(5)").children('input').val(0);
                    });
                } else {
                    $("#alert").removeClass("alert-success").addClass("alert-danger").html("<strong>Attenzione! </strong>"+data).show().delay(3000).fadeOut();
                }
                $("#modalRiepilogo").modal("hide");
            },
            error:function () {
                alert("Chiamata fallita,Riprovare");
            }
        });
    })


});
