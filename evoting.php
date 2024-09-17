<?php
require_once('dbconnection.php');

class evoting
{

    private $conn;
    public function __construct($connection)
    {

        $this->conn = $connection;
    }


    public function getGroupIdByName($groupName)
    {

        $query = "select group_id from groups where group_name = :group_name";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':group_name', $groupName, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $group_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $group_id;
        } else {
            return NULL;
        }
    }

    public function updateNumber($number, $group_id)
    {

        $query = " update numbers set group_id = :group_id where number = :number";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':number', $number, PDO::PARAM_INT);
        $stmt->bindParam(':group_id', $group_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function validateEmail($email)
    {

        $query = "select *from users where email =:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getVoterDetails()
    {

        $query = "select *from candidates";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function checkLogin($email, $password)
    {

        $query = "select *from users where email =:email AND password =:password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function register($email, $password, $full_name, $phone)
    {

        $stmt = $this->conn->prepare("insert into  users (email ,password,username ,contact) values (:email ,:password ,:username ,:contact)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':username', $full_name);
        $stmt->bindParam(':contact', $phone);
        if ($stmt->execute()) {
            return true;
        }
    }

    public function checkVoter($userid)
    {

        $query = "select *from votes where user_id =:user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userid, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function voting_start($userid, $cid)
    {

        $stmt = $this->conn->prepare("insert into  votes (user_id , candidate_id) values (:user_id ,:candidate_id)");
        $stmt->bindParam(':user_id', $userid);
        $stmt->bindParam(':candidate_id', $cid);

        if ($stmt->execute()) {
            return true;
        }
    }


    public function VoteCountDetails()
    {

        $query = "SELECT 
    @row_number := @row_number + 1 AS SN,  
    c.name AS CandidateName,              
    c.party AS Party,                      
    COUNT(v.id) AS Vote                   
FROM candidates c
LEFT JOIN votes v ON c.id = v.candidate_id 
JOIN (SELECT @row_number := 0) r          
GROUP BY c.id                              
ORDER BY Vote DESC;                        
";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function totalVoteCount()
    {

        $query = "SELECT COUNT(id) AS TotalVotes FROM votes;";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
