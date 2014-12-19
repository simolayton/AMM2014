<!DOCTYPE html>



<?php

if(isset($_COOKIE['tipo_utente']) && $_COOKIE['tipo_utente']==1)
{
?>



<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="AMM esami docente" />
        <meta name="description" content="Una pagina per gestire le funzioni dei docenti" />

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
			<li class="current_page"><a href="#" id="utenti">Utenti</a></li>
                        <li><a href="Gestisci.php" id="gestisci">Gestisci</a></li>
                        <li><a href="Ricerca.php" id="ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>

	    <div id="content">
		<table id="table-content">
		    <tr>
			<td id="left"></td>

			<td id="center">
			    <h1 id="h1-utenti">Utenti</h1>
			</td>

			<td id="right"></td>
		    </tr>
		</table>

            </div>


            <div id="footer">
                <p>Copyright &copy; 2014 - Affari a 4 ruote. Tutti i diritti riservati.</p>

                <p>
                    <a href="http://validator.w3.org/check/referer">
                    <img style="border:0;width:88px;height:31px" src="http://www.ruvzke.sk/sites/default/files/images/w3c-html5-big.png" alt="HTML Valido!" />
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
    $pagina_login="../Login.php";

	header("Location:".$pagina_login);
}
?>
