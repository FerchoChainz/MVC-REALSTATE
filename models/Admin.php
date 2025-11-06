<?php  

namespace Model;


class Admin extends ActiveRecord{
    // Data base 
    protected static $table = 'users';
    protected static $DBcols = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validate(){
        if(!$this->email){
            self::$errors[] = "Email can't be empty.";
        }

        if(!$this->password){
            self::$errors[] = "Password can't be empty.";
        }


        return self::$errors;
    }

    public function userExist(){
        // check if user exist

        $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "' LIMIT 1";

        $result = self::$db->query($query);

        if(!$result->num_rows){
            // if num rows is empty user not exist
            self::$errors[] = 'User not exist.';
        }

        return $result;

    }

    // TODO:

    public function checkPassword($result){
        $user = $result->fetch_object();

        $authenticated = password_verify($this->password, $user->password);

        if(!$authenticated){
            self::$errors[] = 'Password is not correct.';
        }

        return $authenticated;

    }


    public function isAuth(){
        // User is auth correctly
        session_start();

        // fill session array 
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = $this->password;

        header('Location: /admin');
    }

    public function authenticate(){
        session_start();

        // fill session array 
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }

}