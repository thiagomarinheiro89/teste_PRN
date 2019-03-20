<?php
//include('conexao.php');
 ?>

<html>
<head>
  <title>PRNewswire</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
    //link das noticias
    $request = "http://prncloud.com/xml/rss_generico.php?clienteNews=277&paisNews=8";

    //Retorna xml em forma de um array
    $noticias = simplexml_load_file($request) -> channel;
?>

<div style='width: 50%; margin-left: 25%; margin-top: 30px;'>

<?php
    //Realizo o looping dentro da tag Item da variavel $noticias
    foreach($noticias -> item as $item){
          $titulo = $item -> title;
          $descricao = $item -> description;
          $categoria = $item -> category;
          $link = $item -> link;


          /*$insert = "INSERT INTO tb_noticias (TITLE, DESCRICAO, CATEGORIA, LINK) VALUES
                      ('$titulo','$descricao','$categoria','$link')";
          $bd = mysqli_query($conn, $insert) or die($insert);*/

      ?>
      <div class="panel panel-Primary">
          <div class="panel-heading"><b>Titulo da Notícia: </b><?php echo $titulo ?> </div>
          <div class="panel-body">
            <b>Descrição: </b> <?php echo $descricao; ?> <br><br>
            <b>Link: </b> <a href='<?php echo $link; ?>' target="_blank"><?php echo $link; ?></a> <br>
            <b>Categoria: <?php echo $categoria;?>
          </div>
      </div>
    <?php } ?>

</div>
</body>
</html>
