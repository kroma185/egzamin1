<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'ee09';

$conn = mysqli_connect($server, $username, $password, $database);
if (mysqli_connect_error()) {
    printf('Błąd połączenia', mysqli_connect_error());
    exit(1);
}
else{
    printf("Połączenie udane");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numer = $_POST['numer'];
        $pierwszy = $_POST['pierwszy'];
        $drugi = $_POST['drugi'];
        $trzeci = $_POST['trzeci'];

        $sql = "INSERT INTO ratownicy (nrKaretki, ratownik1, ratownik2, ratownik3) VALUES ('$numer', '$pierwszy', '$drugi', '$trzeci');";

        if (mysqli_query($conn, $sql)) {
            echo "Do bazy zostało wysłane zapytanie: ".$sql;
       } else {
            echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
       }
       mysqli_close($conn);
    ?>
</body>
</html>