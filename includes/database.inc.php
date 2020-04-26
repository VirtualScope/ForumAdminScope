<?php
Class Database { # Written from scratch, I copied over ~10-15% or so of the code from the previous https://github.com/VirtualScope/AngryNerds-Master/blob/master/includes/db_access_layer.php but I wrote each of these public methods from scratch.
    private $connection;

    function __construct($db_host, $db_user, $db_pass, $db_name)
    {  
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
    function add_user($firstname, $lastname, $email, $pass, $admin, $active, $notes)
    {
        $now = time();
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`fname`, `lname`, `email`, `pass`, `admin`, `last_log_in`, `active`, `notes`) 
        VALUES (    
        '" . $firstname . "',
        '" . $lastname . "',
        '" . $email . "', 
        '" . $hash . "', 
        '" . $admin . "',
        " . $now . ", 
        '" . $active . "', 
        '" . $notes . "'
        )";
        return $this->query($sql);
    }
    function update_user_by_id($id, $firstname, $lastname, $email, $pass, $admin, $active, $notes)
    {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `fname`=$firstname, `lname`=$lastname, `email`=$email, `pass`=$hash, `admin`=$admin, `active`=$active, `notes`=$notes WHERE `id`=$id";
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

$Database = new Database("127.0.0.1", "root", "", "angrynerdsmaster");