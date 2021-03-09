<?php
include "./includes/autoload.inc.php";
include "./templates/header.php";
include "./templates/footer.php";
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
                        <th>Klantid</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Email</th>
                        <th>Wachtwoord</th>
                        <th>Adres</th>
                        <th>Plaats</th>
                        <th>Zip</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    $klanten = new Klant();
                    foreach ($klanten->getKlanten() as $klant) { ?>
                    <tr>
                        <td><?php echo $klant['klantid']; ?></td>
                        <td><?php echo $klant['voornaam']; ?></td>
                        <td><?php echo $klant['achternaam']; ?></td>
                        <td><?php echo $klant['email']; ?></td>
                        <td><?php echo $klant['wachtwoord']; ?></td>
                        <td><?php echo $klant['adres']; ?></td>
                        <td><?php echo $klant['plaats']; ?></td>
                        <td><?php echo $klant['zip']; ?></td>
                        <td>
                            <a href="editKlantgegevens.php?klantid=<?php echo $klant['klantid']; ?>"
                                class="btn btn-success" role="button"><i style="margin-right: 4px"
                                    class="fas fa-pen"></i>Update</a>
                        </td>
                        <td>
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