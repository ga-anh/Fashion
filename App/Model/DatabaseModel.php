<?php

namespace App\Model;

use PDO;
use PDOException;

class DatabaseModel
{

    private $dburl = DB_URL;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASS;
    private $conn;
    private $stmt;

    function __construct()
    {
        try {
            $this->conn = new PDO($this->dburl, $this->dbuser, $this->dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "thanh cong";
        } catch (PDOException $e) {
            //echo "that bai" . 
            // $e->getMessage();
        }
    }

    function get_all($sql)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $this->stmt->fetchAll();
    }

    function get_one($sql)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute();
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $this->stmt->fetch();
    }
    function pdo_query($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {

            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($sql_args);
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $this->stmt->fetchAll();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function pdo_query_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($sql_args);
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $this->stmt->fetch();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    function pdo_execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($sql_args);
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }


    function pdo_execute_id($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute($sql_args);
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
