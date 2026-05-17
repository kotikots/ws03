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
}