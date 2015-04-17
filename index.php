<?php
include "head.php";
include "settings.php";
// Datenbank Verbindung Aufbauen
$conn= new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("<p>Datenbankverbindung  ".  $dbname .  " fehlgeschlagen Fehler: " . $conn->connect_error . "</p>");
}
echo "<p>Datenbankverbindung  ".  $dbname .  " erfolgreich hergestellt</p>";

$sql = "SELECT * FROM hardware";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {
            echo "<h1>Hardware Tabelle</h1>";
            echo "<table><tr><th>ID</th><th>Name</th><th>Type</th><th>IP</th></tr>";
                while($row = $result->fetch_assoc()) {
                        echo    "<tr><td>"
                                .$row["id"]
                                ."</td><td>"
                                .$row["name"]
                                ."</td><td>"
                                .$row["type"]
                                ."</td><td>"
                                .$row["ip"]
                                ."</tr>";
        }
    echo "</table>";
} else {
        echo "0 results";
}

//DB Verbindung schließen
$conn->close();
echo "<p>Datenbankverbindung  ".  $dbname .  " geschlossen!</p>";
?>
</body>
</html>
