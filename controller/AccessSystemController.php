<?php
require_once ("../model/DataBase.php");
$pdo = Database::connect ();
$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

header('Content-type: application/json');
$json = file_get_contents('php://input');
$json_decode = json_decode($json, true);

$data =  array( );
$data = array(
    'tag' => 'erro',
    'msg' => 'Usuario ou senha incorretos',
    );

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($json_decode['user'] != null && $json_decode['password'] != null ){
        $sql = 'SELECT * FROM imobiliaria ORDER BY imob_id ASC';
        foreach ( $pdo->query ( $sql ) as $row ) {
            if ($row ['imob_username'] == $json_decode['user']) {
                if ($row ['imob_password'] == $json_decode['password']) {
                    if (! isset ( $_SESSION )){
                        session_start ();
                        
                        $_SESSION ['username'] = $row ['imob_username'];
                        $_SESSION ['type'] = $row ['imob_type'];
                        $_SESSION ['code'] = $row ['imob_real_estate'];
                        $_SESSION ['name'] = $row ['imob_name'];
                    }
                    $data = array(
                     'tag' => 'ok',
                     'msg' => 'Acesso Liberado', );
                }
            }
        }
    }

}

    

echo json_encode($data);
?>