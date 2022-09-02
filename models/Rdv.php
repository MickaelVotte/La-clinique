<?php

class Rdv extends DataBase

{
    private int $_rendez_vous_id;
    private int $_rendez_vous_date;
    private int $_rendez_vous_hour;
    private string $_rendez_vous_description;
    private int $_patients_id_patients;
    private int $_doctors_id_doctors;


    public function getRendezVousId()
    {
        return $this->_rendez_vous_id;
    }
    public function setRendezVousId(int $id)
    {
        $this->_rendez_vous_id = $id;
    }
    
    public function getRendezVousDate()
    {
        return $this->_rendez_vous_date;
    }
    public function setRendezVousDate(string $date)
    {
        $this->_rendez_vous_date = $date;
    }

    public function getRendezVousHour()
    {
        return $this->_rendez_vous_hour;
    }
    public function setRendezVousHour(string $hour)
    {
        $this->_rendez_vous_hour = $hour;
    }

    public function getRendezVousDescription()
    {
        return $this->_rendez_vous_description;
    }
    public function setRendezVousDescription(string $description)
    {
        $this->_rendez_vous_description = $description;
    }

    public function getPatientIdPatient()
    {
        return $this-> _patients_id_patients;
    }
    public function setPatientIdPatient (int $idPatient)
    {
        $this-> _patients_id_patients = $idPatient;
    }


    public function getDoctorsIdDoctors()
    {
        return $this-> _doctors_id_doctors;
    }
    public function setDoctorsIdDoctors (int $idDoctor)
    {
        $this-> _doctors_id_doctors = $idDoctor;
    }




    /**
     * fonction qui permettre d'ajouter un rdv dans la bdd
     * @param string $date, date du redv
     * @param string $hour, heure su rendez vous
     * @param string $description, description du rdv
     * @param int $idPateint permet de recuperer l'id d'un patient deja inscrit deja inscrit dans la bdd
     * @param int $idDoctor permet de recuperer l'id d'un specialiste deja inscrit dans la bdd
     * 
     */


    public function addRdv(string $date, string $hour, string $description, int $idPatient, int $idDoctor) : void
    {

        $pdo = parent::connectDb();

        $sql = "INSERT INTO rendezvous (`rendezvous_date`, `rendezvous_hour`, `rendezvous_description`, `patients_id_patients`, `doctors_id_doctors`) VALUES (:date, :hour, :description, :idPatient, :idDoctor)"; 

        $query = $pdo->prepare($sql);



        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':hour' ,$hour, PDO::PARAM_STR);
        $query->bindValue(':description' ,$description, PDO::PARAM_STR);
        $query->bindValue(':idPatient' ,$idPatient, PDO::PARAM_INT);
        $query->bindValue(':idDoctor' ,$idDoctor, PDO::PARAM_INT);

        $query->execute();
    }





    /**
     * permet de recuperer tous les rdv inscrit dans la bdd
     * @return array tableau associatif
     */

    public function getAllRdv():array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT rendezvous_id, rendezvous_date, rendezvous_hour, rendezvous_description, patients_firstname, doctors_name, medicalspecialities_name FROM rendezvous
         INNER JOIN patients on patients_id = patients_id_patients 
        INNER JOIN doctors on doctors_id = doctors_id_doctors
        INNER JOIN medicalspecialities on medicalspecialities_id = medicalspecialities_id_medicalspecialities"; 


        $query = $pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }


}


?>
