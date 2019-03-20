<?php
include('conexao.php');

$not = $_REQUEST['not'];
$news = $_REQUEST['news'];

$query = "INSERT INTO tb_noticias_news (ID_NEWS, ID_NOTICIA, EXCLUIDA) VALUES ($news, $not, 0)";

$bd = mysqli_query($conn, $query);
 ?>
 <script>
    window.location.assign('index.php?modulo=alter_news.php&id=<?php echo $news; ?>');
 </script>
