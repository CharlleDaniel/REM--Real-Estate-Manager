<?php
require_once ("../model/DataBase.php");

session_start();

$pdo = Database::connect ();
$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

header('Content-type: application/json');
$json = file_get_contents('php://input');
$json_decode = json_decode($json, true);

$data =  array( );
$data = array(
    'tag' => 'erro',
    'msg' => 'Ops! Não cadastrou, preencha todos os campos com *',
    );

if($json_decode!=null){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(array_key_exists('name', $json_decode) && array_key_exists('cpf', $json_decode) && array_key_exists('phone', $json_decode) && array_key_exists('registry', $json_decode) && array_key_exists('password', $json_decode) && array_key_exists('email', $json_decode)){
            $sql = "INSERT INTO funcionarios (func_imob, func_nome, func_cpf, func_email) values (?,?,?,?)";
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $_SESSION['code'],
                $json_decode['name'],
                $json_decode['cpf'],
                $json_decode['email']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Cadastrado com sucesso', );
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if(array_key_exists('code', $json_decode) && array_key_exists('name', $json_decode) && array_key_exists('cpf', $json_decode) && array_key_exists('phone', $json_decode) && array_key_exists('registry', $json_decode) && array_key_exists('password', $json_decode) && array_key_exists('email', $json_decode)){
            $sql = "UPDATE funcionarios SET func_nome=?, func_cpf=?, func_email=? WHERE func_imob=?";
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $json_decode['name'],
                $json_decode['cpf'],
                $json_decode['email'],
                $json_decode['code']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Atualizado com sucesso', );
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(array_key_exists('code', $json_decode)){
            $sql = "DELETE FROM funcionarios WHERE func_imob=?";
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $json_decode['code']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Atualizado com sucesso', );
        }
    }
}

echo json_encode($data);