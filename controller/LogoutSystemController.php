<?php

header('Content-type: application/json');
$json = file_get_contents('php://input');
$json_decode = json_decode($json, true);

$data =  array( );
$data = array(
    'tag' => 'erro',
    'msg' => 'Não foi possivel fazer o logout.',
    );

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    session_destroy();
    $data = array(
    'tag' => 'ok',
    'msg' => 'logout',
    );
       

}

    

echo json_encode($data);
?>