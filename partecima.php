<?php 
$connect = mysqli_connect('127.0.0.1','root','', 'sutileza'); 
session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
	echo'<style>
	#sair{
		display: none;
	}
	</style>';
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  $logado = '';  
  }
else {
	$email = $_SESSION['email'];
	$senha = $_SESSION['senha'];
	$res = mysqli_query($connect, "SELECT * FROM clientes where email = '$email' and senha = '$senha'");
	$usuario = mysqli_fetch_array($res);
	$logado = $usuario['nome'];
}  // Nesta parte ele verifica se a o login ou não.

?>
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	 <link href="./node_modules/mdi/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	 <link rel="stylesheet" href="./node_modules/animate.css/animate.min.css">
	<style type="text/css">
			@import url(base.css);
			
		</style>
	</head>
	
	<body id='body'>
	
	
	
<style> #caixalogin {display: none;} </style>

<nav class="navbar navbar-expand-md navbar-black bg-white navinin blur">
	<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
	<ul class="navbar-nav mx-auto order-0"> 
	
		<li class="nav-item"> 
			<a class="nav-link nav-linkin text-black" href="construcao/construcao.html">Quem somos</a>
		</li>
		<li class="nav-item"> 
			<a class="nav-link nav-linkin text-black" href="construcao/construcao.html">Atendimento</a>
		</li>
		<li class="nav-item "style='margin-left:20px;'> 
			<a class="nav-link nav-linkin text-black" href="construcao/construcao.html" style="margin-right:0;">FAQ</a>
		</li>
	</ul>
	</div>
</nav> 
        
<div id='coisa'>
<div id='sair'><form action="" method="post"><input type='submit'class='btn btn-danger sair btn btn-primary' name="btSair" value="sair"> </form></div>
<?php 
if(isset($_POST['btSair'])){
	unset($_SESSION['email']);
  unset($_SESSION['senha']);
  	echo'<style>
	#sair{
		display: none;
	}
	</style>';
	session_destroy();
	
	$logado="";
}
	  echo" Bem vindo $logado";
// Na parte superior foi feita  a barra de navegação e na parte inferior foi feito o botão de logout.

	  ?>

</div>
<div style='margin-bottom: 4%;'>
	<div class='blur' id=> <a href="site.php"> <img src="imagens/sitesutileza.png" id="logo"> </a> </div>  
         <form action='' method='post' id='form'>
	<div class='blur'id="t01"> <b id="searchid"> Pesquisar no site: </b>
        
        <input type="text" id="pesquisa" name='pesquisa' >
        <input type="image" name='entrar' value="submit" src="imagens/lupa.png" id="lupa" alt="submit Button" onMouseOver="this.src='imagens/lupa.png'">
        <?php
        if (isset($_POST['pesquisa'])){
        $pesquisa = $_POST['pesquisa'];
        $_SESSION['pesquisa'] = $pesquisa;
            if ($_POST){header ("location: resultados.php");}}
        // Aqui foi feita a parte de pesquisa no site
        ?>
             
        
        <a href="construcao/construcao.html "><img src="imagens/carrin.png" id="carrin"> </a>
             </div> </form></div>
	 <form action='' method='post' id='form'>
<div class="bg-dark blur" id="barraabas">
		<ul class="nav justify-content-center">
			<li class="nav-item aaaa">
				<button type='submit' name='calcados' value='Calcados' class="nav-link text-white-50  aaaaa" >Calcados</button>
			</li>
			<li class="nav-item aaaa" >
				<button type='submit' name='roupas' value='Roupas' class="nav-link text-white-50  aaaaa"  >Roupas</button>
			</li>
			<li class="nav-item aaaa">
				<button type='submit' name='acessorios' value='Acessorios' class="nav-link text-white-50 aaaaa "  >Acessorios</button>
			<li class="nav-item aaaa">
                <button type='button' class="nav-link text-white-50 addNewTask "> Login/Cadastre-se</button>
            </li>
            <li class="nav-item aaaa ">
                <button type='submit' name='conta' value='Minha conta' class="nav-link text-white-50 aaaaa "  >Minha conta </button>
                
            </li>
            <li class="nav-item aaaa">
                <button type='submit' name='site' value='Sites Parceiros' class="nav-link text-white-50 aaaaa "  >Sites parceiros </button>
				
            </li>
		</ul>
    </form>
</div>
        <?php
                if (isset($_POST['conta'])){
                    if ($_POST['conta']){
                if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
	header("location: paginacadastro.php"); 
  }
else {
	
	header("location: conta.php"); 
}  } }
        
        
        if (isset($_POST['calcados'])){
                    if ($_POST['calcados']){
                        header ("location: calcados.php");
                        exit();
                        }}
        
        if (isset($_POST['roupas'])){
                    if ($_POST['roupas']){
                        header ("location: roupas.php");
                        exit();
                        }}
        if (isset($_POST['acessorios'])){
                    if ($_POST['acessorios']){
                        header ("location: acessorios.php");
                        exit();
                        }}
        if (isset($_POST['parceiros'])){
                    if ($_POST['parceiros']){
                        header ("location: parceiros.php");
                        exit();
                        }}
        //Nesta area foi feita a barra de navegação inferior na qual consiste o metodo mais facil de navegar em meio ao site
                ?>
        <div class="addEventContainer w3-animate-zoom">
            <div class="addPanel ">
			<div class="row"><i class="mdi mdi-close-circle closePanel closebox"></i></div>
                <form action='' method='post'><div  style='margin-top: -3%;'> <label style='margin-left:-11%;'>
                    usuario: </label> <input type='text' name='email' style="margin-left: -11%;" class='form-control'> <br><br>
<label style='margin-left:-11%;'> senha:</label> <input type='password' style="margin-left: -11%;" name='senha' class='form-control' width='30%' > <br> <br>
                    <input type="image" name='entrar' value="submit" src="imagens/ilogin.png" width='10%' height= '18%' style='margin-left: 49%;margin-top: 0%;' alt="submit Button" onMouseOver="this.src='imagens/ilogin.png'"> </form> </div>
<?php
    include 'base.php';
    login(); 
                //aqui foram usadas funçoes de Java Script para aparecer a tela de login
?><form method= 'post' action='paginacadastro.php'>
<input type='image' name= 'cadastro' src="imagens/botaoCadastro.png" width='23%' height= '17%' style='margin-left: 10%; margin-top: -14%;'>
                    <?php
                    ?>
                </form></div>  </div>