<?php
$bannerItems = getBannerItems($con);

function getBannerItems($con)
{
    $q = "SELECT * FROM banner ORDER BY id DESC";
    $result = mysqli_query($con, $q);
    $items = [];
    $active = true;
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = [
            'id' => $row['id'],
            'banner_title' => $row['banner_title'],
            'banner_text' => $row['banner_text'],
            'ufile' => $row['ufile'],
            'activeClass' => $active ? 'active' : '',
        ];
        $active = false;
    }
} else {
    echo "dados não encontrado.";
}
    return $items;
}
            
        