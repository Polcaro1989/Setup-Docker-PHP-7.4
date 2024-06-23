<?php 
$whyUsData = getWhyUsData($con);

function getWhyUsData($con)
{
    $q = "SELECT * FROM why_us ORDER BY id DESC LIMIT 10";
    $r123 = mysqli_query($con, $q);

    if (!$r123) {
        die("Error: ". mysqli_error($con));
    }

    $data = [];
    if (mysqli_num_rows($r123) > 0) {
    while ($row = mysqli_fetch_array($r123)) {
        $data[] = $row;
    }
} else {
    echo "Nenhum Why encontrado.";
}
    return $data;
}



