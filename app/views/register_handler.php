<?php

use App\views\services\RegisterService;

$new_user = new RegisterService();

$new_user->registration($this->e($post['email']), $this->e($post['password']));

header("Location: /register");

