<?php
include('conexao.php');

$titulo = $_REQUEST['titulo'];

$query = "INSERT INTO tb_newsletter (DATA_CRIACAO, TITULO, ATIVA) VALUES (NOW(), '$titulo', 1)";

$bd = mysqli_query($conn, $query);
 ?>
 <script>
    window.location.assign('index.php?modulo=news.php');
 </script>
