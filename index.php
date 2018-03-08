<?php
require_once "vendor/autoload.php";

$estados = App\classes\Endereco::listEstados();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>J&amp;O Software</title>

  <!-- Bootstrap CSS-->
  <link href="src/css/bootstrap.min.css" rel="stylesheet">

  <!-- Selec2 CSS -->
  <link href="src/css/select2.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-2"> </div>

        <div class="col-md-8">
          <br/>
          <br/>
          <!-- Formulario -->
          <form method="post" id="valida">
            <div class="row">
              <div class="form-group col-md-4">
                <label for="nome">Nome completo</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
              </div>

              <div class="form-group col-md-8">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="exemplo@exemplo.com" required minlength="6">
                <small id="emailHelp" class="form-text text-muted">Entre com um email valido.</small>
              </div>
            </div>
            <!-- fim row2 -->


            <div class="row">
              <div class="form-group col-md-4">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(xxx) xxxxxxxxx" minlength="15">
              </div>

              <div class="form-group col-md-4">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" placeholder="(xxx) xxxxxxxxx" required minlength="15">
              </div>

              <div class="form-group col-md-4">
                <label>Deseja contato por Whatsapp:</label> <br/>
                <label class="radio-inline" for="sim">
                  <input type="radio" name="contatoWpp" id="sim" value="s">Sim
                </label>
                <label class="radio-inline">
                  <input type="radio" name="contatoWpp" id="nao" value="n">Não
                </label>
              </div>
            </div>
            <!-- fim row3 -->


            <div class="row">


              <div class="form-group col-md-4">
                <label for="estado">Estado</label>
                <select class="custom-select" name="estado" id="estado" required autocomplete="off">
                  <option value="false"></option>


                  <?php 
                  foreach($estados as $estado){ 
                    echo '<option value="'. $estado['Uf']. '">'.$estado['Nome'].'</option>' . PHP_EOL;
                  }
                  ?>




                </select>
              </div>


              <div class="form-group col-md-6" id="city">
                <label for="cidade">Cidade</label>
                <select class="custom-select" id="cidade" name="cidade" disabled></select>
              </div>



              <div class="form-group col-md-4"> </div>
            </div>
            <!-- fim row4 -->


            <div class="row">
              <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea class="form-control" id="mensagem" rows="3" name="mensagem" required minlength="6"></textarea>
              </div>
            </div>
            <!-- fim row5 -->
            <input type="submit" class="btn btn-primary">
          </form>


          <div id="msg">
            <!-- Aqui retorna a mensagem do ajax -->
          </div>

        </div>


        <div class="col-md-2"> </div>


      </div>
      <!-- fim row1 -->
    </div>
    <!-- JQuery -->
    <script src="src/js/jquery.min.js"></script> 
    <!-- JQuery MASK -->
    <script src="src/js/jquery.mask.min.js"></script>
    <!-- JQuery Validate -->
    <script src="src/js/jquery.validate.min.js"></script>
    <!-- JQuery Select2 -->
    <script src="src/js/select2.full.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="src/js/bootstrap.min.js"></script>
    <!-- Main JS -->
    <script src="src/js/main.js" type="text/javascript"></script>
  </body>
  </html>