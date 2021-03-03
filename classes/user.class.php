<?php

include_once 'dbh.class.php';

class User extends Dbh
{
    public function createUser($voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip)
    {
        $sql = "INSERT INTO register(voornaam, achternaam, email, wachtwoord, adres, plaats, zip) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip]);
        header('location: login.php');
    }

    public function emptyInputLogin($email, $wachtwoord)
    {
        if (empty($email) || empty($wachtwoord)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function loginUser($voornaam, $wachtwoord)
    {
        $wachtwoord = $_POST['wachtwoord'];
        $sql = "SELECT * FROM register WHERE voornaam = ? AND wachtwoord = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$voornaam, $wachtwoord]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['voornaam']) {
            if ($user['wachtwoord']) {
                header('location: index.php');
            }
        } else {
            header('location: login.php?error=verkeerdelogin');
        }
    }
}