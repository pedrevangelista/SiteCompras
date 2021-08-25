<?php 
function login(){
	
 if(isset($_POST['email']) && isset($_POST['senha'])){ 
  
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $connect = mysqli_connect('127.0.0.1','root','', 'sutileza');
             
      $verifica = mysqli_query($connect,"SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'") or die("erro ao selecionar");
        
		$rows = mysqli_num_rows($verifica);
		if ($rows !=0){
        $_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
            header('Location: '.$_SERVER['PHP_SELF']);
            die;
        }else{
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
          echo"<script language='javascript' type='text/javascript'>alert('email e/ou senha incorretos');window.location.href='site.php';</script>";
          die();
            //Funcao de verificação de login
}
 }
}
function validaCPF($cpf) {

	// Verifica se um número foi informado
	if(empty($cpf)) {
		return 1;
	}

	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return 1;
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return 1;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return 1;
			}
		}
	  
	    $connect = mysqli_connect('127.0.0.1','root','', 'sutileza');           
        $verifica = mysqli_query($connect,"SELECT cpf FROM clientes WHERE cpf LIKE '$cpf'") or die("erro ao selecionar");
	    $rows = mysqli_num_rows($verifica);
	  
        if($rows==0){
		  return 0;}
		else{
			return 2;
			echo "<p>Esse CPF já está cadastrado<p>";
            //verificação de validação de cpf
		}  
	}
}

function verificar_email($email){ 
   $mail_correcto = false; 
   //verifico umas coisas 
   if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
      if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
         //vejo se tem caracter . 
         if (substr_count($email,".")>= 1){ 
            //obtenho a terminação do dominio 
            $term_dom = substr(strrchr ($email, '.'),1); 
            //verifico que a terminação do dominio seja correcta 
         if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
            //verifico que o de antes do dominio seja correcto 
            $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
            $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
            if ($caracter_ult != "@" && $caracter_ult != "."){ 
               $mail_correcto = true; 
                //verificação de email
            } 
         } 
      } 
   } 
} 

if ($mail_correcto) 
   return true; 
else 
   return false; 
}

function validarCep($cep) {
    // retira espacos em branco
    $cep = trim($cep);
    // expressao regular para avaliar o cep
    $avaliaCep = preg_match("^[0-9]{5}-[0-9]{3}$^", $cep);
    
    // verifica o resultado
    if(!$avaliaCep) {            
        return false;
    }
    else
    {	     
        return true;
    }
    //verificação de email
}
?>
