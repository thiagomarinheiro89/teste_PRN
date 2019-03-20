<?php
include('conexao.php');

$id = $_REQUEST['id'];

$query1 = "SELECT Titulo FROM tb_newsletter where id_news = $id";
$bd = mysqli_query($conn, $query1);
$linhas = mysqli_fetch_all($bd);
foreach ($linhas as $linhas) {
  echo "<center><h1>Noticias associadas a newsletter: ".$linhas[0]."</h1></center>";
  echo "<hr>";
}

$query2 = "SELECT * FROM tb_noticias where ID_NOTICIAS IN (SELECT ID_NOTICIA FROM tb_noticias_news where id_news = $id and EXCLUIDA = 0)";
$bd = mysqli_query($conn, $query2) or die($query2);
$linhas = mysqli_fetch_all($bd);

$query3 = "SELECT * FROM tb_noticias where ID_NOTICIAS NOT IN (SELECT ID_NOTICIA FROM tb_noticias_news where id_news = $id and EXCLUIDA = 0)";
$bd = mysqli_query($conn, $query3) or die($query3);
$linhas2 = mysqli_fetch_all($bd);

IF(COUNT($linhas) == 0){
  echo "<div class='alert alert-danger'>";
  echo "Essa newsletter Ainda não possui Notícias associadas";
  echo "<div>";
} else {?>

<center><h1>Notícias da Newsletter</h1></center>
<table class='table table-striped' style="width: 60%; margin-left:20%">
  <thead>
    <tr>
      <th>Noticia
      <th>Titulo
      <th>Descriçãol
      <th>Ações
    </tr>
    <tbody>
      <?php

    foreach($linhas as $linhas){?>
        <tr>
          <td><?php echo $linhas[0]; ?>
          <td><?php echo $linhas[1]; ?>
          <td><?php echo $linhas[2]; ?>
          <td><a href='deleta_not_news.php?not=<?php echo $linhas[0]?>&news=<?php echo $id; ?>' class='btn btn-danger' alt='Remover da Newsletter' title='Remover da Newsletter'><span class='glyphicon glyphicon-remove'></span></a>
        </tr>
      <?php }?>
    </tbody>
  </table>

<?php } ?>

<hr>

<center><h1>Adicionar Notícias</h1></center>
<table class='table table-striped' style="width: 60%; margin-left:20%">
  <thead>
    <tr>
      <th>Noticia
      <th>Titulo
      <th>Descriçãol
      <th>Ações
    </tr>
    <tbody>
      <?php
      foreach($linhas2 as $linhas2){?>
        <tr>
          <td><?php echo $linhas2[0]; ?>
          <td><?php echo $linhas2[1]; ?>
          <td><?php echo $linhas2[2]; ?>
          <td><a href='add_not_news.php?not=<?php echo $linhas2[0]?>&news=<?php echo $id; ?>' class='btn btn-primary' alt='Adicionar a Newsletter' title='Adicionar a Newsletter'><span class='glyphicon glyphicon-plus'></span></a>
        </tr>
      <?php }?>
    </tbody>
  </table>
