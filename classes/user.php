<?php
include('password.php');
class User extends Password
{
    private $_db;
    function __construct($db)
    {
        parent::__construct();
        $this->_db = $db;
    }
    private function get_user_hash($username)
    {
        try {
            $stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE username = :username AND active="Yes" ');
            $stmt->execute(array(
                'username' => $username
            ));
            return $stmt->fetch();
        }
        catch (PDOException $e) {
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
        }
    }
    public function login($username, $password)
    {
        $row = $this->get_user_hash($username);
        if ($this->password_verify($password, $row['password']) == 1) {
            $cookie1 = base64_encode ( 'true' );
            $cookie2 = base64_encode ( $row['username'] );
            $cookie3 = base64_encode ( $row['memberID'] );
            setcookie('loggedin', $cookie1, time() + (86400 * 30), "/");
            setcookie('username', $cookie2, time() + (86400 * 30), "/");
            setcookie('memberID', $cookie3, time() + (86400 * 30), "/");
            return true;
        }
    }
    public function logout()
    {
        unset($_COOKIE['memberID']);
        setcookie('memberID', null, -1, '/');
        unset($_COOKIE['username']);
        setcookie('username', null, -1, '/');
        unset($_COOKIE['loggedin']);
        setcookie('loggedin', null, -1, '/');
    }
    public function is_logged_in()
    {
        if (isset($_COOKIE['loggedin']) && base64_decode($_COOKIE['loggedin']) == true) {
            return true;
        }
    }
}
?>