<?php
$search_string='baR';
$searchQuery = array(
            '$or' => array(
                array(
                    'user_name' => new MongoRegex("/^$search_string/i"),
                    ),
                array(
                    'company_name' => new MongoRegex("/^$search_string/i"),
                    ),
                )
            );

$cursor = $customers->find($searchQuery);
?>
