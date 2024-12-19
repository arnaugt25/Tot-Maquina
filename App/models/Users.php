<?php

namespace App\Models;

use PDO;
use PDOException;

class Users {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    //Login
    public function login($username, $password) {
        $stmt = "SELECT user_id, name, surname, username, password, role FROM user WHERE username = :username";
        $stmt = $this->db->prepare($stmt);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$user || !password_verify($password, $user['password'])) {
            throw new \Exception("Usuario no encontrado o contraseña incorrecta");
        }
        unset($user['password']);
        return $user;
    }

    //Add User
    public function addUser($username, $password, $email, $profile_pic, $name, $surname, $role) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = "INSERT INTO user (username, password, email, profile_pic, name, surname, role) 
                      VALUES (:username, :password, :email, :profile_pic, :name, :surname, :role)";
            $stmt = $this->db->prepare($stmt);
            $result = $stmt->execute([
                ':username' => $username,
                ':password' => $hashedPassword,
                ':email' => $email,
                ':profile_pic' => $profile_pic,
                ':name' => $name,
                ':surname' => $surname,
                ':role' => $role
            ]);

            if (!$result) {
                throw new \Exception("Error al insertar el usuario");
            }
            return $this->db->lastInsertId();
    }

    //Edit Porfile 
    public function editProfile($data) {
            $stmt = "UPDATE user SET name = :name, surname = :surname, email = :email";
                        $params = [
                ':name' => $data['name'],
                ':surname' => $data['surname'],
                ':email' => $data['email'],
                ':user_id' => $data['user_id']
            ];
            if (!empty($data['new_password'])) {
                $stmt .= ", password = :password";
                $params[':password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
            }
            $stmt .= " WHERE user_id = :user_id";
            $stmt = $this->db->prepare($stmt);
            $result = $stmt->execute($params);
            if (!$result) {
                throw new \Exception("Error al actualizar el usuario");
            }
            return true;
    }

    //Obtener el usuario por id (Get user by id)
    public function getUserById($id) {
        $stmt = "SELECT * FROM user WHERE user_id = :id";
        $stmt = $this->db->prepare($stmt);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //Obtener todos los usuarios (Get all users)
    public function getAllUsers() {
        $stmt = "SELECT user_id as id, name, surname, role FROM user ORDER BY name ASC";
        $stmt = $this->db->prepare($stmt);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Obtener todos los usuario con rol técnico (Get all users with technical role)
    public function getAllTechnicians() {
        $stmt = "SELECT user_id, name, surname, username, role FROM user WHERE role = 'tecnico' ORDER BY user_id ASC";
        $stmt = $this->db->prepare($stmt);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Editar usuario (Edit user)
    public function editUser($data) {
        $stmt = "UPDATE user SET 
                  name = :name, 
                  surname = :surname, 
                  username = :username, 
                  email = :email, 
                  role = :role 
                  WHERE user_id = :user_id";
        $stmt = $this->db->prepare($stmt);
        $params = [
            ':name' => $data['name'],
            ':surname' => $data['surname'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':role' => $data['role'],
            ':user_id' => $data['user_id']
        ];
        $result = $stmt->execute($params);
        if (!$result) {
            error_log("Error PDO: " . print_r($stmt->errorInfo(), true));
            throw new \Exception("Error al actualizar el usuario");
        }
        if ($stmt->rowCount() === 0) {
            error_log("No se actualizó ninguna fila");
            return false;
        }
        return true;
    }

    //Eliminar Usuario (Delete User)
    public function deleteUser($userId) {
        $stmt = "DELETE FROM user WHERE user_id = :user_id";
        $stmt = $this->db->prepare($stmt);
        $result = $stmt->execute([':user_id' => $userId]); 
        if (!$result) {
            throw new \Exception("Error al eliminar el usuario");
        }
        return true;
    }
} 

