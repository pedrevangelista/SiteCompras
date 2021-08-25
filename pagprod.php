<?php
include("partecima.php");

		$id = $_GET['p'];
		$aa = mysqli_query ($connect, "select * from produtos where Id=$id");
		$result = mysqli_query ($connect, "SELECT * from grade inner join produtos where produtos.id=$id and grade.id=$id");
		$row = mysqli_fetch_array($aa);
		$nome = $row['Nome'];
		$descricao = $row['Descricao'];
		
		
        echo "<div class='promo blur' margin-top: 2%;> <b id='promo'> $nome  </b></div> "; 
        // Aqui é feita a identificação do produto que foi escolhido
        
		?>
        <div class='blur' style="	float: left;
		width: 35%;
	height: 17.5%;
	margin-left: 20%;">
            <div class='carouselin'>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
     <div class="carousel-inner">
    
        <?php
    $ii = 0;
    $corCarousel = '';
	$result = mysqli_query ($connect, "SELECT id_grade from grade where id=$id group by cor");
    
	while($row = mysqli_fetch_array($result)){
         $idGrade = $row['id_grade'];			 
        
	     if ($ii == 0){
		    echo '<div class="carousel-item active">';
	     }
	     else {
		    echo '<div class="carousel-item">';
	     }
         echo "<img class='d-block w-100' src='prod/$idGrade.png'> </div>";
        $ii = $ii + 1;
    }
         //Aqui foi feito um carousel com as imagens do produto e suas variações de cores
        ?>
         </div>  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
        
               
        <div id="desc" style='float: left; margin-left: 60%; margin-top: -9%;'><h2> Descrição: </h2><br> <?php echo $descricao; ?> <br><br>

		<form method='post'>
		<div>
		
        <?php
            $ii = 0;
            
		$result = mysqli_query ($connect, "SELECT * from grade where id=$id group by cor");
        echo '<h3> Cor:  </h3>';  
        
		while($row = mysqli_fetch_array($result)){
            $cor = $row['cor'];
            
               echo "<input style='display: inline;' class='btn btn-dark ' type = 'submit' name = 'cor' value = '$cor'></input> ";
            $ii++;
		}
		  
            if (isset($_POST["cor"])){
              $corz = $_POST["cor"];
			  $_SESSION['cor'] = $corz;
            }
		?>
		</form>
		<form method = 'post' >
		<br><br><div><h3>Tamanho:<h3>
			
		  <?php
		  if (isset($corz)) $result = mysqli_query($connect, "SELECT * FROM grade WHERE cor='$corz' and id=$id order by cor");
		  $i=0;
		  
		  while($row = mysqli_fetch_array($result)){		   
			    $tamanho = $row['tamanho'];
				echo "<div class='custom-control custom-radio custom-control-inline'>";
				
				if ($row['quantidade'] != 0)  echo "<input class='custom-control-input' type='radio' name='tamanho'  id='customRadioInline$i' value='$tamanho'> <label class='custom-control-label' for='customRadioInline$i' >$tamanho</label>";
				else echo "<input class='custom-control-input' type='radio' name='tamanho' id='customRadioInline$i' value='$tamanho' disabled> <label class='custom-control-label' for='customRadioInline$i' >$tamanho (indisponível)</label>";	
				echo"</div>";
				
				$i++;
		   }
		?></div>
          <br> <br> <h3> Preço: <?php  
                if (isset($corz)){
             $result = mysqli_query($connect, "SELECT * FROM grade where id=$id and cor='$corz'");
		     $row = mysqli_fetch_array($result);
             $preco = $row['preco'];		 
             $promocao = $row['promocao'];
             $preco = $preco-($preco*$promocao/100);
			 $preco = number_format($preco, 2, ',', ' ');
			 echo "R$$preco";
			 }
                //aqui pegamos a cor do produto desejado e mostramos quais tamanhos disponiveis para ele
            ?> </h3>
		</div>
		 <br><br><input class="btn btn-success btn-lg" type = 'submit' name = 'comprar' value = 'comprar'></input>
        </form>	
	
		<?php
		 if(isset($email)){
		  if (isset($_POST['comprar'])){	  
           if (isset($_SESSION['cor'])){
			   if(!empty($_POST['tamanho'])){
				   $cor = $_SESSION['cor'];
				   $tamanho = $_POST['tamanho'];
				   $result = mysqli_query($connect, "SELECT * FROM grade WHERE id=$id and tamanho='$tamanho' and cor='$cor' and quantidade!=0");
					  $row = mysqli_fetch_array($result);
				  if($idGrade = $row['id_grade']){
                      $cpf = $usuario['cpf'];
                      $data = date('Y-m-d');
                      $preco = $row['preco']-($row['preco']*$row['promocao']/100);					  
				      $res = mysqli_query($connect, "INSERT into vendas (`id_grade`, `cpf`,`data_compra`, `preco`,`enviado`) values ($idGrade,'$cpf','$data',$preco,'n')");
                      $sq2l= mysqli_query ($connect, "update grade set quantidade=quantidade-1 where id_grade=$idGrade");
                      $_SESSION['preco'] = $preco;
                          echo"<h4><font color = 'green'><script language='javascript' type='text/javascript'>alert('Compra Realizada');window.location.href='boleto.php';</script>/font></h4>";
				  }
				  else echo "<h4><font color = 'red'>Produto indisponível no momento :/</font></h4>";
			   }
			   else
				   echo"<h4><font color = 'red'>Por favor, escolha o tamanho do produto</font></h4>";			   
		   }
		   else
			   echo "<h4><font color='red'>Por Favor, escolha a cor do produto</font></h4>";		   
		  }
		 }
		 else
			 echo "<h4><font color='red'>Faça o Login para realizar a compra</font><h4>"
		 //Aqui foi feita a programação para a compra do produto
		?>
            </div>
            </div>
            
        
<footer class="blur page-footer font-small bg-dark" style='margin-top: 60%;'>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" >© 2018 Copyright:
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