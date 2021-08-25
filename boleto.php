<?php
include "partecima.php";
// Aqui foi pego o preco para a codificação correta do boleto que consiste em 10 ultimos numeros sendo o preco e o restante em "0".
$preco = $_SESSION['preco'];
$preco = number_format($preco, 2);
$resto = 11 - strlen($preco);
$preco = str_replace('.','',$preco);
   echo "<br><div id='textoo'> O boleto da sua compra ja esta pronto! </div>";
   echo "<div id='textoo'> Pague já com o codigo de barras </div>";
   echo "<br>   <div class='botaore'> <form method='post'> <input type='submit' class='btn btn-dark btn btn-primary' name='revelar' value='revelar'> </form>  </div>";
if (isset($_POST['revelar'])){
    echo "<style> #codigoboleto{
    display: inline!important;
    text-align: center!important;
    color:#343a40;  
    font-size: 40px;
    font-family:'Oswald', sans-serif;
    }
        </style>";
}
   echo "<div id = 'codigoboleto' style='display: none;margin-left: 25%;'> 25401.67841.55848.996711 70154.335501 7 8955";
while ($resto!=0){ 
echo "0";
       $resto = $resto-1;
}echo "$preco </div>";
?>
<footer class="blur page-footer font-small bg-dark">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
<p> Pedro Lucas <br>Lucas Khaled<br>Nathan Parreiras </p>
  </div>
  <!-- Copyright -->

</footer>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="base.js"></script>		</body>
</html>