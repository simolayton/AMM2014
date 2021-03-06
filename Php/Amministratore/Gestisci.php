<!DOCTYPE html>



<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==1)
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
                        <area shape="circle" coords="75,75,75" href="Home.php" alt="Home">
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
                        <li><a href="Utenti.php" id="utenti">Utenti</a></li>
                        <li class="current_page"><a href="#" id="gestisci">Gestisci</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <table id="table-content">
                    <tr>
                        <td id="left"></td>

                        <td id="center">
                            <h1 id="h1-gestisci">Gestisci</h1>

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
                            ?>

                            <h3>Utenti:</h3>

                            <?

                            if(isset($_GET["rimut"]) && ($_GET["rimut"]=="ok"))
                            {
                            ?>

                            <p><font color="32CD32">Utente rimosso dalla lista!</font></p>

                            <?
                            }

                            else
                            {
                                if(isset($_GET["rimut"]) && ($_GET["rimut"]=="err"))
                                {
                                ?>

                                <p><font color="B20000">Errore! Utente non rimosso correttamente.</font></p>

                                <?
                                }

                                else
                                {
                                    if(isset($_GET["rimut"]) && ($_GET["rimut"]=="errpres"))
                                    {
                                    ?>

                                    <p><font color="B20000">Errore! Utente non presente.</font></p>

                                    <?
                                    }
                                }
                            }



                            $queryvis = mysql_query("SELECT * FROM utenti WHERE email <> '".$_COOKIE["utente"]."'") or die("query non riuscita".mysql_error());

                            if(mysql_num_rows($queryvis)==0)
                            {

                            ?>
                            <br><p>Nessun utente registrato al momento. Riprova tra poco</p><br><br>
                            <?
                            }

                            while($row = mysql_fetch_object($queryvis))
                            {
                            ?>
                                <br>

                                <table id="table-vis">
                                    <tr>
                                        <td><b><?echo"$row->email";?></b></td>

                                        <td>Account:</td>

                                        <td><?echo"$row->tipo";?></td>
                                    </tr>

                                    <tr>
                                        <td><a href="Rimuovi.php?rimuoviu=<?echo $row->email?>" id="cestino">Rimuovi utente</a></td>

                                        <td>Credito:</td>

                                        <td><?echo"$row->credito";?> &euro;</td>
                                    </tr>
                                </table>

                                <br><br>

                            <?
                            }
                            ?>



                            <h3>Annunci:</h3>

                            <?

                            if(isset($_GET["rima"]) && ($_GET["rima"]=="ok"))
                            {
                            ?>

                            <p><font color="32CD32">Annuncio rimosso dalla lista!</font></p>

                            <?
                            }

                            else
                            {
                                if(isset($_GET["rima"]) && ($_GET["rima"]=="err"))
                                {
                                ?>

                                <p><font color="B20000">Errore! Annuncio non rimosso correttamente.</font></p>

                                <?
                                }

                                else
                                {
                                    if(isset($_GET["rima"]) && ($_GET["rima"]=="errpres"))
                                    {
                                    ?>

                                    <p><font color="B20000">Errore! Annuncio non presente.</font></p>

                                    <?
                                    }
                                }
                            }



                            $queryvis2 = mysql_query("SELECT * FROM auto WHERE compratore IS NULL") or die("query non riuscita".mysql_error());

                            if(mysql_num_rows($queryvis2)==0)
                            {

                            ?>
                            <br><p>Nessun annuncio presente al momento. Riprova tra poco</p><br><br>
                            <?
                            }

                            while($row2 = mysql_fetch_object($queryvis2))
                            {
                            ?>
                                <br>

                                <table id="table-vis">
                                    <tr>
                                        <td><b><?echo"$row2->venditore";?></b></td>

                                        <td>Marca:</td>

                                        <td><?echo"$row2->marca";?></td>
                                    </tr>

                                    <tr>
                                        <td><?echo"$row2->prezzo";?> &euro;</td>

                                        <td>Modello:</td>

                                        <td><?echo"$row2->modello";?></td>
                                    </tr>

                                    <tr>
                                        <td><a href="Rimuovi.php?rimuovia=<?echo $row2->id?>" id="cestino">Rimuovi annuncio</a></td>

                                        <td>Anno:</td>

                                        <td><?echo"$row2->anno";?></td>
                                    </tr>
                                </table>

                                <br><br>

                            <?
                            }
                            ?>

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
    $pagina_redirect = "Amministratore/Gestisci.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
