
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Votação</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
<img src="img/logo.png" alt="SENAI FIEMG" class="img-responsive">
 <div class="page-header">
  <h1 style="text-align:center">Mundo SENAI 2019</h1>
 </div>
 <h2>Sistema de votação</h2>
  <p>Selecione o grupo desejado:</p>   

  <?php
    // Conectando no banco
    $pdo = new PDO('mysql:host=localhost;dbname=db_enquete',"root","");

    //Buscando dados no banco
    $sql = "select * from tb_candidatos";

    echo "<table class='table table-responsive table-hover'>";
      echo "<thead>";
      echo"<tr>";
      echo "<th>Código</th>";
      echo "<th>Tema</th>";
      echo "<th>Líder</th>";
      echo "<th>E-mail</th>";
      echo "<th>Pontos</th>";
      echo "<th>Votar</th>";
      echo"</tr>";
      echo "</thead>";

      echo"<tbody>";
        foreach($pdo->query($sql) as $row )
        {
          echo "<tr>";  
          echo "<td>".$row["id_candidatos"]."</td>";
          echo "<td>".$row["tema"]."</td>";
          echo "<td>".$row["lider"]."</td>";
          echo "<td>".$row["email"]."</td>";
          echo "<td>".$row["votos"]."</td>";
          echo "<td>";
            echo "<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Votar</button>";         
          echo "</td>";
          echo "</tr>";
        }


      echo"</tbody>";
    echo "</table>";
// Encerrando a conexão - Falar sobre o pool de conexão
$pdo = null;
?>  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <form method="POST" action="voto.php">  <!-- acrescentei um forms tentando atualizar tabela -->
            <input type="submit">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          </form>
          <h4 class="modal-title">Obrigado!</h4>
        </div>
        <div class="modal-body">
          <p>Seu voto é muito importante.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>
