<?php
include("partecima.php");
   




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
<div class='promo blur' > <b id='promo'> Bem vindo <?php echo $nome ?> </b></div>    
        
       <div class='blur' style='position: relative'> <table width = '20%' style='float: left;margin-left: 25%; ' class=" tabelaconta table-borderless">
  <tbody>
      <tr> <td colspan=2 align='center' id=titletd> Dados Cliente </td>
    <tr>
      <td >CPF</td>
      <td><?php echo $cpf?> </td>

    </tr>
    <tr >
      <td>sexo</td>
      <td><?php echo $sexo?></td>
    </tr>
    <tr>
      <td >telefone</td>
      <td><?php echo $telefone?></td>
    </tr>
    <tr>
      <td>celular</td>
      <td><?php echo $celular?></td>
    </tr>
    <tr>
      <td>email</td>
      <td><?php echo $email?></td>
    </tr>
    <tr>
      <td >senha</td>
      <td><?php echo $senha?></td>
    </tr>
      <tr>
      <td>cidade</td>
      <td><?php echo $cidade?></td>
    </tr>
    <tr>
      <td>cep</td>
      <td><?php echo $cep?></td>
    </tr>
    <tr>
      <td >estado</td>
      <td><?php echo $estado?></td>
    </tr>
    <tr>
      <td >endereço</td>
      <td><?php echo $endereco?></td>
    </tr>
  </tbody>
</table>
           <div style='float: left; margin-top: 23%; margin-left: -13%;'><a class="btn btn-dark btn btn-primary" href="alterardados.php" role="button">Alterar Dados</a> </div>
        
        <table width = '20%' style='margin-left: 55%;' class=" tabelaconta table-borderless">
            <?php 
            $result1 = mysqli_query ($connect, "select vendas.id_grade, grade.preco, produtos.nome from vendas inner join grade on vendas.id_grade = grade.id_grade inner join produtos on grade.id = produtos.id where vendas.cpf='$cpf'");
    echo "<tr> <td colspan=2 align='center' id=titletd> Compras Efetuadas</td> </tr>";
        while ($row1 = mysqli_fetch_array($result1)){
            $preco = $row1['preco'];
            $preco = number_format($preco, 2);
            echo "<tr> <td>". $row1['nome']." </td> <td>". $preco." </td></tr>";
        } //Tabela de dados do usuario e de ccmpras efetuadas
            ?>
           </table></div>

<footer class="blur page-footer font-small bg-dark">

  <!-- Copyright -->
  <div style='margin-top: 30%;' class="footer-copyright text-center py-3">© 2018 Copyright:
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