$( document ).ready(function() {
    $(".contenitore").load( "home.php" );
    $("#nav_logout").click(function(){
        document.location = 'php/logout.php';
    });
    $("#nav_home").click(function(){
        $(".contenitore").load( "home.php" );
        $("li").removeClass("active");
        $("#nav_home").parent().addClass("active");

    });
    $("#nav_aggiungi_piatti").click(function(){
        $("li").removeClass("active");
        $(".contenitore").load( "aggiungi_piatti.php" );
        $("#nav_aggiungi_piatti").parent().addClass("active");
    });
    $("#nav_visualizza_piatti").click(function(){
        $("li").removeClass("active");
        $(".contenitore").load( "visualizza_piatti.php" );
        $("#nav_visualizza_piatti").parent().addClass("active");
    });
    $("#nav_ordina").click(function(){
        $("li").removeClass("active");
        $(".contenitore").load( "ordina.php" );
        $("#nav_ordina").parent().addClass("active");
    });
    $("#nav_visualizza_ordini").click(function(){
        $("li").removeClass("active");
        $(".contenitore").load( "visualizza_ordini.php" );
        $("#nav_visualizza_ordini").parent().addClass("active");
    });

});