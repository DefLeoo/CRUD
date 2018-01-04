<?php
  
  try
    {
	   
	    $base=new PDO("mysql:host=localhost;dbname=curso1","root","senha");

	    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $base->exec("SET CHARACTER SET utf8");
    
    } catch(Exception $e)
    {
       die("Error:" . $e->getMessage());
    }

?>