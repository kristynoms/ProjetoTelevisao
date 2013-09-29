<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
  <script>
  $(function() {
    $( "#dataExibicao" ).datepicker({
        dateFormat:'yy-mm-dd'
    });
  });
  </script>
<?php 
    include 'conexao.php';
    
 /* Emissoras */   
$sql = "select * from emissora";
$emisors = array();
$emissoras = mysql_query($sql);
 while($row = mysql_fetch_array($emissoras)) {
         $emisors[ ] = $row; 
   }

   /*Classificação etária*/
   $sql = "select * from classificacaoetaria";
   $cle = array();
   $ce = mysql_query($sql);
   while($row = mysql_fetch_array($ce)) {
       $cle[] = $row;
   }
   
   /*Genero*/
   $sql = "select * from genero";
   $g = array();
   $genero = mysql_query($sql);
   while($row = mysql_fetch_array($genero)) {
       $g[] = $row;
   }
   
    /*Tipo*/
   $sql = "select * from tipo";
   $t = array();
   $tipo = mysql_query($sql);
   while($row = mysql_fetch_array($tipo)) {
       $t[] = $row;
   }
   
   
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>

<body>
<form id="frm" action="cadastro.php" method="post">
<p><b> Cadastro de Programas </b></p>
<p>&nbsp;</p>
<table width="314" border="0" >
  <tr>
    <td width="83">Nome:</td>
    <td width="221"><input type="text" name="nome" id="nome" /></td>
  </tr>
  <tr>
    <td>Genero:</td>
    <td><label for="genero"></label>
      <select name="genero" id="genero">
          <?php foreach($g as $g) { ?>
         <option value="<?=$g['id']?>"><?=$g['nome']?></option>
          <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td>Sinopse:</td>
    <td><label for="sinopse"></label>
      <textarea name="sinopse" id="sinopse" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Classificação:</td>
    <td><label for="classifica"></label>
      <label for="classifica"></label>
      <select name="classifica" id="classifica">
        <?php foreach ($cle as $c) { ?>
        <option value="<?=$c['id']?>"><?=$c['nome']?></option>
        <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td>Emissora:</td>
    <td><label for="emissora"></label>
      <label for="emissora"></label>
      <select name="emissora" id="emissora">
          <?php foreach($emisors as $e) { ?>
        <option value="<?=$e['id']?>"><?=$e['nome']?></option>
          <?php } ?>
      </select></td>
  </tr>
  <tr>
    <td>Tipo:</td>
    <td><label for="tipo"></label>
      <label for="tipo"></label>
      <select name="tipo" id="tipo">
        <?php foreach ($t as $t) { ?>
        <option value="<?=$t['id']?>"><?=$t['nome']?></option>
        <?php } ?>
      </select></td>
  </tr>
    
     <tr>
    <td>Data da exibição:</td>
    <td><label for="programacao"></label>
      <label for="programacao"></label>
      <input type="text" name="dataExibicao" id="dataExibicao"/>
    </td>
  </tr>
    
   <tr>
    <td>Hora Exibição:</td>
    <td><label for="programacao"></label>
      <label for="programacao"></label>
      <input type="text" name="horaExibicao" id="horaExibicao"/>
    </td>
  </tr>
    
</table>

<p>
  <input type="submit" name="subimit" id="submit" value="Submit"  />
  <input type="reset" name="Cancel" id="Cancel" value="Cancel" />
</p>
</form>
    
</body>
</html>