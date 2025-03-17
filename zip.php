<?php
// Read JSON data from the text file
$file = "zip.txt";
$json_data = file_get_contents($file);
$data_array = json_decode($json_data, true);
$result="";
$starter =isset($_POST['start']) ? $_POST['start'] : '';;
$ending = isset($_POST['end']) ? $_POST['end'] : '';;
$endarry="";
$startarry="";

if(isset($data_array[$starter])){
    $stararray = $data_array[$starter];

}else{
    echo("<p>Empty Value of Starting location.</p><br>");
}
if($data_array[$ending]){
    $endarray = $data_array[$ending];

}else{
    echo("<p>Empty Value of Ending location.</p><br>");
}

$result = harsin($stararray['lat'],$stararray['lon'],$endarray['lat'],$endarray)['lon'];
echo("<h2> The Results are: $result <h2>");


function harsin($lat1,$lon1,$lat2,$lon2){
    $dLat = ($lat2 - $lat1)M_PI / 180.0;
    $dLon = ($lon2 - $lon1)M_PI / 180.0;
    $lat1 = ($lat1) * M_PI / 180.0;
    $lat2 = ($lat2) * M_PI / 180.0;
    $a = pow(sin($dLat / 2), 2) + pow(sin($dLon / 2), 2) cos($lat1) cos($lat2);
$rad = 6371;
$c = 2 * asin(sqrt($a));
return $rad * $c;;
}

?>