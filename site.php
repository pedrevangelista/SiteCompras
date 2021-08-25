<?php
include("partecima.php");
     ?>


<div> <img class="d-block w-100 blur" src="imagens/skate.png"> </div>

<div class="promo blur"> <b id="promo"> PROMOÇÔES</b></div>
<div style='position: relative'>
<?php
    //Na pagina principal a programação girou em torno de Carrosseis para o aparecimento de produtos em promoções que leva à pagina do produto.
    for ($a=1; $a<=3; $a++){
		echo "<div class='blur zoom' id='carouseldiv$a'>
<div class='carouselin'>
<div id='carouselExampleControls$a' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>";
 
 $ii = 0;
$sql = 'select grade.id_grade, produtos.nome, grade.id, grade.preco, grade.promocao from produtos inner join grade on produtos.Id = grade.id where grade.promocao > 0 group by id';
$result = mysqli_query ($connect, $sql);
$quantia = mysqli_num_rows($result);
        $quantia = $quantia /3;
        
        if ($a == 1){
    
for ($jj = 0; $jj < $quantia; $jj++){
$row = mysqli_fetch_array($result);
    $idGrade = $row['id_grade'];	
    $id1 = $row['id'];
	$nome = $row['nome'];
	$preco = $row ['preco'];	
    $desconto = $preco-($preco*$row['promocao'])/100;
	if ($ii == 0){
		echo '<div class="carousel-item active">';
	}
	else {
		echo '<div class="carousel-item">';
	}
    echo "<form method='get' action='pagprod.php'>";
    echo "<input type = 'image' name='produto' value='$idGrade' class='d-block w-100' src='prod/$idGrade.png'>"; 
		echo "<input type='hidden' name='p' value='$id1'>";
     echo '</form>'; 
  echo '<div class="carousel-caption d-none d-md-block">';
   echo "<h4>$nome</h4>";
   $preco1 = number_format($preco, 2, ',', ' ');
   $desconto1 = number_format($desconto, 2, ',', ' ');
    echo "<h5><strike>R$ $preco1 </strike> <br>R$ $desconto1 </h5>";

 echo '</div>';
 echo '</div>';
  
 $ii = $ii + 1;
}
      
}
        
        
        
    if ($a == 2){
for ($jj = 0; $jj < $quantia*2; $jj++){
	
$row['$jj'] = mysqli_fetch_array($result);
if ($jj >= $quantia){  
    $idGrade = $row['$jj']['id_grade'];	
    $id1 = $row['$jj']['id'];
	$nome = $row['$jj']['nome'];
	$preco = $row['$jj']['preco'];	
    $desconto = $preco-($preco*$row['$jj']['promocao'])/100;
	if ($ii == 0){
		echo '<div class="carousel-item active">';
	}
	else {
		echo '<div class="carousel-item">';
	}
    echo "<form method='get' action='pagprod.php'>";
    echo "<input type = 'image' name='produto' value='$idGrade' class='d-block w-100' src='prod/$idGrade.png'>"; 
		echo "<input type='hidden' name='p' value='$id1'>";
  echo '<div class="carousel-caption d-none d-md-block">';
   echo "<h4>$nome</h4>";
   $preco1 = number_format($preco, 2, ',', ' ');
   $desconto1 = number_format($desconto, 2, ',', ' ');
    echo "<h5><strike>R$ $preco1 </strike> <br> R$ $desconto1 </h5>";

 echo '</div>';
 echo '</div>';

 $ii = $ii + 1;
}
}
}
    
        

    if ($a == 3){
for ($jj = 0; $jj < $quantia*3; $jj++){
$row['$jj'] = mysqli_fetch_array($result);
if ($jj >= $quantia*2){
    $idGrade = $row['$jj']['id_grade'];	
    $id1 = $row['$jj']['id'];
	$nome = $row['$jj']['nome'];
	$preco = $row['$jj']['preco'];	
    $desconto = $preco-($preco*$row['$jj']['promocao'])/100;
	if ($ii == 0){
		echo '<div class="carousel-item active">';
	}
	else {
		echo '<div class="carousel-item">';
	}
    echo "<form method='get' action='pagprod.php'>";
    echo "<input type = 'image' name='produto' value='$idGrade' class='d-block w-100' src='prod/$idGrade.png'>"; 
		echo "<input type='hidden' name='p' value='$id1'>";
  echo '<div class="carousel-caption d-none d-md-block">';
   echo "<h4>$nome</h4>";
    $preco1 = number_format($preco, 2, ',', ' ');
   $desconto1 = number_format($desconto, 2, ',', ' ');
    echo "<h5><strike>R$ $preco1 </strike> <br> R$ $desconto1 </h5>";

 echo '</div>';
 echo '</div>';
 $ii = $ii + 1;
}
}
}

     echo "</div>
    <a class='carousel-control-prev btn-outline-light ' href='#carouselExampleControls$a' role='button' data-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
  </a>
  <a class='carousel-control-next btn-outline-light' href='#carouselExampleControls$a' role='button' data-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
  </a>
</div>
</div>
</div>";
    
    }
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
<script src="base.js"></script>	
	</body>
</html>