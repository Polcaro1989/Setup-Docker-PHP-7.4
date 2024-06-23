<?php

function getBanners($con)
{
    $q = "SELECT * FROM banner ORDER BY id DESC";
    $result = mysqli_query($con, $q);
    $active = true;
    $output = '';

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $banner_title = $row['banner_title'];
        $banner_text = $row['banner_text'];
        $ufile = $row['ufile'];

        $activeClass = $active ? 'active' : '';

        $output .= "
<div class='carousel-item $activeClass' >
    <img src='dashboard/uploads/banner/$ufile' class='d-block' alt=''/>
    <div class='carousel-caption'>
        <h5 mt-4>$banner_title</h5>
        <p>$banner_text</p>
    </div>
</div>
";
        $active = false;
    }

    return $output;
}

echo getBanners($con);
