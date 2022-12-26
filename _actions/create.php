<?php

include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$data = [
    'name' => $_POST['name'] ?? 'Unknown',
    'email' => $_POST['email'] ?? 'Unknown',
    'phone' => $_POST['phone'] ?? 'Unknown',
    'address' => $_POST['address'] ?? 'Unknown',
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'role_id' => '1',

];

$table = new UsersTable(new MySQL());

if ($table) {

    $table->insert($data);
    HTTP::redirect("/index.php", "registered=true");

} else {
    HTTP::redirect("/register.php", "error=true");
}
