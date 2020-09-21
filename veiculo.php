<?php
require_once('include/mysqli_connect.php');
header('content-type:application/json');

$actionName =  $_GET["actionName"];

///http://127.0.0.1/crud-rest-api/veiculo.php?actionName=selectPost
if($actionName == "selectPost"){
    $seachKey = isset($_GET["id"]) ? $_GET["id"] : '';
 
    if(!empty($seachKey))
        $query = "SELECT * FROM veiculo where id ={$seachKey}";
    else
        $query = "SELECT * FROM veiculo ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    $rowCount = mysqli_num_rows($result);

    if($rowCount > 0){
        $postData = array();
        while($row = mysqli_fetch_assoc($result)){
            $postData[] = $row;
        }
        $resultData = array('status' => true, 'postData' => $postData);
    }else{
        $resultData = array('status' => false, 'message' => 'No Post(s) Found (tabela vaiza)...');
    }

    echo json_encode($resultData);
}

//http://127.0.0.1/crud-rest-api/veiculo.php?actionName=insertPost&placa=PWE-0128&modelo=FIA&ano=1990&cor=azul%20marinho&balance=40&statusAluguel=1
if($actionName == "insertPost"){

    $placa   = isset($_GET["placa"]) ? $_GET["placa"] : '';
    $model    = isset($_GET["modelo"]) ? $_GET["modelo"] : '';
    $ano      = isset($_GET["ano"]) ? $_GET["ano"] : '';
    $cor      = isset($_GET["cor"]) ? $_GET["cor"] : '';
    $postPreco  = isset($_GET["balance"]) ? $_GET["balance"] : '';
    $status     = isset($_GET["statusAluguel"]) ? $_GET["statusAluguel"] : '';
    $postStatus =  date('Y-m-d H:i:s');;

    if(!empty($placa) && !empty($model) && !empty($ano) && !empty($cor)  && !empty($postPreco)  && !empty($status)  && !empty($postStatus) ){
        $query = "INSERT INTO veiculo (placa, modelo, ano, cor, balance, statusAluguel, created)
         VALUES('$placa', '$model','$ano','$cor',$postPreco,'$status','$postStatus')";
       //  die($query );
        $result = mysqli_query($con, $query);
        if($result){
            $resultData = array('status' => true, 'message' => 'New Post Inserted Successfully...');
        }else{
            $resultData = array('status' => false, 'message' => 'Can\'t able to insert new post...');
        }
    }else{
        $resultData = array('status' => false, 'message' => '(insert)Please enter post details...');
    }

    echo json_encode($resultData);
}

//http://127.0.0.1/crud-rest-api/veiculo.php?actionName=updatePost&placa=PWE-0128&modelo=FIA&ano=1990&cor=azul%20marinho&balance=40&statusAluguel=1&id=68
if($actionName == "updatePost"){

    $postId = isset($_GET["id"]) ? $_GET["id"] : '';
    $placa = isset($_GET["placa"]) ? $_GET["placa"] : '';
    $model    = isset($_GET["modelo"]) ? $_GET["modelo"] : '';
    $ano      = isset($_GET["ano"]) ? $_GET["ano"] : '';
    $cor      = isset($_GET["cor"]) ? $_GET["cor"] : '';
    $postPreco  = isset($_GET["balance"]) ? $_GET["balance"] : '';
    $status   = isset($_GET["statusAluguel"]) ? $_GET["statusAluguel"] : '';
    
    if(!empty($placa) && !empty($model)  && !empty($ano) && !empty($cor)  && !empty($postPreco)  && !empty($status) ){
        $query = "UPDATE veiculo SET placa='$placa', modelo='$model', ano ='$ano' , cor ='$cor', balance ='$postPreco', statusAluguel ='$status' WHERE id=$postId";
   
        $result = mysqli_query($con, $query);
        if($result){
            $resultData = array('status' => true, 'message' => 'Post Updated Successfully...');
        }else{
            $resultData = array('status' => false, 'message' => 'Can\'t able to update a post details...');
        }
    }else{
        $resultData = array('status' => false, 'message' => '(update)Please enter post details...');
    }

    echo json_encode($resultData);
}

//http://127.0.0.1/crud-rest-api/veiculo.php?actionName=deletePost&id=67
if($actionName == "deletePost"){

    $postId   = isset($_GET["id"]) ? $_GET["id"] : '';
    
    if(!empty($postId)){
        $query = "DELETE FROM veiculo WHERE id=$postId";
        $result = mysqli_query($con, $query);
        if($result){
            $resultData = array('status' => true, 'message' => 'Post Deleted Successfully...');
        }else{
            $resultData = array('status' => false, 'message' => 'Can\'t able to delete a post details...');
        }
    }
    else{
        $resultData = array('status' => false, 'message' => 'Please enter post details...');
    }

    echo json_encode($resultData);
}

?>
