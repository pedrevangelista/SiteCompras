<?php
include("partecima.php");
     ?>


    <h1 align='center'> Resultados com: <?php $pesquisa = $_SESSION['pesquisa']; echo $pesquisa; ?> </h1>
    <div id='calcados' align='center'>
<?php

$connect = mysqli_connect('127.0.0.1','root','', 'sutileza');
$sql = "select produtos.id, grade.id_grade, produtos.nome, grade.preco from produtos inner join grade on produtos.Id = grade.id where produtos.Nome LIKE '%$pesquisa%' or produtos.Descricao LIKE '%$pesquisa%'group by produtos.id";
$result = mysqli_query ($connect, $sql); ?>
<table width="80%" border=0> <tr>
		<?php
   if (mysqli_num_rows($result) == 0){
       echo "<h1> Sem resultados encontrados</h1>";
}else{ 
		for ($i = 0;$i < 4; $i ++){ 
while ($row = mysqli_fetch_array($result)){
    echo '<td align="center">';
	echo "<form method='get' action='pagprod.php'>";
    $id = $row['id']; 
    $id_grade = $row['id_grade'];
	echo $row['nome'],'<br>';
	echo 'R$', $row['preco'],'<br>';
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
	//selects para a amostra de resultados de acordo com a pesquisa do cliente
}}
           
			 
?>
            </tr>
        </table>
    </div>
        



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="base.js"></script>	
	</body>
</html>