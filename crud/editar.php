<?php 
   ini_set("display_errors",1);
   ini_set("display_startup_erros",1);
   error_reporting(E_ALL);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <?php

    include 'config.php';

    if(!isset($_POST["atualizar"]))
    {
      
      $id=$_GET["id"];
      $nome=$_GET["nome"];
      $apelido=$_GET["apelido"];
      $endereco=$_GET["endereco"];
    }
    else 
    {
        $id=$_POST["id"];
        $nome=$_POST["nome"];
        $apelido=$_POST["apelido"];
        $endereco=$_POST["endereco"];

        $sql="UPDATE crud SET nome=:nome, apelido=:apelido, endereco=:endereco WHERE id=:myid";

        $resultado=$base->prepare($sql);

        $resultado->execute(array(":myid"=>$id,":nome"=>$nome,":apelido"=>$apelido,":endereco"=>$endereco));

        header("Location:index.php");
    }  

  ?>

<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF'];   ?>">

  <table width="45%" border="1" align="center">

    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td><label for="nome"></label>
      <input type="text" name="nome" id="nome" value="<?php echo $nome ?>"></td>
    </tr>
    <tr>
      <td>Apelido</td>
      <td><label for="apelido"></label>
      <input type="text" name="apelido" id="apelido" value="<?php echo $apelido ?>"></td>
    </tr>
    <tr>
      <td>Endereço</td>
      <td><label for="endereco"></label>
      <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="atualizar" id="atualizar" value="Atualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>


</body>
</html>