<!DOCTYPE html>



<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="AMM esami docente" />
        <meta name="description" content="Una pagina per gestire le funzioni dei docenti" />

        <title>Affari a 4 ruote - Progetto AMM 2013-2014</title>

        <link rel="shortcut icon" type="image/x-icon" href="../../Immagini/favicon.ico"/>
        <link rel="Stylesheet" type="text/css" href="../../Css/style.css" media="screen"/>
    </head>

<?php

if($_SESSION["logged"]==1)
{
echo "

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
                        <li class="current_page"><a href="#" id="home" alt="Home">Home</a></li>
			<li><a href="Utenti.html" id="utenti" alt="Utenti">Utenti</a></li>
                        <li><a href="Gestisci.html" id="gestisci" alt="Gestisci">Gestisci</a></li>
                        <li><a href="Ricerca.html" id="ricerca" alt="Ricerca">Ricerca</a></li>
                    </ul>
                </div>
            </div>	    

	    <div id="content">
		<table id="table-content">
		    <tr>
			<td id="left"></td>

			<td id="center">
			    <h1 id="h1-home">Home</h1>
			</td>

			<td id="right"></td>
		    </tr>
		</table>
		
            </div>


            <div id="footer">
                <p>Copyright &copy 2014 - Affari a 4 ruote. Tutti i diritti riservati.</p>

                <p>
                    <a href="http://validator.w3.org/check/referer" alt="HTML valido">
                    <img style="border:0;width:88px;height:31px" src="http://www.w3c.it/events/2012/html5day/html5-logo.png" alt="HTML Valido!" />
                    </a>

                    <a href="http://jigsaw.w3.org/css-validator/check/referer" alt="CSS valido">
                    <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valido!" />
                    </a>
                </p>

            </div>
        </div>
    </body>";

</html>