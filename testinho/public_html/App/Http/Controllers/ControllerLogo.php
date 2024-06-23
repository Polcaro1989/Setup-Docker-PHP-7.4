<?php
$rt = mysqli_query($con, "SELECT xfile, ufile, ufile_x,  ux_file FROM logo ORDER BY id DESC LIMIT 10");
$tr = mysqli_fetch_array($rt);
$xfile = $tr['xfile'];
$ufile = $tr['ufile'];
$ux_file = $tr['ux_file'];
$ufile_x= $tr['ufile_x'];
