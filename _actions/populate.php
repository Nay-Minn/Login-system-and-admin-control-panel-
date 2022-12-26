<?php

include('../vendor/autoload.php');

use Faker\Factory as Faker;

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$faker = Faker::create();
$table = new UsersTable(new MySQL());

if ($table) {
    echo "Database connection opened.\n";

    for ($i=0; $i < 20; $i++) {
        $data = [

         'name' => $faker->name,
         'email' => $faker->email,
         'phone' => $faker->phoneNumber,
         'address' => $faker->address,
         'password' => password_hash("password", PASSWORD_DEFAULT),
         'role_id' =>$i < 5 ? rand(1, 3) : 1 ,
        ];

        $table->insert($data);
    }

    echo "Done Populating UsersTable.\n";
}
