<?php
require_once('include/mysqli_connect.php');
header('content-type:application/json');

$actionName =  $_GET["actionName"];

if($actionName == "selectPost"){
    $seachKey = isset($_GET["id"]) ? $_GET["id"] : '';
 
    if(!empty($seachKey))
        $query = "SELECT * FROM  locacao where id ={$seachKey}";
    else
        $query = "SELECT * FROM  locacao ORDER BY id DESC";
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

//http://127.0.0.1/crud-rest-api/locacao.php?actionName=insertPost&codigo=234&cpfCliente=9987878847&dataTermino=2020-11-12&precoTotal=30.00&placaVeiculo=POA9782&statusLocacao=1&dataInicio=2020-10-05
if($actionName == "insertPost"){

    $postCode  = isset($_GET["codigo"]) ? $_GET["codigo"] : '';
    $postCpf   = isset($_GET["cpfCliente"]) ? $_GET["cpfCliente"] : '';
    $postIni   = isset($_GET["dataInicio"]) ? $_GET["dataInicio"] : '';
    $postFim  = isset($_GET["dataTermino"]) ? $_GET["dataTermino"] : '';
    $postPreco = isset($_GET["precoTotal"]) ? $_GET["precoTotal"] : '';
    $postPlac  = isset($_GET["placaVeiculo"]) ? $_GET["placaVeiculo"] : '';
    $postStatus= isset($_GET["statusLocacao"]) ? $_GET["statusLocacao"] : '';

    if(!empty($postCode) && !empty($postCpf) && !empty($postIni) && !empty($postFim)  && !empty($postPreco)  && !empty($postPlac)  && !empty($postStatus) ){
        $query = "INSERT INTO locacao (codigo, cpfCliente, dataInicio, dataTermino, precoTotal, placaVeiculo, statusLocacao) VALUES('$postCode', '$postCpf','$postIni','$postFim',$postPreco,'$postPlac',$postStatus)";
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

//http://127.0.0.1/test/crud-rest-api/locacao.php?actionName=updatePost&codigo=323223&cpfCliente=999787878847&dataTermino=2020-11-12&precoTotal=50.00&placaVeiculo=POA9782&statusLocacao=1&dataInicio=2020-10-05&id=67
if($actionName == "updatePost"){

    $postId    = isset($_GET["id"]) ? $_GET["id"] : '';
    $postCode  = isset($_GET["codigo"]) ? $_GET["codigo"] : '';
    $postCpf   = isset($_GET["cpfCliente"]) ? $_GET["cpfCliente"] : '';
    $postIni   = isset($_GET["dataInicio"]) ? $_GET["dataInicio"] : '';
    $postFim   = isset($_GET["dataTermino"]) ? $_GET["dataTermino"] : '';
    $postPreco = isset($_GET["precoTotal"]) ? $_GET["precoTotal"] : '';
    $postPlac  = isset($_GET["placaVeiculo"]) ? $_GET["placaVeiculo"] : '';
    $postStatus= isset($_GET["statusLocacao"]) ? $_GET["statusLocacao"] : '';    
    
    if(!empty($postCode) && !empty($postCpf)  && !empty($postIni) && !empty($postFim)  && !empty($postPreco)  && !empty($postPlac)  && !empty($postStatus) ){
        $query = "UPDATE  locacao SET codigo='$postCode', cpfCliente='$postCpf', dataInicio ='$postIni' , dataTermino ='$postFim', precoTotal ='$postPreco', placaVeiculo ='$postPlac', statusLocacao ='$postStatus'  WHERE id=$postId";
   
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

//http://127.0.0.1/crud-rest-api/locacao.php?actionName=deletePost&id=67
if($actionName == "deletePost"){

    $postId   = isset($_GET["id"]) ? $_GET["id"] : '';
    
    if(!empty($postId)){
        $query = "DELETE FROM  locacao WHERE id=$postId";
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
