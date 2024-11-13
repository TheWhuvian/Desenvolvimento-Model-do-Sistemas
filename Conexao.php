<?php

class Conexao {
    private static $instance;

    public static function getConexao() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost;dbname=patio_automoveis", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Tratar erro de conexão
                die("Erro ao conectar: " . $e->getMessage());
            }
           
        }
        return self::$instance;
    }

    public static function closeConexao() {
        self::$instance = null;
    }
}