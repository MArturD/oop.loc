<?php

namespace App\views\services;

use PDO;
use function Tamtamchik\SimpleFlash\flash;

class RegisterService
{

    public $pdo, $auth;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=project;", "root", "");
        $this->auth = new \Delight\Auth\Auth($this->pdo);
    }

    public function registration($email,$password){
        try {
            $userId = $this->auth->register($email, $password,'', function ($selector , $token ) {
            });
        } catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['Проверка']);
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}
