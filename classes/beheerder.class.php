<?php

include_once 'dbh.class.php';

class Beheerder extends Dbh
{
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