<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "radar";


 //Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 //Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO radar_biases(username,password,DS_ID,RANGE_BIAS_FIXED,RANGE_BIAS_INIT_M,RANGE_BIAS_CALC_M,RANGE_BIAS_QUAL_M
,RANGE_GAIN_FIXED,RANGE_GAIN_INIT,RANGE_GAIN_CALC
,AZIMUTH_BIAS_FIXED,AZIMUTH_BIAS_INIT_DEG,AZIMUTH_BIAS_CALC_DEG,AZIMUTH_BIAS_QUAL_DEG,
ECCENTRICITY_FIXED,ECC_VALUE_INIT_DEG,ECC_VALUE_CALC_DEG,ECC_VALUE_QUAL_DEG,ECC_ANGLE_INIT_DEG,ECC_ANGLE_CALC_DEG
,TIME_OFFSET_FIXED,TIME_OFFSET_INIT_S,TIME_OFFSET_CALC_S,BIAS_COPIED_FROM)
VALUES
('eftixios','sql',1,'f',39.98483,100.07645,7.58783,'f',1.00146,1.00021,'f',-3.17871,-3.25416,0.00000,'f',0.00000,0.00000,0.0000,0.00000,0.00000,'f',0.00000,0.00000,'P')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>



