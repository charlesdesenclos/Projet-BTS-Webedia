<?php 
        
      
        try 
    {
        $GLOBALS['bdd'] = new PDO("mysql:host=192.168.64.157;dbname=Webedia;charset=utf8", "user", "jGqOaSMyy927qO-a");

        
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
       

    
?>
