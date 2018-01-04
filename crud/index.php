<?php 
   ini_set("display_errors",1);
   ini_set("display_startup_erros",1);
   error_reporting(E_ALL);
?>
<?php
   
   include 'config.php';

   //$coneccao=$base->query("SELECT * FROM crud");

   //$registro=$coneccao->fetchAll(PDO::FETCH_OBG);

   $registro=$base->query("SELECT * FROM crud")->fetchAll(PDO::FETCH_OBJ);


   if(isset($_POST["cr"]))
   {
     $nome=$_POST["nome"];
     $apelido=$_POST["apelido"];
     $endereco=$_POST["endereco"];

     $sql = "INSERT INTO crud (nome, apelido, endereco) VALUES (:nome, :apelido, :endereco)";

     $resultado=$base->prepare($sql);

     $resultado->execute(array(":nome"=>$nome,":apelido"=>$apelido,":endereco"=>$endereco));

     header("Location:index.php");


   }

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"> 
  <div class="container">
  	 <div class="crud">
  	 	<label>Nome:</label>
  	 	<input type="text" name="nome" placeholder="Nome">
  	 	<label>Apelido:</label>
  	 	<input type="text" name="apelido" placeholder="Apelido">
  	 	<label>Endereço:</label>
  	 	<input type="text" name="endereco" placeholder="Endereço">

  	 	<div class="b">
                     
  	 	    <input type="submit" name="cr" id="cr" value="Inserir">	 

  	  </div>		

  	 </div>	
  </div>
</form>

 <div class="table"> 
  <table width="40%" border="0" align="center">
    <tr>
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nome</td>
      <td class="primera_fila">Apelido</td>
      <td class="primera_fila">Endereco</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
 
 <?php

   foreach ($registro as $pessoa) :

 ?>
 
  <tr>
      <td><?php echo $pessoa->id?></td>
      <td><?php echo $pessoa->nome?></td>
      <td><?php echo $pessoa->apelido?></td>
      <td><?php echo $pessoa->endereco?></td>


      <td><a href="deletar.php?id=<?php echo $pessoa->id?>"><input type="button" name="del" id="del" value="Deletar"></a>
      </td>


      <td><a href="editar.php?id=<?php echo $pessoa->id?> & nome=<?php echo $pessoa->nome?> & apelido=<?php echo $pessoa->apelido?> & endereco=<?php echo $pessoa->endereco ?>"><input type="button" name="up" id="up" value="Atualizar"></a></td> 

  </tr>

  <?php
    
    endforeach;

  ?>
 
</table>	

</div>


</body>
</html>