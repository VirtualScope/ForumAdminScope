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
        $sql = "SELECT * FROM `users` ORDER BY user_id ASC LIMIT $offset, $limit";
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
    function get_user_by_user_id($user_id)
    {
        $sql = "SELECT user_id,fname,lname,email,`admin` FROM `users` WHERE user_id=$user_id ORDER BY last_log_in ASC";
        return $this->query($sql);
    }
    function add_user($firstname, $lastname, $email, $pass, $admin, $active, $notes)
    {
        if ($active === "yes") $_active = true;
        else $_active = false;
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
        '" . $_active . "', 
        '" . $notes . "'
        )";
        return $this->query($sql);
    }
    function update_user_by_user_id($user_id, $firstname, $lastname, $email, $pass, $admin, $active, $notes)
    {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `fname`=$firstname, `lname`=$lastname, `email`=$email, `pass`=$hash, `admin`=$admin, `active`=$active, `notes`=$notes WHERE `user_id`=$user_id";
        return $this->query($sql);
    }
    function delete_user_by_id($user_id)
    {
        $sql = "DELETE FROM `users` WHERE user_id='$user_id'";
        return $this->query($sql);
    }
    private function query($sql){
        $me = $this->connection->query($sql); 
        return $me;
    }
    # FROM ICS325 Class Start
    function check_credentials($inputEmail, $inputPassword) # Future TODO (outside of this class scope): Add additional checks to verify no two accounts use the same email!
    {
        $sql = "SELECT * FROM `users` WHERE email='$inputEmail'"; # We only need one row, lets just hope there is never more than one row!
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $hash = $row['pass'];
        if (password_verify($inputPassword, $hash))
        {
            $row['success'] = true;
            return $row;
        }
        else
        {
            return;
        }
    }
    function check_credentials_by_id($id, $inputPassword)
    {
        $sql = "SELECT * FROM `users` WHERE user_id='$id'"; # We only need one row, lets just hope there is never more than one row!
        $result = $this->query($sql);
        $row = $result->fetch_assoc();
        $hash = $row['pass'];
        if (password_verify($inputPassword, $hash))
        {
            $row['success'] = true;
            return $row;
        }
        else
        {
            return;
        }
    }
    function get_user($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = $id";
        return $this->query($sql);
    }
    function update_user_by_id($id, $fname, $lname, $pass, $notes)
    {
        $active = "yes";            
        $_fname = "";
        $_lname = "";
        $_pass  = "";
        $_notes = "";

        $returned = $this->get_user($id);
        $result = $returned->fetch_assoc();

        $old_fname = $result["fname"];
        $old_lname = $result["lname"];
        $old_pass  = $result["pass"];
        $old_notes = $result["notes"];

        $_fname = ($fname === "")? $old_fname : $fname;
        $_lname = ($lname === "")? $old_lname : $lname;

        $_pass = ($pass === "")? $old_pass : password_hash($pass, PASSWORD_DEFAULT);

        $_notes = ($notes === "")? $old_notes : $notes;

        $sql = "UPDATE `users` SET `fname`='$_fname', `lname`='$_lname', `pass`='$_pass', `active`='$active', `notes`='$_notes' WHERE `user_id`=$id";
        return $this->query($sql);
    }
       #End ICS325
}

$Database = new Database("127.0.0.1", "root", "", "ics311sp200204");