<?php
$numer = 1;
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'egzamin';

$conn = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_error()) {
    echo 'nie działa'. mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <div>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="z1/obraz1.jpg" alt="boisko">
        </div>
    </header>
    <div class="dzialaj_pls">
        <?php
            $query = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1='EVG';";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                printf("<div class='mecze'><h3>%s - %s</h3><h4>%s</h4><p>%s</p></div>", $row['zespol1'], $row['zespol2'], $row['wynik'], $row['data_rozgrywki']);
        }
        ?>
        </div>
    <main>
        <h2>Reprezentacja Polski</h2>
    </main>
        <div class="content">
            <div class="left">
                <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
                <form method="post">
                    <input type="number" name="numer" id="numer">
                    <button type="submit">Sprawdź</button>
                </form>
                <ol>
        <?php
            $numer = $_POST['numer'];
            if ($numer != 0) {
            $query = "SELECT imie, nazwisko FROM zawodnik WHERE id='$numer';";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                printf("<li>%s %s</li>", $row['imie'], $row['nazwisko']);
            }
        }
        ?>
            </ol>
            </div>
            <div class="right">
                <img src="z1/zad1a.png" alt="piłkarz">
                <p>Autor: Patryk Kromski 5IA</p>
            </div>
        </div>
</body>
</html>