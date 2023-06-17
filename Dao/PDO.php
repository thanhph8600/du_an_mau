<?php

function pdo_get_connection() {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=xshop", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }


//   function select_one($table, $column, $pield){
//     $sql = "SELECT * FROM `".$table."` WHERE `".$column."` ='".$pield."' " ;
//     return pdo_query_one($sql);
//   }
    function pdo_execute($sql) {
        $sql_args =array_slice(func_get_args(),1);
        try {
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
        }
        catch(PDOException $e) {
            throw $e;
        }
        finally {
            unset($conn);
        }
    }

    function pdo_query($sql) {
        $sql_args =array_slice(func_get_args(),1);
        try {
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $row = $stmt -> fetchAll();
            return $row;
        }
        catch(PDOException $e) {
            throw $e;
        }
        finally {
            unset($conn);
        }
    }

    function pdo_query_one($sql) {
        $sql_args =array_slice(func_get_args(),1);
        try {
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e) {
            throw $e;
        }
        finally {
            unset($conn);
        }
    }

    function pdo_query_value($sql) {
        $sql_args =array_slice(func_get_args(),1);
        try {
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        }
        catch(PDOException $e) {
            throw $e;
        }
        finally {
            unset($conn);
        }
    }

    function last_id($sql){ 

        $sql_args =array_slice(func_get_args(),1);
        try {
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
            $last_id = $conn->lastInsertId();
            return $last_id;
        }
        catch(PDOException $e) {
            throw $e;
        }
        finally {
            unset($conn);
        }

    }
?>