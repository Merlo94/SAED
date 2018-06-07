<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="script/index.js"></script>
    </head>
    <body style="margin-bottom: 80px">


    <?php
        session_start();
        if(!isset($_SESSION["email"])) {
            header('location: ../index.php');
        }
        if($_SESSION["superuser"] == 1) {
            ?>
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Ristorante</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#" id="nav_home">Home</a></li>
                            <li><a href="#" id="nav_visualizza_piatti">Visualizza Piatti</a></li>
                            <li><a href="#" id="nav_ordina">Ordina</a></li>
                            <li><a href="#" id="nav_aggiungi_piatti">Aggiungi Piatti</a></li>
                            <li><a href="#" id="nav_visualizza_ordini">Visualizza Ordini</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" id="nav_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <?php
        }else{
            ?>
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand">Ristorante</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a id="nav_home">Home</a></li>
                            <li><a href="#" id="nav_visualizza_piatti">Visualizza Piatti</a></li>
                            <li><a href="#" id="nav_ordina">Ordina</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" id="nav_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        <?php
            }
        ?>
        <div class="container contenitore">
            
        </div>
    </body>
</html>