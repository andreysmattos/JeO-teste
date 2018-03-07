<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>J&amp;O Software</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
              </div>

              <div class="form-group col-md-8">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo.com">
                <small id="emailHelp" class="form-text text-muted">Entre com um email valido.</small>
              </div>
            </div>
            <!-- fim row2 -->


            <div class="row">
                <div class="form-group col-md-4">
                  <label for="telefone">Telefone</label>
                  <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(xxx) xxxxxxxxx">
                </div>

                <div class="form-group col-md-4">
                  <label for="celular">Celular</label>
                  <input type="text" class="form-control" id="celular" name="celular" placeholder="(xxx) xxxxxxxxx">
                </div>

                <div class="form-group col-md-4">
                  <label>Deseja contato por Whatsapp:</label> <br/>
                  <label class="radio-inline" for="sim">
                    <input type="radio" name="contatoWpp" id="sim" value="1">Sim
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="contatoWpp" id="nao" value="0">Não
                  </label>
                </div>
            </div>
            <!-- fim row3 -->


            <div class="row">


              <div class="form-group col-md-4">
                  <label for="estado">Estado</label>
                  <select class="custom-select" name="estado" id="estado">
                    <option>Estado</option>
                    <option>Rio Grande do Sul</option>
                    <option>São Paulo</option>
                    <option>Santa Catarina</option>
                  </select>
                </div>


                <div class="form-group col-md-4">
                  <label for="cidade">Cidade</label>
                  <select class="custom-select" id="cidade" name="cidade">
                    <option>Cidade</option>
                    <option>Novo Hamburgo</option>
                    <option>São Leopoldo</option>
                    <option>Porto Alegre</option>
                  </select>
                </div>

        

                <div class="form-group col-md-4"> </div>
            </div>
            <!-- fim row4 -->


          <div class="row">
            <div class="form-group">
              <label for="mensagem">Mensagem</label>
              <textarea class="form-control" id="mensagem" rows="3" name="mensagem"></textarea>
            </div>
          </div>
        <!-- fim row5 -->
        <input type="submit" class="btn btn-primary">
          </form>

        </div>


        <div class="col-md-2"> </div>


      </div>
       <!-- fim row1 -->
    </div>
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Main JS -->
    <script src="js/main.js" type="text/javascript"></script>
  </body>
</html>