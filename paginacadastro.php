<html>
<head>
<link rel="stilesheet" type="text/css" href="bunidimais.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

<body>
<script>
<?php

?>
var select = document.getElementById("estados");
var cidade = document.getElementById("cidade");
var cidades = {
  "São Paulo": ["São Paulo", "Itápolis", "Araraquara", "Ribeirão Preto", "Jacareí"],
  "Rio de Janeiro": ["Rio de Janeiro", "Niteroi", "Petropolis", "Belford Roxo", "Nova Iguaçu"]
};

function adicionarOptions(select, options, chosen) {
  while (select.children.length > 0) {
    // esvaziar o select
    select.removeChild(select.firstChild);
  }
  for (var i = 0; i < options.length; i++) {
    var opt = options[i];
    var el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select.appendChild(el);
  }
  // Juntei um 3o argumento para selecionar alguma option. 
  // Se não houver o select inicia sem pré-seleção
  select.value = chosen || '';
}

var estados = Object.keys(cidades);
adicionarOptions(select, estados, estados[0]);
select.addEventListener('change', function() {
  adicionarOptions(cidade, cidades[this.value])
})
</script>
    
        <div  style="margin-left: 85%; position: absolute; margin-top: 2%;">
        <img src="imagens/sitesutileza.png" style="width: 200px;
    height: 100px;">
    </div>
       <form action='' method = 'post' style="margin-left: 3%; position: absolute; margin-top: 3%; width: 95%;">
  
           <label>    
               <h1>Cadastro:</h1>
           </label>

           
           <div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name = "nome" placeholder="Insira seu nome">
  </div>
  
        <div class="form-group">
    <label>CPF</label>
    <input type = "text" name = "cpf" class="form-control" placeholder="Insira seu CPF (apenas numeros)">
  </div>
  
        
    <label> Sexo:  </label> <br>
    <div class="form-check">
  <input class="form-check-input" type="radio" name='sexo' value="f" checked>
  <label class="form-check-label">
Feminino  
</label>
</div>
        
         <div class="form-check">
  <input class="form-check-input" type="radio" name='sexo' value="m" checked>
  <label class="form-check-label">
Masculino  
</label>
</div>
        
      <div class="form-check">
  <input class="form-check-input" type="radio" name='sexo' value="u" checked>
  <label class="form-check-label">
Outro  
</label>
</div>  
        
        
<div class="form-group">
    <label>Telefone</label>
    <input type = "text" name = "telefone" class="form-control" placeholder="Insira seu telefone">
  </div>
        
        <div class="form-group">
    <label>Celular</label>
    <input type = "text" name = "celular" class="form-control" placeholder="Insira seu celular">
  </div>
        
        <div class="form-group">
    <label>E-mail</label>
    <input type = "text" name = "email" class="form-control" placeholder="Insira seu e-mail">
  </div>
        
        <div class="form-group">
    <label>Senha</label>
    <input type = "password" name = "senha" class="form-control" placeholder="Insira a senha desejada">
  </div>
        
         <div class="form-group">
    <label>Confirmar senha</label>
    <input type = "password" name = "csenha" class="form-control" placeholder="Repita a senha desejada">
  </div>
      
        <label>Estado</label>
        <select class="form-control" name="estado" id ="estados">
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
    <input type = "text" name = "cidade" id = "cidade" class="form-control" placeholder="Insira a sua cidade">
  </div>
        
         <div class="form-group">
    <label>CEP</label>
    <input type = "text" name = "cep" class="form-control" placeholder="Insira o CEP do seu endereço">
  </div>
   
        <div class="form-group">
    <label>Endereço</label>
    <input type = "text" name = "endereco" class="form-control" placeholder="Insira o seu endereço">
  </div>
        
  <button type="submit" class="btn btn-primary" name="cadastro">Cadastrar</button>
</form>

    <script type="text/javaScript">
   $(document).ready(function(){
            $('#pEst').change(function(){
                $.get('<c:url value="/imovel/carregaCidadesPorEstado/"/>' + this.value, function(resposta){
                    popularCidades(resposta); 
                });
            });
        })
        function popularCidades(resposta){
            var str = "";
            for (var i = 0; i < resposta.length; i++){  
                str = str + '<option value="'+resposta[i].codigo+'">'+resposta[i].descricao+'</option>';  
            }     
            $('#pCid').html(str);  
        }
    </script>
	
<?php
  include'base.php';
if(isset($_POST['cadastro'])){  
  if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['sexo']) && ( !empty($_POST['telefone']) || !empty($_POST['celular']) ) && !empty($_POST['email']) && 
  !empty($_POST['senha']) && !empty($_POST['csenha']) && !empty($_POST['estado']) && !empty($_POST['cidade']) && !empty($_POST['cep']) && !empty($_POST['endereco']) ){
    if (validarCep($_POST['cep'])){	
	  if (verificar_email($_POST['email'])){
	  
	    if(validaCPF($_POST['cpf']) == 0){ 
	     
		   if ($_POST['senha'] == $_POST['csenha']){
		      $nome = $_POST['nome'];
		      $cpf = $_POST['cpf'];
		      $sexo = $_POST['sexo'];
		      $telefone = $_POST['telefone'];
		      $celular = $_POST['celular'];
		      $email = $_POST['email'];
		      $senha = $_POST['senha'];
		      $estado = $_POST['estado'];
		      $cidade = $_POST['cidade'];
		      $cep = $_POST['cep'];
		      $endereco = $_POST['endereco'];
		      $connect = mysqli_connect('127.0.0.1','root','', 'sutileza');
		      $sql = "INSERT INTO clientes values ('$cpf', '$nome', '$sexo', '$telefone', '$celular', '$email', '$senha', '$cidade', '$cep', '$estado', '$endereco')";
		 
		      if(mysqli_query($connect, $sql)){
		         $_SESSION['email'] = $email;
		         $_SESSION['senha'] = $senha;
		  
		         header("Location:site.php");}
		     
			  else{
			     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		      }
	       }
	   
	       else{
		     echo "<p> Confirmação de senha errada </p>";
	       }   
        }
	  
	    else if (validaCPF($_POST['cpf']) == 1){
		    echo "<p> CPF inválido </p>";
	    }
		else if (validaCPF($_POST['cpf']) == 2){
		    echo "<p> CPF já cadastrado </p>";
	    }
     }
   
     else{
	     echo "<p> Email inválido </p>";
     }
	}
	else {
		echo "<p> CEP inválido <p>";
	}
 } else {
	 echo "Por favor, preencha todos os campos";
 }
}
?>
</body>
</html>