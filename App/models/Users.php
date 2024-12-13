<?php

namespace App\Models;

class Users extends Db {
    public function login($username, $password) {
        try {
            $query = "SELECT user_id, name, surname, username, password, role FROM user WHERE username = :username";
            $stmt = $this->sql->prepare($query);
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$user || !password_verify($password, $user['password'])) {
                throw new \Exception("Usuario no encontrado o contraseña incorrecta");
            }

            unset($user['password']);
            return $user;

        } catch (\PDOException $e) {
            error_log("Error PDO en login: " . $e->getMessage());
            throw new \Exception("Error al iniciar sesión");
        }
    }

    public function addUser($username, $password, $email, $profile_pic, $name, $surname, $role) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user (username, password, email, profile_pic, name, surname, role) 
                      VALUES (:username, :password, :email, :profile_pic, :name, :surname, :role)";
            
            $stmt = $this->sql->prepare($query);
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
            
            return $this->sql->lastInsertId();
            
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new \Exception("El nombre de usuario o email ya existe");
            }
            throw new \Exception("Error al crear el usuario: " . $e->getMessage());
        }
    }

    public function editProfile($data) {
        try {
            $query = "UPDATE user SET name = :name, surname = :surname, email = :email";
            $params = [
                ':name' => $data['name'],
                ':surname' => $data['surname'],
                ':email' => $data['email'],
                ':user_id' => $data['user_id']
            ];

            if (!empty($data['new_password'])) {
                $query .= ", password = :password";
                $params[':password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
            }

            $query .= " WHERE user_id = :user_id";

            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute($params);

            if (!$result) {
                throw new \Exception("Error al actualizar el usuario");
            }

            return true;

        } catch (\PDOException $e) {
            error_log("Error actualizando usuario: " . $e->getMessage());
            throw new \Exception("Error al actualizar el perfil");
        }
    }

    public function getUserById($id) {
        $query = "SELECT * FROM user WHERE user_id = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        try {
            $query = "SELECT user_id as id, name, surname, role FROM user ORDER BY name ASC";
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting users: " . $e->getMessage());
            return [];
        }
    }

    public function getAllTechnicians() {

        try {
            $query = "SELECT user_id, name, surname, username, role FROM user WHERE role = 'tecnico' ORDER BY user_id ASC";
            $stmt = $this->sql->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting users: " . $e->getMessage());
            return [];
        }
    }

    public function editUser($data) {
        $query = "UPDATE user SET 
                  name = :name, 
                  surname = :surname, 
                  username = :username, 
                  email = :email, 
                  role = :role 
                  WHERE user_id = :user_id";
        
        $stmt = $this->sql->prepare($query);
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

    public function deleteUser($userId) {
            $query = "DELETE FROM user WHERE user_id = :user_id";
            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([':user_id' => $userId]); 
            
            if (!$result) {
                throw new \Exception("Error al eliminar el usuario");
            }
            
            return true;
    }
} // Cierre de la clase Users

