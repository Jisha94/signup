<?php
class Database 
{
    private $host = "localhost";
    private $username = "root";
    private $database = "signup";
    private $password = "";
    protected $db;
   
    function __construct() 
    {
        $con = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        $this->db = $con;
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    /**
     * Checking for user email availability
     * @param string $email
    */
    public function useremailchecking($email) 
    {
        $result = mysqli_query($this->db, "SELECT * FROM users WHERE email='$email'");
        return $result;
    }
    /**
     * Function for user registration 
     * 
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $password
     * @param date $dob
    */
    public function register($firstname, $lastname, $email, $password, $dob) 
    {
        $password=md5($password);
        $result = mysqli_query($this->db, "INSERT INTO users(firstname, lastname, email, password, dob) VALUES('$firstname', '$lastname', '$email', '$password', '$dob')");
        return $result;
    }
}
