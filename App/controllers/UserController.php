<?php

namespace App\controllers;

use Framework\Validation;
use Framework\Database;
use Framework\Session; 

class UserController {
    protected $db;

    public function __construct() {
       $config = require basepath('config/db.php');   
       $this->db = new Database($config);
    }

    /**
     * show login page
     * @return void
     */
    public function login() {
        \loadView('users/login');
    }
    /**
     * show create page 
     * 
     * @return void
     */

    public function create() {
        loadView('users/create');
    }

    /**
     * Store user data
     * 
     * @param array $params
     * @return void
     */
    public function store() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation']; 

        $errors = [];

        // validation
     if(!Validation::email($email)) {
        $errors['email'] = 'Please Enter a valid email address';
     }     
        if(!Validation::string($name, 2, 50)) {
        $errors['name'] = 'Name must be 2 and 50 characters';
        }     
        if(!Validation::string($password, 6, 50)) {    
        $errors['password'] = 'Password must be 6 characters';
        }     
        if(!Validation::match($password, $password_confirmation)) {
        $errors['password_confirmation'] = 'Passwords do not match';
        }     
        
        if (!empty($errors)) {
            loadView('users/create',  [
                'errors' => $errors,  
                'user' => [
                    'name' => $name,
                    'email' => $email,  
                    'city' => $city,
                    'state' => $state,
                ]
            ]);
            exit;
        }     
        //check if email exist
        $params = [ 
            'email' => $email,
            
        ];

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", $params)->fetch(); 
        if($user) {
            $errors['email'] = 'That email already exists';
            loadView('users/create',  [
                'errors' => $errors 
            ]);
            exit;  
        }
        //create user account
        $params = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT) 
        ];

        $this->db->query("INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)", $params);

        //get new user id 
        $userid = $this->db->conn->lastInsertId();

        Session::set('user', [
            'id' => $userid,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
        ]); 

        redirect('/');
    }

    /**
     * Logout a user and kill session
     * 
     * @return void
     */
    public function logout() {
        Session::clear('user');

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        redirect('/');
    }
    /**
     * authenticate a user with email and password
     * 
     * @return void
     */
    public function authenticate() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];

        //validation
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }
//check for errors
        if (!empty($errors)) {
            loadView('users/login', [
                'errors' => $errors, 
            ]);
            exit;
        }
//check for emails
        $params = [
            'email' => $email 
        ]; 

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", $params)->fetch();
        if(!$user) {
            $errors['email'] = 'incorrect credential';
            loadView('users/login',  [
                'errors' => $errors 
            ]);
            exit;  
        }
        //check if passsword os correct 
        if(!password_verify($password, $user->password)) {
            $errors['email'] = 'Incorrect credential';
            loadView('users/login',  [
                'errors' => $errors 
            ]);
            exit;  
        }
        //set user session
        Session::set('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'city' => $user->city,
            'state' => $user->state,
        ]); 

        redirect('/');
    }

}    