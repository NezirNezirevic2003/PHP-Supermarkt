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

    // public function emptyInputLogin($voornaam, $achternaam)
    // {
    //     if (empty($voornaam) || empty($wachtwoord)) {
    //         $result = true;
    //     } else {
    //         $result = false;
    //     }
    //     return $result;
    // }

    // // Methode om te checken  of de username in de databse staat als dit zo is check of het matched met het wachtwoord als dat zo is is de user ingelogt.
    // public function loginUser($voornaam, $wachtwoord)
    // {
    //     $wachtwoord = $_POST['wachtwoord'];
    //     $sql = "SELECT * FROM inloggen WHERE voornaam = ? AND wachtwoord = ? ";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->execute([$voornaam, $wachtwoord]);

    //     $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //     // print_r($user);

    //     if ($user['voornaam']) {
    //         if ($user['wachtwoord']) {
    //             header('location: dashboard.php');
    //         }
    //     } else {
    //         header('location: login.php?error=verkeerdelogin');
    //     }
    // }
}