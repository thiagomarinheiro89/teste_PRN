<?php
include('conexao.php');

$news = $_GET['id'];

$select = "SELECT * FROM tb_newsletter where id_news=$news";

$bd = mysqli_query($conn, $select);

$linhas = mysqli_fetch_all($bd);

foreach ($linhas as $linhas) {
  $assunto = $linhas[2];
}


$select = "SELECT * FROM tb_noticias WHERE ID_NOTICIAS IN (SELECT ID_NOTICIA FROM tb_noticias_news WHERE ID_NEWS = $news AND EXCLUIDA = 0)";


$bd = mysqli_query($conn, $select) or die($select);

$linhas = mysqli_fetch_all($bd);

$corpo = '';

foreach ($linhas as $linhas) {
  $corpo .= $linhas[1]."<br>";
  $corpo .= $linhas[2]."<br>";
  $corpo .= "Link: <a href='".$linhas[4]."'>".$linhas[4]."</a><hr>";
}


  $emailenviar = " michael.regis@prnewswire.com.br";
  $destino = $emailenviar;


      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= 'From: $nome <$email>';


  $enviaremail = mail($destino, $assunto, $corpo, $headers);

  if($enviaremail){
    echo " <div class='alert alert-info'>";
    echo " Newsletter disparada com sucesso";
    echo " </div>";
  } else {
    echo " <div class='alert alert-danger'>";
    echo " Não foi possível enviar a Newsletter por favor tente novamnete";
    echo " </div>";
  }
?>
