<?php
$db = new mysqli('localhost', 'root', '', 'lpbaitulquranalkautsar');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

$updates = [
    "UPDATE galeri SET gambar = 'sample1.jpg' WHERE id = 1",
    "UPDATE galeri SET gambar = 'sample2.jpg' WHERE id = 2", 
    "UPDATE galeri SET gambar = 'sample3.jpg' WHERE id = 3",
    "UPDATE galeri SET gambar = 'sample1.jpg' WHERE id = 4",
    "UPDATE galeri SET gambar = 'sample2.jpg' WHERE id = 5",
    "UPDATE galeri SET gambar = 'sample3.jpg' WHERE id = 6"
];

foreach ($updates as $query) {
    if ($db->query($query)) {
        echo "Updated successfully\n";
    } else {
        echo "Error: " . $db->error . "\n";
    }
}

$db->close();
echo "Data galeri berhasil diupdate dengan gambar sample\n";
?>
