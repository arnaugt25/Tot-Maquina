<?php

namespace App\Models;

class Users extends DB {
    public function login($username, $password) {
        try {
            $query = "SELECT user_id, name, surname, username, password, role FROM User WHERE username = :username";
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

    public function register($data) {
        try {
            $query = "INSERT INTO User (name, surname, username, password, role) 
                      VALUES (:name, :surname, :username, :password, :role)";
            
            $stmt = $this->sql->prepare($query);
            $result = $stmt->execute([
                ':name' => $data['name'],
                ':surname' => $data['surname'],
                ':username' => $data['username'],
                ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
                ':role' => $data['role'] ?? 'user'
            ]);

            if (!$result) {
                throw new \Exception("Error al registrar el usuario");
            }
            
            return $this->sql->lastInsertId();
            
        } catch (\PDOException $e) {
            error_log("Error registering user: " . $e->getMessage());
            throw new \Exception("Error al registrar el usuario");
        }
    }
    public function editProfile($data) {
        try {
            $query = "UPDATE User SET name = :name, surname = :surname, email = :email";
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

} 

