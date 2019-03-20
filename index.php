<?php
$modulo = isset($_GET['modulo'])?$_GET['modulo']:'';

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

  <h1>Bem vindo ao Sistema de Gerenciamento de NewsLetter</h1>

<hr>

  <a href='?modulo=noticias.php' class='btn btn-primary'>
      <h2 class='glyphicon glyphicon-asterisk'></h2><br>
      Gerenciar Notícias
  </a>
&nbsp;&nbsp;
  <a href='?modulo=news.php' class='btn btn-primary'>
      <h2 class='glyphicon glyphicon-pencil'></h2><br>
      Gerenciar NewsLetter
  </a>


<hr>

  <div id='modulo'>
    <?php if($modulo !=''){
      include($modulo);
    }else{
      echo "<div class='alert alert-info'>
                Selecione uma função
            </div>";
    }?>
  </div>

</div>
</body>
</html>
