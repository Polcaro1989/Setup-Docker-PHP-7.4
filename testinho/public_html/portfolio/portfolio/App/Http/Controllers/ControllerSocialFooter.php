<?php
$follow_text = "Siga-nos nas redes sociais";


$q = "SELECT * FROM social ORDER BY id DESC LIMIT 5";
$r123 = mysqli_query($con, $q);

while ($ro = mysqli_fetch_array($r123)) {
    // Armazenando os dados do banco de dados em variáveis
    $id = $ro['id'];
    $fa = $ro['fa'];
    $social_link = $ro['social_link'];

    // Imprimindo o HTML para cada link social
    ?>
    <li class='list-inline-item px-1'><a href='<?php echo $social_link; ?>'><i class='fab <?php echo $fa; ?>'></i></a></li>
    <?php
}

