<?php

setcookie("redirect", null);

if($_COOKIE['tipo_utente']==3)
{
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

    mysql_query("SET AUTOCOMMIT=0");
    mysql_query("START TRANSACTION");

    $queryvis = mysql_query("SELECT * FROM carrello INNER JOIN auto ON carrello.id = auto.id WHERE incar ='".$_COOKIE["utente"]."'") or die("query non riuscita".mysql_error());

    $flag = 0;

    while($row = mysql_fetch_object($queryvis))
    {
        $querycom = "UPDATE utenti SET credito = credito - '".$row->prezzo ."' WHERE email='".$row->incar."'";

        $queryven = "UPDATE utenti SET credito = credito + '".$row->prezzo ."' WHERE email='".$row->venditore ."'";

        $queryaut = "UPDATE auto SET compratore = '".$row->incar."' WHERE id = '".$row->id ."'";

        $querycar = "DELETE FROM carrello WHERE '".$row->carrello.id ."' = '".$row->auto.id ."'";



        $result1 = mysql_query($querycom);

        $result2 = mysql_query($queryven);

        $result3 = mysql_query($queryaut);

        $result4 = mysql_query($querycar);



        if(($result1) && ($result2) && ($result3) && ($result4))
        {
            mysql_query("COMMIT");
        }

        else
        {
            mysql_query("ROLLBACK");

            $flag = 1;
        }
    }



    if($flag == 1)
    {
        die("Errore nella query: ".mysql_error());

        $pagina_login = "Carrello.php?acq=err";

        header("Location:".$pagina_login);
    }

    else
    {
        $pagina_login = "Carrello.php?acq=ok";

        header("Location:".$pagina_login);
    }
}

else
{
    $pagina_login = "../Login.php";
    $pagina_redirect = "Compratore/Carrello.php";

    setcookie("redirect", $pagina_redirect, time()+300);

	header("Location:".$pagina_login);
}
?>
