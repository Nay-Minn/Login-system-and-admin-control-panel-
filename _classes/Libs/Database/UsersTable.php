<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{

    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function insert($data)
    {
        try {

            $query = "INSERT INTO users (
            name, email, phone, address, password, role_id , created_at
            ) VALUES (
            :name, :email, :phone, :address, :password, :role_id , NOW())";

            $userData = $this->db->prepare($query);
            $userData->execute($data);

            return $this->db->lastInsertId();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAll()
    {

        try {

            $userDataFromTable = $this->db->query("SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id ");

            return $userDataFromTable->fetchAll();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function findByEmailAndPassword($email, $password)
    {

        try {

            $result = $this->db->prepare("SELECT users.*, roles.name AS role, VALUE FROM users LEFT JOIN roles  ON users.role_id = roles.id WHERE users.email = :email");

            $result->execute([":email" => $email]);
            $user = $result->fetch();

            if (password_verify($password, $user->password)) {
                return $user;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updatePhoto($id, $name)
    {
        $profilePhoto = $this->db->prepare("UPDATE users SET photo = :name WHERE id= :id");
        $profilePhoto->execute([':name' => $name, ':id' => $id]);

        return $profilePhoto->rowCount();
    }

    public function suspend($id)
    {

        $userToSuspend = $this->db->prepare("UPDATE users SET suspended = 1 WHERE id= :id");
        $userToSuspend->execute([':id' => $id]);
        return $userToSuspend->rowCount();

    }

    public function unsuspend($id)
    {

        $userToUnsuspend = $this->db->prepare("UPDATE users SET suspended = 0 WHERE id= :id");
        $userToUnsuspend->execute([':id' => $id]);
        return $userToUnsuspend->rowCount();

    }

    public function changeRole($id, $role)
    {

        $userToChangeRole = $this->db->prepare("UPDATE users SET role_id = :role WHERE id = :id ");
        $userToChangeRole->execute([':id' => $id, ':role' => $role]);

        return $userToChangeRole->rowCount();
    }

    public function delete($id)
    {

        $userToDelete = $this->db->prepare("DELETE FROM users WHERE id= :id");
        $userToDelete->execute([':id' => $id]);

        return $userToDelete->rowCount();
    }

}
