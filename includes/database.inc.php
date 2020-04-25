<?php
Class DatabaseAccessLayer {
    // Properties
    private $connection;

    function __construct($db_host, $db_user, $db_pass, $db_name)
    {  
        // Connect to DB
        $this->connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno) { # https://www.php.net/manual/en/mysqli.error.php
            echo "Database Connection Error! <script>alert(\"We're sorry! There was a Database Connection Error! :(\");</script>";
            exit();
        }
    }
    function get_users($page, $limit) # Note pages start at 1.
    {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM `users` ORDER BY id ASC LIMIT $offset, $limit";
        return $this->query($sql);
    }
    function count_pages($limit) # Note pages start at 1.
    {
        #$offset = ($page - 1) * $limit;
        $sql = "SELECT COUNT(*) FROM `users`";
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $returnme = intval(ceil($row["COUNT(*)"] / $limit));
        return $returnme;
    }
    function get_user_by_id($id)
    {
        $sql = "SELECT id,fname,lname,email,`admin` FROM `users` WHERE id=$id ORDER BY last_log_in ASC";
        return $this->query($sql);
    }
    function add_user($username, $password, $firstname, $lastname)
    {
        $creation_date = time();

        $sql = "INSERT INTO `user_post`(`username`, `password`, `firstname`, `lastname`, `creation_date`) 
        VALUES (    
        '" . $username . "',
        '" . $password . "',
        " . $firstname . ", 
        " . $lastname . ", 
        '" . $creation_date . "'
        )";
        return $this->query($sql);
    }

    function check_credentials($inputEmail, $inputPassword)
    {
        $sql = "SELECT * FROM `users` WHERE email='$inputEmail' AND pass='$inputPassword'";
        return $this->query($sql);
    }
    function delete_user_by_id($id)
    {
        $sql = "DELETE FROM `users` WHERE id='$id'";
        return $this->query($sql);
    }
    private function query($sql){
        return $this->connection->query($sql); 
    }

}

$Database = new DatabaseAccessLayer("127.0.0.1", "root", "", "angrynerdsmaster");