<?php
session_start();

include "./includes/autoload.inc.php";
require_once "./includes/auth.check.beheerder.php";
include "./templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div style="margin-top: 20px">
            <h3>Klantgegevens</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
    <div style="margin-top: 50px;" class="d-flex table-data">
        <div class="container">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Klantid</th>
                        <th class="text-center">Voornaam</th>
                        <th class="text-center">Achternaam</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Wachtwoord</th>
                        <th class="text-center">Adres</th>
                        <th class="text-center">Plaats</th>
                        <th class="text-center">Zip</th>
                        <th class="text-center">Update</th>
                        <th class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    $klanten = new Beheerder();
                    foreach ($klanten->getKlanten() as $klant) { ?>
                    <tr>
                        <td class="text-center"><?php echo $klant['klantid']; ?></td>
                        <td class="text-center"><?php echo $klant['voornaam']; ?></td>
                        <td class="text-center"><?php echo $klant['achternaam']; ?></td>
                        <td class="text-center"><?php echo $klant['email']; ?></td>
                        <td class="text-center"><?php echo $klant['wachtwoord']; ?></td>
                        <td class="text-center"><?php echo $klant['adres']; ?></td>
                        <td class="text-center"><?php echo $klant['plaats']; ?></td>
                        <td class="text-center"><?php echo $klant['zip']; ?></td>
                        <td class="text-center">
                            <a href="editKlantgegevens.php?klantid=<?php echo $klant['klantid']; ?>"
                                class="btn btn-primary" role="button"><i style="margin-right: 4px"
                                    class="fas fa-pen"></i>Update</a>
                        </td>
                        <td class="text-center">
                            <a href="klant.process.php?klantid=<?php echo $klant['klantid']; ?>&send=del"
                                class="btn btn-danger" role="button" aria-pressed="true"><i style="margin-right: 4px"
                                    class="fas fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    </div>
</body>

</html>