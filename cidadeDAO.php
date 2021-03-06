<?php

class CidadeDAO {

    public static function getCidadeByID($id) {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM serasa_cidades WHERE id=$id";
        $result = mysqli_query($connection, $sql);
        $cidade = mysqli_fetch_object($result);

        $e = "SELECT * FROM serasa_estados WHERE id=$cidade->estados_id";
        $result = mysqli_query($connection, $sql);
        $cidade->nome_estado = mysqli_fetch_object($result)->nome;

        return $cidade;
    }

    public static function getAll() {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM serasa_cidades";

        // recupera todos os cidades
        $result = mysqli_query($connection, $sql);
        $cidades = array();
        while ($cidade = mysqli_fetch_object($result)) {
            if ($cidade != null) {
                $sql = "SELECT * FROM serasa_estados WHERE id=$cidade->estados_id";
                $e = mysqli_query($connection, $sql);
                $cidade->nome_estado = mysqli_fetch_object($e)->nome;
                $cidades[] = $cidade;
            }
        }
        return $cidades;
    }

    public static function updateCidade($cidade, $id) {
        $connection = Connection::getConnection();
        $sql = "UPDATE serasa_cidades SET nome='$cidade->nome', estado_id='$cidade->estado_id' WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        $cidadeAtualizado = CidadeDAO::getCidadeByID($id);
        return $cidadeAtualizado;
    }

    public static function deleteCidade($id) {
        $connection = Connection::getConnection();
        $sql = "DELETE FROM serasa_cidades WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public static function addCidade($cidade) {
        $connection = Connection::getConnection();
        $sql = "INSERT INTO serasa_cidades (nome,estados_id) VALUES ('$cidade->nome',$cidade->estado_id) ";
        $result = mysqli_query($connection, $sql);
        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

}
