<?php
include('conexao.php');

$not = $_REQUEST['not'];
$news = $_REQUEST['news'];

$query = "update tb_noticias_news set EXCLUIDA=1 where ID_NEWS = $news and ID_NOTICIA = $not ";

$bd = mysqli_query($conn, $query) or die($query);
 ?>
 <script>
    window.location.assign('index.php?modulo=alter_news.php&id=<?php echo $news; ?>');
 </script>
