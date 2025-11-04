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

        $query = "SELECT * FROM" . self::$table . " WHERE email = '" .$this->email . "' LIMIT 1";
        $result = self::$db->query($query);

        if(!$result->num_rows){
            self::$errors [] = 'User does not exist';

            return;
        }

        return $result;
    }

    // TODO:

    public function checkPassword($result){
        $user = $result->fetch_object();

    }


    public function isAuth(){
        // User is auth correctly
        session_start();

        // fill session array 
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = $this->password;

        header('Location: /admin');
    }

}