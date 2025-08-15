<?php

// Classe
class UserModel {
    private $pdo; // Prop da Classe


    // Recebe o pdo como argumento
    public function __construct($pdo) {
        $this->pdo = $pdo; // Guarda na prop da Classe
    }


    // Verifica as credencias no DB
    public function checkLogin($user, $pswd) {

        $sql = "SELECT * FROM users WHERE username = :user LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user', $user, PDO::PARAM_STR);
        $stmt->execute();

        
        //DEBUG
        // $usuario = $stmt->fetch(PDO::PARAM_STR);
        // echo "<pre>Usuário no banco: ";
        // print_r($usuario);
        // echo "</pre>";


        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se achou o user, e a senha bate

        if ($usuario && password_verify($pswd, $usuario['pswd'])) {
            // var_dump($usuario);
            return $usuario;
        }

        return false;
    }


    // verifica se o usuário já existe.
    public function userExists($user) {
        $sql = "SELECT COUNT(*) FROM users WHERE username = :user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user', $user, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Verifica se o email existe.
    public function emailExists($email){
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Da o INSERT do novo usuario no DB.
    public function newUser($user, $pswd, $email) {
        $hash = password_hash($pswd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, pswd, email) VALUES (:user, :pswd, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user', $user, PDO::PARAM_STR);
        $stmt->bindValue(':pswd', $hash, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
