<?php
class newModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        //insert data in the DB
        //$this->db->connect
        try{
            $query = $this->db->connect()->prepare('INSERT INTO adminblog (
                author_Id, userName, userSurname, user_pass, user_login) VALUES
                (:author_Id, :userName, :userSurname, :user_pass, :user_login)');
            $query->execute(['author_Id'=>$data['authorId'], 'userName'=>$data['userName'],
            'userSurname'=>$data['userSurname'], 'user_pass'=>$data['user_pass'],
            'user_login'=>$data['user_login']]);
            echo "insert data";
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }

    }
    public function validate($data){
        try{
            $userId     = $data['authorId'];
            $userEmail  = $data['user_login'];
            $check=$this->db->connect()->query("SELECT * FROM adminblog WHERE author_ID='$userId' AND user_login='$userEmail'");
            $checkRows  =$check->execute();
            $rows = $check->fetchAll();
            $nRows = count($rows);
            
            return $nRows;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}
?>