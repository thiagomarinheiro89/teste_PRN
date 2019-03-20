<?php
  include('conexao.php');

  $query = "SELECT n.ID_NEWS, N.DATA_CRIACAO, N.TITULO,
            (SELECT COUNT(DISTINCT(ID_NOTICIA)) FROM tb_noticias_news as nn WHERE nn.ID_NEWS=n.id_news AND EXCLUIDA = 0) AS NOTICIAS
            from tb_newsletter as n
            where ativa=1
            order by data_criacao";

  $bd = mysqli_query($conn, $query);

  $linhas = mysqli_fetch_all($bd);
 ?>

<center><h2>Gerenciar Newslette</h2>
<a href='#' onclick="mostrar_form()" class='btn btn-primary'>
  Cadastrar Newsletter
</a>
</center>
<center>
<div class='add' style='display: none; width:30%; margin-top: 40px;'>

<form action='add_news.php' method="post">
  <b>Titulo da Newsletter</b>
  <input type='text' name='titulo' class='form-control' required>
  <input type='submit' value='Cadastrar' class='btn btn-primary btn-block'>
</form>
</center>
</div>
</center>

<table class='table table-striped' style='width: 40%; margin-left:30%; margin-top: 50px;'>
  <thead>
    <th>#
    <th>Data de Cadastro
    <th>Titulo
    <th>Notícias Associadas
    <th>Ações
  </thead>
  <tbody>
    <?php foreach ($linhas as $linhas){
      echo "<tr>
             <td>".$linhas[0]."
             <td ALIGN='CENTER'>".date('d/m/Y', strtotime($linhas[1]))."
             <td>".$linhas[2]."
             <td ALIGN='CENTER'>".$linhas[3]."
             <td><A HREF='deleta_news.php?id=".$linhas[0]."' class='btn btn-danger' alt='deletar Newsletter' title='deletar Newsletter'><span class='glyphicon glyphicon-remove'></span></a>
                 <A HREF='index.php?modulo=alter_news.php&id=".$linhas[0]."' class='btn btn-primary' alt='Alterar Newsletter' title='Alterar Newsletter'><span class='glyphicon glyphicon-pencil'></span></a>
                 <A HREF='#' onclick=envia('".$linhas[3]."','".$linhas[0]."') class='btn btn-warning' alt='Disparar Newsletter' title='Disparar Newsletter'><span class='glyphicon glyphicon-envelope'></span></a>
            </tr>";

    } ?>
  </tbody>
</table>
<?php
if (count($linhas)==0) {
  echo "<div class='alert alert-danger' style='width: 40%; margin-left:30%; margin-top: 20px;'>";
  echo "Você ainda não possuí Newsletter cadastradas";
  echo "</div>";
}

 ?>



<script>
function mostrar_form(){
  $(".add").show(300);
}
function envia(a1, a2){
  if (a1==0) {
      alert('Essa Newsletter não tem noticias associadas');
  } else{
    window.location.assign("index.php?modulo=envia_news.php&id="+a2);
  }
}

</script>
