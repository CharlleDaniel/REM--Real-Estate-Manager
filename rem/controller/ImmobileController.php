<?php
require_once ("../model/DataBase.php");
require_once("../model/Imovel.php");

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
        if(array_key_exists('immobile', $json_decode) && array_key_exists('address', $json_decode) && array_key_exists('owner', $json_decode)){
            $sql = "INSERT INTO imoveis (imo_imob, imo_nome, imo_endereco, imo_proprietario, imo_descricao, imo_valor_aluguel, imo_valor_avaliado) values (?,?,?,?,?,?,?)";
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $_SESSION['code'],
                strtoupper($json_decode['immobile']),
                 strtoupper($json_decode['address']),
                $json_decode['owner'],
                $json_decode['description'],
                $json_decode['rentValue'],
                $json_decode['valuedValue']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Cadastrado com sucesso', );
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        
        if(array_key_exists('immobile', $json_decode) && array_key_exists('address', $json_decode) && array_key_exists('owner', $json_decode) && array_key_exists('id', $json_decode) && array_key_exists('description', $json_decode) && array_key_exists('rentValue', $json_decode) && array_key_exists('valuedValue', $json_decode)){
            
            $sql = "UPDATE imoveis SET imo_nome=?, imo_endereco=?, imo_proprietario=?, imo_descricao=?, imo_valor_aluguel=?, imo_valor_avaliado=? WHERE imo_id=?";
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $json_decode['immobile'],
                $json_decode['address'],
                $json_decode['owner'],
                $json_decode['description'],
                $json_decode['rentValue'],
                $json_decode['valuedValue'],
                $json_decode['id']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Atualizado com sucesso', );
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(array_key_exists('id', $json_decode)){
            $sql = "DELETE FROM imoveis WHERE imo_id=? and imo_imob=".$_SESSION['code'];
            $q = $pdo->prepare ( $sql );
            $q->execute ( array (
                $json_decode['id']
                ) );
           $data = array(
             'tag' => 'ok',   
             'msg' => 'Deletado com sucesso', );
        }

    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET' && array_key_exists('page', $_GET)){
    $result = array();
    $page = $_GET['page'];
    $qntItemsPerPage = 15;


    $sql = "SELECT * FROM imoveis WHERE imo_imob=".$_SESSION['code'];
    foreach ( $pdo->query ( $sql ) as $row ) {
        $imovel = new Imovel($row['imo_id'], strtoupper($row['imo_nome']),strtoupper($row['imo_endereco']), $row['imo_valor_avaliado'], $row['imo_valor_aluguel'],  $row['imo_proprietario'], $row ['imo_descricao']);
        array_push($result, $imovel->getDataJSON());
    }

    $totalImoveis = count($result);
    $qtdPages = ceil(($totalImoveis/$qntItemsPerPage));

    //Inicial and Final indexes from the page elements
    $startIndex = ($page - 1) * $qntItemsPerPage;

    $itens = array_slice($result, $startIndex, $qntItemsPerPage );
     

    $data = array(
           'tag' => 'ok',
           'qtdPages' => $qtdPages,
           'result' => $itens, );
}

else if($_SERVER['REQUEST_METHOD'] == 'GET'&& array_key_exists('id', $_GET)){
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM imoveis WHERE imo_id=".$id;
        
    foreach ( $pdo->query ( $sql ) as $row ) {
        $imovel = new Imovel($row['imo_id'], strtoupper($row['imo_nome']),strtoupper($row['imo_endereco']), $row['imo_valor_avaliado'], $row['imo_valor_aluguel'],  $row['imo_proprietario'], $row ['imo_descricao']);
        $data = array(
           'tag' => 'ok',
           'result' => $imovel->getDataJSON(), );
    } 
}
else if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $result = array();

    $sql = "SELECT * FROM imoveis WHERE imo_imob=".$_SESSION['code'];
    foreach ( $pdo->query ( $sql ) as $row ) {
        $imovel = new Imovel($row['imo_id'],strtoupper($row['imo_nome']),strtoupper($row['imo_endereco']), $row['imo_valor_avaliado'], $row['imo_valor_aluguel'],  $row['imo_proprietario'], $row ['imo_descricao']);
        array_push($result, $imovel->getDataJSON());
    }

    $data = array(
           'tag' => 'ok',
           'result' => $result, );
}

echo json_encode($data);