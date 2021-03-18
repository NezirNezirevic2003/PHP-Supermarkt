<?php

include_once 'dbh.class.php';

class Beheerder extends Dbh
{
    public function getCategorieen()
    {
        $sql = "SELECT * FROM categorieen";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function editCategorie($categorieid)
    {
        $sql = "SELECT * FROM categorieen WHERE categorieid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$categorieid]);
        $result = $stmt->fetch();
        return $result;
    }

    public function createCategorie($categorienaam)
    {
        $sql = "INSERT INTO categorieen(categorienaam) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$categorienaam]);
        header('location: categoriegegevens.php');
    }

    public function getProducten()
    {
        $sql = "SELECT * FROM product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function createMedewerker($voornaam, $achternaam, $functie, $salaris)
    {
        $sql = "INSERT INTO medewerkers(voornaam, achternaam, functie, salaris) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$voornaam, $achternaam, $functie, $salaris]);
        header('location: medewerkers.php');
    }

    public function getMedewerkers()
    {
        $sql = "SELECT * FROM medewerkers";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function editMedewerker($medewerkerid)
    {
        $sql = "SELECT * FROM medewerkers WHERE medewerkerid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$medewerkerid]);
        $result = $stmt->fetch();
        return $result;
    }

    public function updateMedewerker($voornaam, $achternaam, $functie, $salaris, $medewerkerid)
    {
        $sql = "UPDATE medewerkers SET voornaam = ?, achternaam = ?, functie = ?, salaris = ? WHERE medewerkerid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$voornaam, $achternaam, $functie, $salaris, $medewerkerid]);
        header('location: medewerkers.php');
    }

    public function deleteMedewerker($medewerkerid)
    {
        $sql = "DELETE FROM medewerkers WHERE medewerkerid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$medewerkerid]);
        header('location: medewerkers.php');
    }

    public function emptyInputLoginBeheerder($gebruikersnaam, $wachtwoord)
    {
        if (empty($gebruikersnaam) || empty($wachtwoord)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function loginBeheerder($gebruikersnaam, $wachtwoord)
    {
        $wachtwoord = $_POST['wachtwoord'];
        $sql = "SELECT * FROM beheerder WHERE gebruikersnaam = ? AND wachtwoord = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$gebruikersnaam, $wachtwoord]);

        $beheerder = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($beheerder['gebruikersnaam']) {
            if ($beheerder['wachtwoord']) {
                header('location: dashboardBeheerder.php');
            }
        } else {
            header('location: login.php?error=verkeerdelogin');
        }
    }
}