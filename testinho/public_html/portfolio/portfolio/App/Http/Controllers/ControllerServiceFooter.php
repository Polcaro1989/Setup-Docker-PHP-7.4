<?php
   $q="SELECT * FROM  service ORDER BY id DESC LIMIT 5";
 $r123 = mysqli_query($con,$q);

while($ro = mysqli_fetch_array($r123))
{

	$id="$ro[id]";
	$service_title="$ro[service_title]";

print "
<li class='mb2'><a class='footer-title text-white ' href='servicedetail.php?id=$id'>$service_title</a></li>
";
}
?>