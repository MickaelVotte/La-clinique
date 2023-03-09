<?php

class Doctors extends DataBase

{
    private int $_doctor_id;
    private string $_doctor_name;
    private string $_doctor_lastname;
    private string $_doctor_phonenumber;
    private string $_doctor_mail;
    private int $_medicalspecialities_id;




    public function getDoctorId()
    {
        return $this->_doctor_id;
    }
    public function setDoctorId(int $id)
    {
        $this->_doctor_id = $id;
    }


    public function getDoctorName()
    {
        return $this->_doctor_name;
    }
    public function SetDoctorName(string $name)
    {
        $this->_doctor_name = $name;
    }


    public function getDoctorLastname()
    {
        return $this->_doctor_lastname;
    }
    public function setDoctorLastname(string $lastname)
    {
        $this->_doctor_lastname = $lastname;
    }


    public function getDoctorPhonenumber()
    {
        return $this->_doctor_phonenumber;
    }
    public function setDoctorPhonenumber(string $phonenumber)
    {
        $this->_doctor_phonenumber = $phonenumber;
    }


    public function getDoctorMail()
    {
        return $this->_doctor_mail;
    }
    public function setDoctorMail(string $mail)
    {
        $this->_doctor_mail = $mail;
    }



    public function getMedicalSpecial()
    {
        return $this->_medicalspecialities_id;
    }
    public function setMedicalSpecial(int $_medicalspecialities_id)
    {
        $this->_medicalspecialities_id = $_medicalspecialities_id;
    }




    /**
     * fonction permettant d'ajouter un specialiste dans la bdd
     * @param string $name prenon du specialiste 
     * @param string $lastname nom du specialiste
     * @param string $phonenumber numéro de télèphone du specialiste
     * @param string $mail email du specialiste
     * @param string $medicalspecial spécialité du docteur
     *
     */


    public function addDoctor(string $name, string $lastname, string $phonenumber, string $mail, int $medicalspecial): void
    {

        //création d'un instance pdo via la fonction du parent
        $pdo = parent::connectDb();


        //j'écris la requete qui va me permettre d'ajpouter un client; 

        $sql = "INSERT INTO doctors (`doctors_name`, `doctors_lastname`, `doctors_phonenumber`, `doctors_mail`,`medicalspecialities_id_medicalspecialities`) VALUES  (:name, :lastname, 
            :phonenumber, :mail, :medicalspecial)";

        //je prepare la requete que je stock dans query à l'aide de la méthode->prepare()
        //une requete préparée est à priviligier lorsque nous récupérons des données rentrées par l'utilisateur
        $query = $pdo->prepare($sql);

        //je lis la valeur du parametre (ex: name, lastname etc) un marqueur nominatif :name à l'aide de la méthode->bindvalue();
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindvalue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindvalue(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $query->bindvalue(':mail', $mail, PDO::PARAM_STR);
        $query->bindvalue(':medicalspecial', $medicalspecial, PDO::PARAM_INT);

        //une fois les informations récupéré, j'execute la requete à l'aide de la methode->execute
        $query->execute();
    }


    /**
     * permet de récupérer tous les docteurs de la bdd
     * @return array tableau associatif
     * 
     */
    public function getAllDoctors(): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT doctors_id, doctors_name, doctors_lastname,doctors_phonenumber,doctors_mail, medicalspecialities_name FROM doctors INNER JOIN medicalspecialities ON `medicalspecialities_id` = `medicalspecialities_id_medicalspecialities`";

        $query = $pdo->query($sql);

        $result = $query->fetchAll();

        return $result;
    }






    /**
     * permet de recuperer les information d'un docteur
     * @return array tableau associatif
     */
    public function getOneDoctor($id): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT * FROM doctors WHERE `doctors_id` = :id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_STR);

        $query->execute();
        $result = $query->fetch();
        return $result;
    }



    /**
     * permet de modifier les information d'un docteur
     * @param string name du docteur
     * @param string firstname du docteur
     * @param string phonenumber du docteur
     * @param string address du docteur
     * @param string mail du docteur
     */


    public function updateDoctor($name, $firstname, $phonenumber, $mail, $medicalspecialities, $idDoctor)
    {
        $pdo = parent::connectDb();

        //j'écris la requete qui va me permettre de modifier un docteur;

        $sql = "UPDATE doctors SET doctors_name = :name, doctors_lastname = :lastname, doctors_phonenumber = :phonenumber, doctors_mail = :mail, medicalspecialities_id_medicalspecialities =:medicalspecialities  WHERE doctors_id = :id";


        //je prepare la requete que je stock dans query à l'aide de la methode->prepare()
        //une requete preparee est à privilégier lorsque nous récupérons des données rentrées par l'utilisateur

        $query = $pdo->prepare($sql);


        //je lis la valeur du paramètre (ex: $mail, lastname etc) u marqueur nominatif :mail à l'aide de la méthode-> bindValue()

            
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':lastname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue('medicalspecialities', $medicalspecialities, PDO::PARAM_STR);
        $query->bindValue(':id', $idDoctor, PDO::PARAM_INT);


  //une fois les informations récupéré, j'execute la rêquete à l'aide de la methode-> execute
  $query->execute();

    }
        


  public function deleteDoctor($id)
  {
      // //création d'une instance pdo via la function du parent
      $pdo = parent::connectDb();

      //j'écris une requete pour supprimer un client.
      $sql = "DELETE FROM doctors WHERE doctors_id = :id";

      $query = $pdo->prepare($sql);

      //je lis la valeur du parametre (ex: id) un marqueur nominatif :id à l'aide de la methode-> bindvalue()
      $query->bindValue(':id', $id, PDO::PARAM_INT);

      $query->execute();
      
      
  }




    
}
