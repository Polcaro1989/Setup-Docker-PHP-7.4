<?php

function getSliderItems($con) {
    $q = "SELECT * FROM slider ORDER BY id DESC";
    $result = mysqli_query($con, $q);
    $items = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = [
            'id' => $row['id'],
            'slide_title' => $row['slide_title'],
            'slide_text' => $row['slide_text'],
            'video_file' => $row['video_file'],
        ];
    }

    return $items;
}