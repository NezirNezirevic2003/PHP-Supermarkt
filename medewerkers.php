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
            <h3>Medewerkers</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
    <div class="container">
        <a style="margin-top: 20px;" href="medewerkersToevoegen.php" class="btn btn-success" role="button"><i
                style="margin-right: 4px" class="fas fa-plus-square"></i>Toevoegen</a>
    </div>
    <div style="margin-top: 20px;" class="d-flex table-data">
        <div class="container">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Medewerkerid</th>
                        <th class="text-center">Voornaam</th>
                        <th class="text-center">Achternaam</th>
                        <th class="text-center">Functie</th>
                        <th class="text-center">Salaris</th>
                        <th class="text-center">Update</th>
                        <th class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    $medewerkers = new Beheerder();
                    foreach ($medewerkers->getMedewerkers() as $medewerker) { ?>
                    <tr>
                        <td class="text-center"><?php echo $medewerker['medewerkerid']; ?></td>
                        <td class="text-center"><?php echo $medewerker['voornaam']; ?></td>
                        <td class="text-center"><?php echo $medewerker['achternaam']; ?></td>
                        <td class="text-center"><?php echo $medewerker['functie']; ?></td>
                        <td class="text-center"><?php echo $medewerker['salaris']; ?></td>
                        <td class="text-center">
                            <a href="editMedewerkers.php?medewerkerid=<?php echo $medewerker['medewerkerid']; ?>"
                                class="btn btn-primary" role="button"><i style="margin-right: 4px"
                                    class="fas fa-pen"></i>Update</a>
                        </td>
                        <td class="text-center">
                            <a href="medewerker.process.php?medewerkerid=<?php echo $medewerker['medewerkerid']; ?>&send=del"
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