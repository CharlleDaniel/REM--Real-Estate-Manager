<?php
if (!isset ( $_SESSION )) {
  session_start ();
  if($_SESSION!=null){
    if ($_SESSION ['type'] == 'administrador' or $_SESSION ['type'] == 'funcionario') {
   
      header ( "Location:  ./" );

    }else{
      session_destroy();

      exit();
    }
  }
  
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REM | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="view/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="view/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="loginForm.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="hold-transition login-page" style="background-color: #fff" ng-app="formsApp">
  <div class="login-box"  >

    <div class="login-logo">
      <img src="view/images/indice.png" width="100%">
    </div><!-- /.login-logo -->

    <div class="login-box-body" ng-controller="FormsController">

      <span id="message"></span>
      <form  method="post" class="my-form" novalidate>

        <div class="form-group has-feedback">
          <input type="email" class="form-control" id="campo1"  placeholder="Email" ng-model="user.user">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="campo2"  placeholder="Senha" ng-model="user.password" ng-minlength="6">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>

                <input type="checkbox"> Lembrar Dados

              </label>
            </div>
          </div><!-- /.col -->
          <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Entrar" ng-click="entrar()" >
          </div><!-- /.col --> 
        </div>
      </form>

      <table>
        <tr>
          <td>
            <a href="#">Esqueci minha senha</a><br>
          </td>
          <td>
            <!-- <a href="register.html" class="text-center">Registrar-se</a>     -->
          </td>
        </tr> 
      </table>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.4 -->
  <script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="view/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="view/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
increaseArea: '20%' // optional
});
    });
  </script>
  <script type="text/javascript"> 
    $(document).ready(function(){
      /* ao pressionar uma tecla em um campo que seja de class="form-control" */ 
      $('.form-control').keypress(function(e){ 
        var tecla = (e.keyCode?e.keyCode:e.which); 
        /* verifica se a tecla pressionada foi o ENTER */ 
        if(tecla == 13){ 
          /* guarda o seletor do campo que foi pressionado Enter */ 
          campo = $('.form-control'); 
          /* pega o indice do elemento*/ 
          indice = campo.index(this); 
          /*soma mais um ao indice e verifica se não é null *se não for é porque existe outro elemento */ 
          if(indice< 1){
            /* adiciona mais 1 no valor do indice */
            proximo = campo[indice + 1]; /* passa o foco para o proximo elemento */ 
            proximo.focus();
            return false;   
          }
          
        }else{
          return true;
        }

      }) })
    </script>

    <script src="bower_components/angular/angular.js" charset="utf-8"></script>
    <script src="loginForm.js" charset="utf-8"></script>

  </body>
  </html>
