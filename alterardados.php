<?php
include ("partecima.php");
        $connect = mysqli_connect('127.0.0.1','root','', 'sutileza');
$result = mysqli_query ($connect, "select * from clientes where nome='$logado'");
        $row = mysqli_fetch_array($result);
        $cpf = $row['cpf'];
        $nome = $row['nome'];
        $sexo = $row['sexo'];
        $telefone = $row['telefone'];
        $celular = $row['celular'];
        $email = $row['email'];
        $senha = $row['senha'];
        $cidade = $row['cidade'];
        $cep = trim($row['cep']);
        $estado = $row['estado'];
        $endereco = $row['endereco'];

?>
<html>
<head>
<link rel="stilesheet" type="text/css" href="bunidimais.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

<body><div style="margin-left: 3%; position: absolute; margin-top: 3%; width: 95%";>
       <form method = 'post'>
  
           <label>    
               <h1>Alteração de dados:</h1>
           </label>

<div class="form-group">
    <label>Telefone novo</label>
    <input type = "text" name = "telefone" class="form-control" value= "<?php echo $telefone?>">
  </div>
        
        <div class="form-group">
    <label>Celular novo</label>
    <input type = "text" name = "celular" class="form-control" value= "<?php echo $celular?>">
  </div>
        
        <div class="form-group">
    <label>Novo E-mail</label>
    <input type = "text" name = "email" class="form-control" value= "<?php echo $email?>">
  </div>
        
        <div class="form-group">
    <label>Nova Senha</label>
    <input type = "password" name = "senha" class="form-control" value= "<?php echo $senha?>">
  </div>
        
         <div class="form-group">
    <label>Confirmar nova senha</label>
    <input type = "password" name = "csenha" class="form-control" value= "<?php echo $senha?>">
  </div>
      
        <label>Estado</label>
        <select class="form-control" name="estado" id ="estados" value = "<?php echo $estado ?>">
            <option>AC</option>
            <option>AL</option>
            <option>AP</option>
            <option>AM</option>
            <option>BA</option>
            <option>CE</option>
            <option>DF</option>
            <option>ES</option>
            <option>GO</option>
            <option>MA</option>
            <option>MT</option>
            <option>MS</option>
            <option>MG</option>
            <option>PA</option>
            <option>PB</option>
            <option>PR</option>
            <option>PE</option>
            <option>PI</option>
            <option>RJ</option>
            <option>RN</option>
            <option>RS</option>
            <option>RO</option>
            <option>RR</option>
            <option>SC</option>
            <option>SP</option>
            <option>SE</option>
            <option>TO</option>
        </select> 
        
        <div class="form-group">
    <label>Cidade</label>
    <input type = "text" name = "cidade" id = "cidade" class="form-control" value= "<?php echo $cidade ?>"  >
  </div>
        
         <div class="form-group">
    <label>CEP</label>
    <input type = "text" name = "cep" class="form-control" value= "<?php echo $cep?>">
  </div>
   
        <div class="form-group">
    <label>Endereço</label>
    <input type = "text" name = "endereco" class="form-control" value= "<?php echo $endereco?>">
  </div>
        
  <button type="submit" class="btn btn-primary" name="alterar">Alterar</button>
</form>

	
<?php
    if (isset($_POST['alterar'])){
	   if (isset($_POST['senha']) and isset($_POST['csenha'])){
          if ($_POST['senha'] == $_POST['csenha']){
		      $telefone = $_POST['telefone'];
		      $celular = $_POST['celular'];
		      $email = $_POST['email'];
		      $senha = $_POST['senha'];
		      $estado = $_POST['estado'];
		      $cidade = $_POST['cidade'];
		      $cep = $_POST['cep'];
		      $endereco = $_POST['endereco'];
		      $connect = mysqli_connect('127.0.0.1','root','', 'sutileza');
		      $sql = "Update clientes set telefone='$telefone', celular='$celular', email='$email', senha='$senha', cidade='$cidade', cep='$cep', estado='$estado', endereco='$endereco' where cpf='$cpf'";
              mysqli_query($connect, $sql);
          }
	       else{
		     echo "<p> Confirmação de senha errada </p>";
	       }   

       }
    }
    
           
    ?></div>
</body>
</html>