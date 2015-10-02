<?php

class DividaDAO {

    public static function getDividaByClienteID($id) {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM serasa_dividas WHERE clientes_id=$id";
        $result = mysqli_query($connection, $sql);
        
        $dividas = array();
        while ($divida = mysqli_fetch_object($result)) {
            if ($divida != null) {
                $dividas[] = $divida;
            }
        }
        return $dividas;
    }
    
    public static function getDividaByEstabelecimentoID($id) {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM serasa_dividas WHERE estabelecimentos_id=$id";
        $result = mysqli_query($connection, $sql);
        
        $dividas = array();
        while ($divida = mysqli_fetch_object($result)) {
            if ($divida != null) {
                $dividas[] = $divida;
            }
        }
        return $dividas;
    }

    public static function getAll() {
        $connection = Connection::getConnection();
        $sql = "SELECT * FROM serasa_dividas";

        // recupera todos os dividas
        $result = mysqli_query($connection, $sql);
        $dividas = array();
        while ($divida = mysqli_fetch_object($result)) {
            if ($divida != null) {
                $dividas[] = $divida;
            }
        }
        return $dividas;
    }

    public static function updateDivida($divida, $id) {
        $connection = Connection::getConnection();
        $sql = "UPDATE serasa_dividas SET clientes_id='$divida->clientes_id', estabelecimentos_id='$divida->estabelecimentos_id', valor='$divida->valor' WHERE id=$id";
        $result = mysqli_query($connection, $sql);

        $dividaAtualizado = DividaDAO::getDividaByID($id);
        return $dividaAtualizado;
    }

//    public static function deleteDivida($id) {
//        $connection = Connection::getConnection();
//        $sql = "DELETE FROM serasa_dividas WHERE id=$id";
//        $result = mysqli_query($connection, $sql);
//
//        if ($result === FALSE) {
//            return false;
//        } else {
//            return true;
//        }
//    }
    
    public static function deleteDivida($clientes_id,$estabelecimentos_id) {
        $connection = Connection::getConnection();
        echo"Estabelecimentos_id: ".$estabelecimentos_id."     delete</br>";
    echo"Clientes_id: ".$clientes_id."     delete</br>";
        $sql = "DELETE FROM serasa_dividas WHERE clientes_id=$clientes_id AND estabelecimentos_id=$estabelecimentos_id";
        $result = mysqli_query($connection, $sql);

        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public static function addDivida($divida) {
        $connection = Connection::getConnection();
        $sql = "INSERT INTO serasa_dividas (clientes_id,estabelecimentos_id,valor) VALUES ('$divida->clientes_id',$divida->estabelecimentos_id, $divida->valor) ";
        $result = mysqli_query($connection, $sql);
        if ($result === FALSE) {
            return false;
        } else {
            return true;
        }
    }

}
