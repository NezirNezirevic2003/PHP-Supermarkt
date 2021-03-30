<?php
include "./count.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Supermarkt</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top: 0; z-index: 1000;">
        <div class="container">
            <a class="navbar-brand" href="index.php">Supermarkt</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Hoofdpagina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registreer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="beheerder.php">Beheerder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productZoeken.php">Zoeken</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categorieen
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="groentefruit.php">Groenten, fruit</a>
                            <a class="dropdown-item" href="vleesviskip.php">Vlees, vis en kip</a>
                        </div>
                    </li>
                </ul>
                <div>
                    <?php if (isset($_SESSION['voornaam'])) {
                        echo "<a href='dashboardKlant.php' class='btn btn-outline-primary mr-2'>$_SESSION[voornaam]</a>";
                        echo "<a href='uitloggen.php' class='btn btn-outline-danger mr-2'>Uitloggen</a>";
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['gebruikersnaam'])) {
                        echo "<a href='dashboardBeheerder.php' class='btn btn-outline-primary mr-2'>$_SESSION[gebruikersnaam]</a>";
                        echo "<a href='uitloggen.php' class='btn btn-outline-danger mr-2'>Uitloggen</a>";
                    }
                    ?>
                </div>
            </div>
            <div>
                <a href="winkelmand.php" class="btn btn-outline-success">Winkelmand (<?php echo $count; ?>)</a>
            </div>
        </div>

    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>