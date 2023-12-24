<?php
include("../../server/control.php");
$link = new mysqli("localhost", "dbx", "dbx.0000", "101m");
$baglanti1 = new mysqli("localhost", "dbx", "dbx.0000", "135mgsm");
mysqli_query($link,"SET CHARACTER SET 'utf8'");


ini_set("display_errors", 0);
error_reporting(0);

if (isset($_POST)) {
    $tc = htmlspecialchars($_POST["tc"]);
    $sql = "SELECT * FROM 101m WHERE TC='$tc'";
    $result = $link->query($sql);

    $resultarray = array();
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["TC"] . "</td>
            <td>" . $row["ADI"] . "</td>
            <td>" . $row["SOYADI"] . "</td>
            <td>" . $row["DOGUMTARIHI"] . "</td>
            <td>" . $row["ANNEADI"] . "</td>
            <td>" . $row["ANNETC"] . "</td>
            <td>" . $row["BABAADI"] . "</td>
            <td>" . $row["BABATC"] . "</td>
            <td>" . $row["NUFUSIL"] . "</td>
            <td>" . $row["NUFUSILCE"] . "</td>
            <td>" . $row["UYRUK"] . "</td>
        
        ";
        $torunusql = "SELECT * FROM gsm WHERE TC = '".$row["TC"]."' LIMIT 1";
        $torunuresult = $baglanti1->query($torunusql);

         while ($row = $torunuresult->fetch_assoc()) {

        echo "
        <td>" . $row["GSM"] . "</td>
        </tr>";
        

    }

    
    }

    if ($result->num_rows < 0 ) {
        echo false;
    }
} else {
    echo false;
}
?>
