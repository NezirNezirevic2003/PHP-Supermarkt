<?php

include_once 'dbh.class.php';

class Klant extends Dbh
{
    public function createKlant($voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip)
    {
        $sql = "INSERT INTO klantgegevens(voornaam, achternaam, email, wachtwoord, adres, plaats, zip) VALUES (?, ?, ?, ?, ?, ?, ?)";
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

    public function loginKlant($voornaam, $wachtwoord)
    {
        $wachtwoord = $_POST['wachtwoord'];
        $sql = "SELECT * FROM klantgegevens WHERE voornaam = ? AND wachtwoord = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$voornaam, $wachtwoord]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['voornaam']) {
            if ($user['wachtwoord']) {
                header('location: dashboardKlant.php');
            }
        } else {
            header('location: login.php?error=verkeerdelogin');
        }
    }
}