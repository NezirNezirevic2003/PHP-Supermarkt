<?php

include_once 'dbh.class.php';

class Beheerder extends Dbh
{
    public function deleteCategorie($categorieid)
    {
        $sql = "DELETE FROM categorieen WHERE categorieid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$categorieid]);
        header('location: categoriegegevens.php');
    }

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

    public function updateCategorie($categorienaam, $categorieid)
    {
        $sql = "UPDATE categorieen SET categorienaam = ? WHERE categorieid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$categorienaam, $categorieid]);
        header('location: categoriegegevens.php');
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

    public function deleteProduct($artikelnr)
    {
        $sql = "DELETE FROM product WHERE artikelnr = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$artikelnr]);
        header('location: productgegevens.php');
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