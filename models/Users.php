<?php


class Users extends DataBase
{


    private int $_users_id;
    private string $_users_mail;
    private string $_users_password;
    private string $_role_id_role;
    private string $_password;
   




    //mise en place des getters / setters

    public function getUsersId()
    {
        return $this->_users_id;
    }
    public function setUsersId(int $id)
    {
        $this->_users_id = $id;
    }

    public function getUsersMail()
    {
        return $this->_users_mail;
    }
    public function setUsersMail(string $mail)
    {
        $this->_users_mail = $mail;
    }

    public function getUsersPassword()
    {
        return $this->_users_password;
    }
    public function setUsersPassword(string $password)
    {
        $this->_users_mail = $password;
    }

    public function getUsersRoleId()
    {
        return $this->_role_id_role;
    }
    public function setUsersRoleId(int $roleId)
    {
        $this->_role_id_role = $roleId;
    }


    public function getPassword()
    {
        return $this->_password;
    }
    public function setPassword(string $password)
    {
        $this->_password = $password;
    }


    /**
     * fonction permettant de savoir su un mail est present dans la table
     * @param string $mail : Mail à rechercher
     * @return boolean
     */


    public function checkIfMailExists(string $mail)
    {
        //création d'une instance pdo via la fonction du parent 
        $pdo = parent::connectDb();
        //j'écris la requête me permettant d'aller chercher le mail dans la table users
        //je mets en place un marqueur nominatif :mail
        $sql = "SELECT `users_mail` FROM `users` WHERE `users_mail` = :mail";


        //je prépare la requête que je stock dans $query à l'aide de la méthode -> prepare()
        $query = $pdo->prepare($sql);

        //je lie la valeur du paramètre $mail au nominatif :mail à l'aide de la méthode->bindValue
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        //une fois le mail récupéré, j'execute la requête à l'aide de la méthode->execute()
        $query->execute();
        //je stock dans $result les données récupèrées à l'aide de la méthode->fetchAll()
        //afin de ne pas avoir d'erreur lorsque qu'on nous allons compter le tableau
        $result = $query->fetchAll();

        //je fais un test pour savoir si $result est vide
        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * fonction permettant de retourner toutes les infos sur users
     * 
     * @return boolean
     */

    public function getInfosUsers(string $mail): array
    {

        //création d'une instance pdo via la function du parent
        $pdo = parent::connectDb();

        //j'écris la requête me permettant d'aller chercher toutes les infos dans la table users
        //je récupère toutes les infos avec le select *
        //je mets en place un marqueur nominatif :ail
        $sql = "SELECT * FROM `users` WHERE `users_mail` = :mail";

        //je prépare la requête que je stock dans query à l'aide de la méthode-> prepare()
        $query = $pdo->prepare($sql);

        //je lis la valeur du paramètre $mail au marqueur nominatif :mail à l'aide de la méthode-> bindValue()
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        //une fois le mail récupéré, j'execute la requête à l'aide de la méthode -> execucte
        $query->execute();

        //je stock dans$result les données récupèrées à l'aide de la méthode ->fetch(PDO::FETCH_ASSOC)
        //il s'agira d'un tableau associatif de type clef, valeur
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }



    /**
     * fonction qui permet de recuperre le mail et le mdp de l'utilisateur
     * @param $password le mdp de l'utilisateur
     * @param $mail le email de l'utilisateur
     */

    public function addUser($password, $mail)
    {
        $pdo =parent::connectDb();
        $sql = "INSERT INTO users (`users_password`, `users_mail`, `role_id_role`) VALUES (:password, :mail, 3)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();

    }





    
    
}
