<!DOCTYPE html>



<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==3)
{
?>



<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Trudu Gabriele 47801"/>
        <meta name="description" content="Sito di compravendita auto usate"/>

        <title>Affari a 4 ruote - Progetto AMM 2013-2014</title>

        <link rel="shortcut icon" type="image/x-icon" href="../../Immagini/favicon.ico"/>
        <link rel="Stylesheet" type="text/css" href="../../Css/style.css" media="screen"/>
    </head>



    <body>
        <div id="page">
            <div id="header">
                <div id="logo">
                    <img src="../../Immagini/logo.png" alt="Logo" usemap="#logo_home"/>

                    <map name="logo_home">
                        <area shape="circle" coords="75,75,75" href="#" alt="Home">
                    </map>

                    <p>Progetto di AMM 2013-2014</p>

                    <div id="benvenuto">
                        <span id="login">
                            <a href="../Logout.php">Logout</a>
                        </span>
                    </div>
                </div>

                <div id="menu">
                    <ul>
                        <li><a href="Home.php" id="home">Home</a></li>
                        <li><a href="Profilo.php" id="utenti">Profilo</a></li>
                        <li><a href="Carrello.php" id="carrello">Carrello</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <table id="table-content">
                    <tr>
                        <td id="left"></td>

                        <td id="center">
                            <h1 id="h1-riscuoti">Ricarica</h1>

                            <?
                            $connessione_al_server = mysql_connect("localhost","truduGabriele","beluga874");

                            if(!$connessione_al_server)
                            {
                                die("Errore: connessione non riuscita".mysql_error());
                            }



                            $db_selected = mysql_select_db("amm14_truduGabriele", $connessione_al_server);

                            if(!$db_selected)
                            {
                                die("Errore: selezione del database errata ".mysql_error());
                            }

                            $queryvis = mysql_query("SELECT * FROM utenti WHERE email='".$_COOKIE["utente"]."'") or die("query non riuscita".mysql_error());

                            $row = mysql_fetch_object($queryvis);

                            if(isset($_GET["aggiungi"]) && ($_GET["aggiungi"]=="ok"))
                            {
                                $impric = $_POST["ricarica"];

                                $query = "UPDATE utenti SET credito = '".$row->credito."' + '".$impric."' WHERE email='".$_COOKIE["utente"]."'";

                                $result = mysql_query($query);

                                if(!$result)
                                {
                                    die("Errore nella query: ".mysql_error());

                                    $pagina_login = "Ricarica.php?agg=err";

                                    header("Location:".$pagina_login);
                                }

                                else
                                {
                                    $pagina_login = "Ricarica.php?agg=ok";

                                    header("Location:".$pagina_login);
                                }
                            }

                            if(isset($_GET["agg"]) && ($_GET["agg"]=="ok"))
                            {
                            ?>

                            <p><font color="32CD32">Ricarica effettuata con successo!</font></p>

                            <?
                            }

                            else
                            {
                                if(isset($_GET["agg"]) && ($_GET["agg"]=="err"))
                                {
                                ?>

                                <p><font color="B20000">Errore! Impossibile ricaricare, riprova pi&urave; tardi.</font></p>

                                <?
                                }
                            }
                            ?>

                            <p>Inserisci l'importo da aggiungere al tuo salvadanaio:</p>

                            <form action="Ricarica.php?aggiungi=ok" method="post" id="form-login">
                                <table id="table-form">
                                    <tr>
                                        <td>Credito attuale:</td>

                                        <td>&nbsp; <?echo"$row->credito";?> &euro;</td>
                                    </tr>

                                    <tr>
                                        <td>Aggiungi importo:</td>

                                        <td><input type="number" name="ricarica" min="0" required/></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Ricarica" id="tasto-login"/><td>
                                    </tr>
                                </table>
                            </form>

                            <br>

                            <p>Ricordati di confermare l'acquisto delle auto dal <a href="Carrello.php">CARRELLO</a></p>
                        </td>

                        <td id="right"></td>
                    </tr>
                </table>
            </div>

            <div id="footer">
                <p>Copyright &copy; 2014 - Affari a 4 ruote. Tutti i diritti riservati.</p>

                <p>
                    <a href="http://validator.w3.org/check/referer">
                        <img style="border:0;width:88px;height:31px" src="../../Immagini/html5.png" alt="HTML Valido!" />
                    </a>

                    <a href="http://jigsaw.w3.org/css-validator/check/referer">
                        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valido!" />
                    </a>
                </p>
            </div>
        </div>
    </body>
</html>



<?
}

else
{
    $pagina_login = "../Login.php";
    $pagina_redirect = "Compratore/Home.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
