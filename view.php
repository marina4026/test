<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>username</th><th>password</th><th>DS_ID</th><th>RADAR_MODE</th><th>RANGE_BIAS_FIXED</th><th>RANGE_BIAS_INIT_M</th><th>RANGE_BIAS_CALC_M</th><th>RANGE_BIAS_QUAL_M</th><th>RANGE_GAIN_FIXED</th><th>RANGE_GAIN_INIT</h><th>RANGE_GAIN_CALC</th><th>AZIMUTH_BIAS_FIXED</th><th>AZIMUTH_BIAS_INIT_DEG</th><th>AZIMUTH_BIAS_CALC_DEG</th><th>AZIMUTH_BIAS_QUAL_DEG</th><th>ECCENTRICITY_FIXED</th><th>ECC_VALUE_INIT_DEG</th><th>ECC_VALUE_CALC_DEG</th><th>ECC_VALUE_QUAL_DEG</th><th>ECC_ANGLE_INIT_DEG</th><th>ECC_ANGLE_CALC_DEG</th>
<th>TIME_OFFSET_FIXED</th><th>TIME_OFFSET_INIT_S</th><th>TIME_OFFSET_CALC_S</th><th>TIME_OFFSET_QUAL_S</th><th>BIAS_COPIED_FROM</th></tr>"; 

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "radar";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, username,password,DS_ID,RADAR_MODE,RANGE_BIAS_FIXED,RANGE_BIAS_INIT_M,RANGE_BIAS_CALC_M,RANGE_BIAS_QUAL_M,RANGE_GAIN_FIXED,RANGE_GAIN_INIT,RANGE_GAIN_CALC,AZIMUTH_BIAS_FIXED,AZIMUTH_BIAS_INIT_DEG,AZIMUTH_BIAS_CALC_DEG,AZIMUTH_BIAS_QUAL_DEG,ECCENTRICITY_FIXED,ECC_VALUE_INIT_DEG,ECC_VALUE_CALC_DEG,ECC_VALUE_QUAL_DEG,ECC_ANGLE_INIT_DEG,ECC_ANGLE_CALC_DEG,TIME_OFFSET_FIXED,TIME_OFFSET_INIT_S,TIME_OFFSET_CALC_S,TIME_OFFSET_QUAL_S,BIAS_COPIED_FROM FROM radar_biases ");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 
<?php



