$( document ).ready(function() {
    $("#btnRegistrazione").click(function (e) {
        $("#modal-register").modal("show");
        $(".risLogin").text("");
    });
    $("#form-registrazione").on('submit',(function(e) {
        e.preventDefault();
        var nome = $("#txtNome").val();
        var cognome = $("#txtCognome").val();
        var email = $("#txtEmail").val();
        var password = $("#txtPassword").val();
        var citta = $("#txtCitta").val();
        var cap = $("#txtCAP").val();
        var indirizzo = $("#txtIndirizzo").val();
        
        $.ajax({
            url: "home/php/registrazione.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: {nome:nome, cognome:cognome, email:email, password:password, citta:citta, cap:cap, indirizzo:indirizzo}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            success: function(data)   // A function to be called if request succeeds
            {
                $("#modal-register").modal("hide");
                if(data == "Registrato"){
                    $("#risRegistrazione").css({"color": "Green", "font-size": "15pt","font-weight": "bold"});
                    $("#risRegistrazione").text("Registrazione avvenuta, effettua il login");

                }else{
                    $("#risRegistrazione").css({"color": "Red", "font-size": "15pt","font-weight": "bold"});
                    $("#risRegistrazione").text("Registrazione fallita, riprova più tardi");
                }
                console.log(data);

            }
        });
    }));
});