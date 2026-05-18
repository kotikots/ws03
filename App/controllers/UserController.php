<?php

namespace App\controllers;

use Framework\Validation;
use Framework\Database;

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

        $user = $this->db->query("SELECT * FROM users WHERE email = :email", $params); 
        if($user) {
            $errors['email'] = 'That email already exists';
            loadView('users/create',  [
                'errors' => $errors 
            ]);
            exit;  
        }
        
    }

}    