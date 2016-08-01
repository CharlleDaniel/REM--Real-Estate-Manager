<?php
require_once ("../model/DataBase.php");
require_once("../model/Cliente.php");

session_start();

$pdo = Database::connect ();
$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

header('Content-type: application/json');
$json = file_get_contents('php://input');
$json_decode = json_decode($json, true);

$data =  array( );
$data = array(
    'tag' => 'erro',
    'msg' => 'Ops! Não cadastrou, preencha todos os campos com * ',
    );

if($json_decode!=null){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(array_key_exists('name', $json_decode) && array_key_exists('cpf', $json_decode) && array_key_exists('rg', $json_decode) && array_key_exists('address', $json_decode) ){
          
            $sql = "INSERT INTO clientes (cl_imob, cl_nome, cl_cpf, cl_rg, cl_endereco) values (?,?,?,?,?)";
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $_SESSION['code'],
                $json_decode['name'],                
                $json_decode['cpf'],
                $json_decode['rg'],
                $json_decode['address']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Cadastrado com sucesso', );
         
            
        }
    }

    else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if( array_key_exists('code', $json_decode) && array_key_exists('name', $json_decode) && array_key_exists('cpf', $json_decode) && array_key_exists('rg', $json_decode) && array_key_exists('address', $json_decode)){

            $sql = "UPDATE clientes SET cl_nome=?, cl_cpf=?, cl_rg=?, cl_endereco=? WHERE cl_id=".$json_decode['code'];
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $json_decode['name'],
                $json_decode['cpf'],
                $json_decode['rg'],
                $json_decode['address']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Atualizado com sucesso', );
        }
    }

    else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(array_key_exists('code', $json_decode)){
            $sql = "DELETE FROM clientes WHERE cl_id=".$json_decode['code'];
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $json_decode['code']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Deletado com sucesso', );
        }
    }   
}

//TODO Pensar em como entrar nesse método.
if($_SERVER['REQUEST_METHOD'] == 'GET' && array_key_exists('id', $_GET)){
    $id = $_GET['id'];

    $sql = "SELECT * FROM clientes WHERE cl_id=".$id;

    $cliente = null;
    foreach ( $pdo->query ( $sql ) as $row ) {
        $cliente = new Cliente($row['cl_id'], $row['cl_nome'], $row['cl_cpf'],  $row['cl_endereco']);
    }

    if($cliente != null){
        $data = array(
           'tag' => 'ok',   
           'result' => $cliente, );
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $result = array();
    $sql = "SELECT * FROM clientes WHERE cl_imob=".$_SESSION['code'];
    foreach ( $pdo->query ( $sql ) as $row ) {
        $cliente = new Cliente($row['cl_id'], $row['cl_nome'], $row['cl_cpf'], $row['cl_rg'],  $row['cl_endereco']);
        array_push($result, $cliente->getDataJSON());
    }

    $data = array(
           'tag' => 'ok',   
           'result' => $result, );

}

echo json_encode($data);