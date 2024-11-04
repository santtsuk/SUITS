
<?php

function dadosFunc(){
    include "config.php";
    $rs = "SELECT * FROM funcionarios";
    $query = $mysqli->query($rs);

    return ($query);

}
?>