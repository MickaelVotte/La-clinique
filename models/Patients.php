
<?php


class Patients extends DataBase
{
    private int $_patients_id;
    private string $_patients_lastname;
    private string $_patients_firstname;
    private string $_patients_phonenumber;
    private string $_patients_address;
    private string $_patients_mail;





    public function getPatientsId()
    {
        return $this->_patients_id;
    }
    public function setPatientsId(int $id)
    {
        $this->_patients_id = $id;
    }

    public function getPatientsLastname()
    {
        return $this->_patients_lastname;
    }
    public function setPatientsLastname(string $lastname)
    {
        $this->_patients_lastname = $lastname;
    }

    public function getPatientsFirstname()
    {
        return $this->_patients_firstname;
    }
    public function setPatientsFirstname(string $firstname)
    {
        $this->_patients_firstname = $firstname;
    }

    public function getPatientsPhoneNumbers()
    {
        return $this->_patients_phonenumber;
    }
    public function setPatientsPhoneNumbers(string $phonenumber)
    {
        $this->_patients_phonenumber = $phonenumber;
    }

    public function getPatientsMail()
    {
        return $this->_patients_mail;
    }
    public function setPatientsMail(string $mail)
    {
        $this->_patients_mail = $mail;
    }

    public function getPatientsAddress()
    {
        return $this->_patients_address;
    }
    public function setPatientsAddress(string $address)
    {
        $this->_patients_address = $address;
    }



    /**
     * fonction permettant d'ajouter un patient dans la bdd
     * @param string $mail email du patient
     * @param string $firstname prenon du patient
     * @param string $lastname nom du patient
     * @param string $phonenumber numéro du patient
     * @param string $address adresse postale du patient
     */
    public function addPatient(string $lastname, string $firstname, string $phonenumber, string $address, string $mail): void
    {

        //création d'une instance pdo via la function du parent
        $pdo = parent::connectDb();

        //j'écris la requete qui va me permettre d'ajouter un client;
        $sql = "INSERT INTO  patients ( `patients_lastname`, `patients_firstname`, `patients_phonenumber`, `patients_address`, patients_mail) VALUES (:lastname, :firstname ,:phonenumber , :address ,:mail)";

        //je prépare la rêquete que je stock dans query à l'aide de la méthode-> prepare()
        //une requete préparée est à privilégier lorsque nous récupérons des données rentrées par l'utilisateur
        $query = $pdo->prepare($sql);

        //je lis la valeur du paramètre (ex: $mail, lastname etc) u marqueur nominatif :mail à l'aide de la méthode-> bindValue()
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);


        //une fois les informations récupéré, j'execute la rêquete à l'aide de la methode-> execute
        $query->execute();
    }



    /**
     * permet de récupérer tous les patients de la table patients
     * @return array tableau associatif
     */

    public function getAllPatients(): array
    {

        //création d'une instance pdo via la function du parent
        $pdo = parent::connectDb();

        //j'écris la requete qui va me permettre d'ajouter un client;
        $sql = "SELECT * FROM patients";

        //j'execute la requete à l'aide de la méthode -> query() et je la stock dans $query
        //utilisation de query car l'utilisateur n'intervient pas dans la requete
        $query = $pdo->query($sql);

        $result = $query->fetchAll();
        return $result;
    }




    /**
     * permet de recuperer les information d'un patient
     * @return array tableau associatif
     */
    public function getOnePatient($id): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT * FROM patients WHERE `patients_id` = :id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_STR);

        $query->execute();
        $result = $query->fetch();
        return $result;
    }



    /**permet de modifier les information du patient
     * @param string $mail email du patient
     * @param string $firstname prenon du patient
     * @param string $lastname nom du patient
     * @param string $phonenumber numéro du patient
     * @param string $address adresse postale du patient
     */
    public function updatePatient( $lastname, $firstname, $phonenumber, $address, $mail ,$idPatient)
    {
        $pdo = parent::connectDb();

        //j'écris la requete qui va me permettre de modifier un client;
        $sql = "UPDATE patients SET patients_lastname = :lastname, patients_firstname = :firstname, patients_phonenumber = :phonenumber, patients_address = :address ,patients_mail =:mail
        
        WHERE patients_id =:id ";

        //je prépare la rêquete que je stock dans query à l'aide de la méthode-> prepare()
        //une requete préparée est à privilégier lorsque nous récupérons des données rentrées par l'utilisateur
        $query = $pdo->prepare($sql);


        //je lis la valeur du paramètre (ex: $mail, lastname etc) u marqueur nominatif :mail à l'aide de la méthode-> bindValue()
    
        
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':phonenumber', $phonenumber, PDO::PARAM_STR);
        $query->bindValue(':address', $address, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':id', $idPatient, PDO::PARAM_INT);


        //une fois les informations récupéré, j'execute la rêquete à l'aide de la methode-> execute
        $query->execute();
    }
}
