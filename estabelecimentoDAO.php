<?php

class estabelecimentoDAO {

    public static function getEstabelecimentoByID($id) {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM serasa_estabelecimentos WHERE id=$id";
        $result = mysqli_query($connection, $sql);
        $estabelecimento = mysqli_fetch_object($result);

        $sql = "SELECT * FROM serasa_cidades WHERE id=$estabelecimento->cidades_id";
        $result = mysqli_query($connection, $sql);
        $estabelecimento->nome_cidade = mysqli_fetch_object($result)->nome;

        return $estabelecimento;
    }

    public static function getAll() {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM serasa_estabelecimentos";

        // recupera todos os estabelecimentos
        $result = mysqli_query($connection, $sql);
        $estabelecimentos = array();
        while ($estabelecimento = mysqli_fetch_object($result)) {
            if ($estabelecimento != null) {
                $sql = "SELECT * FROM serasa_cidades WHERE id=$estabelecimento->cidades_id";
                $result = mysqli_query($connection, $sql);
                $estabelecimento->nome_cidade = mysqli_fetch_object($result)->nome;
                $estabelecimentos[] = $estabelecimento;
            }
        }
        return $estabelecimentos;
    }

    public static function updateEstabelecimento($estabelecimento, $id) {
        $connection = Connection::getConnection();
        $sql = "UPDATE serasa_estabelecimentos SET nome='$estabelecimento->nome', estado_id='$estabelecimento->cidades_id' WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        $estabelecimentoAtualizado = EstabelecimentoDAO::getEstabelecimentoByID($id);
        return $estabelecimentoAtualizado;
    }

    public static function deleteEstabelecimento($id) {
        $connection = Connection::getConnection();
        $sql = "DELETE FROM serasa_estabelecimentos WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public static function addEstabelecimento($estabelecimento) {
        $connection = Connection::getConnection();
        $sql = "INSERT INTO serasa_estabelecimentos (nome,cidades_id) VALUES ('$estabelecimento->nome',$estabelecimento->cidades_id) ";
        $result = mysqli_query($connection, $sql);
        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

}
