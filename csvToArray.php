<?php
$array = $fields = array(); $i = 0;
$handle = @fopen("weather.csv", "r");
if ($handle) {
    while (($row = fgetcsv($handle, 4096)) !== false) {
        if (empty($fields)) {
            $fields = $row;
            continue;
        }
        foreach ($row as $k=>$value) {
            
            $array[$i][$fields[$k]] = $value;
            
        }
        $i++;
        
    }
    print("<pre>".print_r($array,true)."</pre>");
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
?>