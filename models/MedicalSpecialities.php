<?php 

    class Medicalspecialities extends DataBase
    {
        private int $_role_id;
        private string $_role_name;


        public function getRoleId()
        {
            return $this->_role_id;
        }
        public function setUserId(int $id)
        {
           $this->_role_id = $id ;
        }


        public function getRoleName()
        {
            return $this->_role_name;
        }
        public function setRoleName(string $name)
        {
            $this->_role_name = $name;
        }



        /**
         * permet de recuperer toutes les specialités 
         */


         public function getMedicalSpecialities()
         {
            $pdo = parent::connectDb();

            $sql = "SELECT * FROM medicalspecialities ";

            $query = $pdo->query($sql);

            $result = $query->fetchAll();

            return $result;

         }


    }






?>