<?php
include("partecima.php");
     ?>
    <div class='blur' id='title' align='center'> Acessórios </div>
    <div id='calcados' align='center'>
	
<?php
$sql = "select produtos.id, grade.id_grade, produtos.nome, grade.preco from produtos inner join grade on produtos.Id = grade.id where produtos.Nome LIKE '%Meia%' or produtos.Nome LIKE '%relógio%' or produtos.Nome LIKE '%pulseira%' or produtos.Nome LIKE '%colar%' or produtos.Nome LIKE '%boné%' or produtos.Nome LIKE '%mochila%' or produtos.Descricao LIKE '%Meia%' or produtos.Descricao LIKE '%relógio%' or produtos.Descricao LIKE '%pulseira%' or produtos.Descricao LIKE '%colar%' or produtos.Descricao LIKE '%boné%' or produtos.Descricao LIKE '%mochila%' group by produtos.id";
$result = mysqli_query ($connect, $sql);?>
        
        <table class='blur' width="80%" border=0> <tr>
		<?php
		for ($i = 0;$i < 4; $i ++){ 
while ($row = mysqli_fetch_array($result)){
    echo '<td align="center">';
	echo "<form method='get' action='pagprod.php'>";
    $id = $row['id']; 
    $id_grade = $row['id_grade'];
	echo $row['nome'],'<br>';
	$preco=$row['preco'];
	$preco = number_format($preco, 2, ',', ' ');
	echo "R$ $preco  <br>";
    echo "<input type = 'image' name='produto' value='$id'  width='65%' src='prod/$id_grade.png'>"; 
		echo "<input type='hidden' name='p' value='$id'>";	
    echo '</td>';
    $i = $i + 1;
        if ($i >= 3){
            echo '</tr> <tr>';
            $i = 0;
		}
		echo "</form>";
    }
	
}
           
	//Mostra dos produtos da area de Acessorios em forma de tabela contendo no maximo 3 produtos em cada linha		 
?>
            </tr>
        </table>
    </div>
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