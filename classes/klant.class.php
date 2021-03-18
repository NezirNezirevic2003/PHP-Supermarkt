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

    public function getKlanten()
    {
        $sql = "SELECT * FROM klantgegevens";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function editKlant($klantid)
    {
        $sql = "SELECT * FROM klantgegevens WHERE klantid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$klantid]);
        $result = $stmt->fetch();
        return $result;
    }

    public function updateKlant($voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip, $klantid)
    {
        $sql = "UPDATE klantgegevens SET voornaam = ?, achternaam = ?, email = ?, wachtwoord = ?, adres = ?, plaats = ?, zip = ? WHERE klantid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip, $klantid]);
        header('location: klantgegevens.php');
    }

    public function deleteKlant($klantid)
    {
        $sql = "DELETE FROM klantgegevens WHERE klantid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$klantid]);
        header('location: klantgegevens.php');
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
                header('location: index.php');
            }
        } else {
            header('location: login.php?error=verkeerdelogin');
        }
    }
}