<?php
        require 'vendor\autoload.php'; 
        $client = new MongoDB\Client;
        $companydb = $client->hrmis;
        $empcollection = $companydb->filecollection;
    $documentlist = $empcollection->find([]);
    foreach($documentlist as $doc)
    {
        $name=var_dump($doc)['filename'];
        $pdf= $doc['fileaddress'];
    }
    
echo '<h1>Here is the information PDF'.$name.'</h1>';
echo '<strong>Created Date : </strong>';
?>
<br/><br/>
<img src="<?php echo $pdf; ?>" width="90%" height="500px">