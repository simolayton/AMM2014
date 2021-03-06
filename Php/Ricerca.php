<!DOCTYPE html>



<?php

setcookie("redirect", null);

if(!isset($_COOKIE["tipo_utente"]))
{
?>



<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Trudu Gabriele 47801"/>
        <meta name="description" content="Sito di compravendita auto usate"/>

        <title>Affari a 4 ruote - Progetto AMM 2013-2014</title>

        <link rel="shortcut icon" type="image/x-icon" href="../Immagini/favicon.ico"/>
        <link rel="Stylesheet" type="text/css" href="../Css/style.css" media="screen"/>
    </head>



    <body>
        <div id="page">
            <div id="header">
                <div id="logo">
                    <img src="../Immagini/logo.png" alt="Logo" usemap="#logo_home"/>

                    <map name="logo_home">
                        <area shape="circle" coords="75,75,75" href="Home.php" alt="Home">
                    </map>

                    <p>Progetto di AMM 2013-2014</p>

                    <div id="benvenuto">
                        <span id="login">
                            <a href="Login.php">Login</a>
                        </span>
                    </div>
                </div>

                <div id="menu">
                    <ul>
                        <li><a href="Home.php" id="home">Home</a></li>
                        <li><a href="Chi_siamo.php" id="chi_siamo">Chi siamo</a></li>
                        <li><a href="Istruzioni.php" id="istruzioni">Istruzioni</a></li>
                        <li class="current_page"><a href="#" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

            <div id="content">
                <table id="table-content">
                    <tr>
                        <td id="left"></td>

                        <td id="center">
                            <h1 id="h1-cerca">Ricerca</h1>

                            <p>Inserisci uno o pi&ugrave; filtri per effettuare la ricerca:</p>

                            <form action="Home.php?ricerca=ok" method="post" id="form-login">
                                <table id="table-form">
                                    <tr>
                                        <td>Marca:</td>

                                        <td><input type="text" name="marca" placeholder="Tutto"/></td>
                                    </tr>

                                    <tr>
                                        <td>Modello:</td>

                                        <td><input type="text" name="modello" placeholder="Tutto"/></td>
                                    </tr>

                                    <tr>
                                        <td>Anno:</td>

                                        <td><input type="number" name="anno" min="1930" max="2015" placeholder="Da"/></td>
                                    </tr>

                                    <tr>
                                        <td>Alimentazione:</td>

                                        <td>
                                            <input type="radio" name="alimentazione" value="Benzina" checked/>Benzina
                                            <input type="radio" name="alimentazione" value="Diesel"/>Diesel
                                            <input type="radio" name="alimentazione" value="Gas"/>Gas
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Prezzo:</td>

                                        <td><input type="number" name="prezzo" min="0" placeholder="Fino a"/></td>
                                    </tr>

                                    <tr>
                                        <td>Chilometri:</td>

                                        <td><input type="number" name="chilometri" min="0" placeholder="Fino a"/></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Cerca" id="tasto-login"/><td>
                                    </tr>
                                </table>
                            </form>
                        </td>

                        <td id="right"></td>
                    </tr>
                </table>
            </div>

            <div id="footer">
                <p>Copyright &copy; 2014 - Affari a 4 ruote. Tutti i diritti riservati.</p>

                <p>
                    <a href="http://validator.w3.org/check/referer">
                        <img style="border:0;width:88px;height:31px" src="../Immagini/html5.png" alt="HTML Valido!" />
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
    $pagina_login = "Logout.php";
    $pagina_redirect = "Ricerca.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
