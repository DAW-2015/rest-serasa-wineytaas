<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require 'connection.php';
require 'clienteDAO.php';
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
    echo "{'message':'Produto excluído'}";
  } else {
    echo "{'message':'Erro ao excluir produto'}";
  }
});

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
  $novoEstado = EstadoDAO::addEstado($novoEstado);

  echo json_encode($novoEstado);
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
    echo "{'message':'Produto excluído'}";
  } else {
    echo "{'message':'Erro ao excluir produto'}";
  }
});

$app->run();
