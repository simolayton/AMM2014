<?php

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



$email=$_POST["emailok"];

$queryemail = mysql_query("SELECT email FROM users WHERE email='$email'") or die("Query non riuscita".mysql_error());

if(mysql_num_rows($queryemail)==0)
{
    echo json_encode("no");
}

else
{
    echo json_encode("yes");
}
?>
