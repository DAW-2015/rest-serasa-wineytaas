<?php

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

require 'connection.php';
require 'clienteDAO.php';
require 'dividaDAO.php';
require 'estabelecimentoDAO.php';
require 'estadoDAO.php';


$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/clientes/:cpf', function ($cpf) {
    //recupera o cliente
    $cliente = ClienteDAO::getClienteByCPF($cpf);
    echo json_encode($cliente);
});

$app->get('/clientes', function() {
    // recupera todos os clientes
    $clientes = ClienteDAO::getAll();
    echo json_encode($clientes);
});

$app->post('/clientes', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o cliente
    $novoCliente = json_decode($request->getBody());
    $novoCliente = ClienteDAO::addCliente($novoCliente);

    echo json_encode($novoCliente);
});

$app->put('/clientes/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o cliente
    $cliente = json_decode($request->getBody());
    $cliente = ClienteDAO::updateCliente($cliente, $id);

    echo json_encode($cliente);
});

$app->delete('/clientes/:id', function($id) {
    // exclui o cliente
    $isDeleted = ClienteDAO::deleteCliente($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Cliente excluído'}";
    } else {
        echo "{'message':'Erro ao excluir cliente'}";
    }
});

//----------------------ESTADOS---------------------------------

$app->get('/estados/:id', function ($id) {
    //recupera o estado
    $estado = EstadoDAO::getEstadoByID($id);
    echo json_encode($estado);
});

$app->get('/estados', function() {
    // recupera todos os estados
    $estados = EstadoDAO::getAll();
    echo json_encode($estados);
});

$app->post('/estados', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o estado
    $novoEstado = json_decode($request->getBody());
    $isAdd = EstadoDAO::addEstado($novoEstado);
    
    if ($isAdd) {
        echo "{'message':'Estado Adicionado'}";
    } else {
        echo "{'message':'Erro ao adicionar estado'}";
    }
});

$app->put('/estados/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o estado
    $estado = json_decode($request->getBody());
    $estado = EstadoDAO::updateEstado($estado, $id);

    echo json_encode($estado);
});

$app->delete('/estados/:id', function($id) {
    // exclui o estado
    $isDeleted = EstadoDAO::deleteEstado($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Estado excluído'}";
    } else {
        echo "{'message':'Erro ao excluir estado'}";
    }
});

//----------------------CIDADES---------------------------------

$app->get('/cidades/:id', function ($id) {
    //recupera o cidade
    $cidade = CidadeDAO::getCidadeByID($id);
    echo json_encode($cidade);
});

$app->get('/cidades', function() {
    // recupera todos os cidades
    $cidades = CidadeDAO::getAll();
    echo json_encode($cidades);
});

$app->post('/cidades', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o cidade
    $novoCidade = json_decode($request->getBody());
    $isAdd = CidadeDAO::addCidade($novoCidade);
    
    if ($isAdd) {
        echo "{'message':'Cidade Adicionado'}";
    } else {
        echo "{'message':'Erro ao adicionar cidade'}";
    }
});

$app->put('/cidades/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o cidade
    $cidade = json_decode($request->getBody());
    $cidade = CidadeDAO::updateCidade($cidade, $id);

    echo json_encode($cidade);
});

$app->delete('/cidades/:id', function($id) {
    // exclui o cidade
    $isDeleted = CidadeDAO::deleteCidade($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Cidade excluído'}";
    } else {
        echo "{'message':'Erro ao excluir cidade'}";
    }
});


//----------------------ESTABELECIMENTOS---------------------------------

$app->get('/estabelecimentos/:id', function ($id) {
    //recupera o -=
    $estabelecimento = EstabelecimentoDAO::getEstabelecimentoByID($id);
    echo json_encode($estabelecimento);
});

$app->get('/estabelecimentos', function() {
    // recupera todos os estabelecimentos
    $estabelecimentos = EstabelecimentoDAO::getAll();
    echo json_encode($estabelecimentos);
});

$app->post('/estabelecimentos', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o estabelecimento
    $novoEstabelecimento = json_decode($request->getBody());
    $isAdd = EstabelecimentoDAO::addEstabelecimento($novoEstabelecimento);
    
    if ($isAdd) {
        echo "{'message':'Estabelecimento Adicionado'}";
    } else {
        echo "{'message':'Erro ao adicionar estabelecimento'}";
    }
});

$app->put('/estabelecimentos/:id', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o estabelecimento
    $estabelecimento = json_decode($request->getBody());
    $estabelecimento = EstabelecimentoDAO::updateEstabelecimento($estabelecimento, $id);

    echo json_encode($estabelecimento);
});

$app->delete('/estabelecimentos/:id', function($id) {
    // exclui o estabelecimento
    $isDeleted = EstabelecimentoDAO::deleteEstabelecimento($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Estabelecimento excluído'}";
    } else {
        echo "{'message':'Erro ao excluir estabelecimento'}";
    }
});

//----------------------DIVIDAS---------------------------------

$app->get('/dividas/clientes/:id', function ($id) {
    //recupera o -=
    $divida = DividaDAO::getDividaByClienteID($id);
    echo json_encode($divida);
});

$app->get('/dividas/estabelecimentos/:id', function ($id) {
    //recupera o -=
    $divida = DividaDAO::getDividaByEstabelecimentoID($id);
    echo json_encode($divida);
});

$app->get('/dividas', function() {
    // recupera todos os dividas
    $dividas = DividaDAO::getAll();
    echo json_encode($dividas);
});

$app->post('/dividas', function() {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // insere o divida
    $novoDivida = json_decode($request->getBody());
    $isAdd = DividaDAO::addDivida($novoDivida);
    
    if ($isAdd) {
        echo "{'message':'Divida Adicionado'}";
    } else {
        echo "{'message':'Erro ao adicionar divida'}";
    }
});

$app->put('/dividas', function ($id) {
    // recupera o request
    $request = \Slim\Slim::getInstance()->request();

    // atualiza o divida
    $divida = json_decode($request->getBody());
    $divida = DividaDAO::updateDivida($divida, $id);

    echo json_encode($divida);
});

$app->delete('/dividas/:id', function($id) {
    // exclui o divida
    $isDeleted = DividaDAO::deleteDivida($id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Divida excluído'}";
    } else {
        echo "{'message':'Erro ao excluir divida'}";
    }
});


$app->delete('/dividas/:clientes_id/:estabelecimentos_id', function($clientes_id,$estabelecimentos_id) {
    echo"Estabelecimentos_id: ".$estabelecimentos_id."     index</br>";
    echo"Clientes_id: ".$clientes_id."     index</br>";
    // exclui o divida
    $request = \Slim\Slim::getInstance()->request();
    $isDeleted = DividaDAO::deleteDivida($clientes_id,$estabelecimentos_id);

    // verifica se houve problema na exclusão
    if ($isDeleted) {
        echo "{'message':'Divida excluído'}";
    } else {
        echo "{'message':'Erro ao excluir divida'}";
    }
});


$app->run();
