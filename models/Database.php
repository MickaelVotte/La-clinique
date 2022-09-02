<?php

class DataBase
{
    private string $_dbname = DBNAME;
    private string $_dbuser = DBUSER;
    private string $_dbpassword = DBPASSWORD;



    /**
     * fonction permettant de se connecter à la bdd
     * @return PDO
     * 
     */


    protected function connectDb()
    {
        try {
            //j'instancie un nouvel object selon la class PDO
            $database = new PDO("mysql:host=localhost;dbname=" . $this->_dbname .";charset=utf8", $this->_dbuser, $this->_dbpassword);
            //j'active les erreurs et les exceptions pour permettre de débugger uniquement en développement
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //si tout est ok, je retourne l'object $database
            return $database;
        } catch (Exception $errorMessage) {
            //si erreur, on affiche le message
            die('Erreur PDO :' . $errorMessage->getMessage());
        }
    }





}


?>