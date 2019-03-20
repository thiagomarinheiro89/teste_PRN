<?php
include('conexao.php');

$id = $_REQUEST['id'];

$query = "update tb_newsletter set ativa = 0 where ID_NEWS = $id";


$bd = mysqli_query($conn, $query) or die('deu ruim');
 ?>
 <script>
    window.location.assign('index.php?modulo=news.php');
 </script>
