<?php

namespace App\Models;

class Users extends DB {
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
            $query = "INSERT INTO user (username, password, email, profile_pic, name, surname, role) 
                      VALUES (:username, :password, :email, :profile_pic, :name, :surname, :role)";
            
            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([
                ':username' => $username,
                ':password' => $password,
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
            // Si es un error de duplicado (username o email)
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

    // Get user by id
    public function getUserById($id) {
        try {
            $query = "SELECT * FROM user WHERE user_id = :id";
            $stmt = $this->sql->prepare($query);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            error_log("Error getting user: " . $e->getMessage());
            return null;
        }
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

} 
