<?php
    require 'vendor\autoload.php'; 
    $client = new MongoDB\Client;
    $companydb = $client->hrmis;
    // Enter collection name here
    $empcollection = $companydb->empcollection;

    $skill = ""; // Add skill name here
    $result = $empcollection->findOne(array('communicationSkill' => $skill));

    $filename = $result['communicationSkill'];
    $array = $fields = array(); $i = 0;
    $handle = @fopen($filename, "r");
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
        if (!feof($handle)) {
            echo "Error: unexpected fgets() fail\n";
        }
        fclose($handle);
    }

?>