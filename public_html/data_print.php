<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
try {
    $mongo = new MongoDB\Driver\Manager("mongodb://root:example@bdd_nosql:27017/fitness_db?authSource=admin");

    $filter = [];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $mongo->executeQuery("fitness_db.fitness_data", $query);
    $result = [];
    foreach ($cursor as $document) {
        $infos_inventeur = [];
        $entry = json_decode(json_encode($document), true);
        unset($entry["_id"]);
        foreach ($entry as $key => $value){
            $infos_inventeur[$key] = $value;
        }
        array_push($result, $infos_inventeur);
    }

    // foreach($result)
    // foreach($result as $cell){
    //     echo ;
    // }
    // var_dump($result[0]);
    $les_titres = array();
    echo "<table>";
    foreach($result[0] as $key => $val) {
        // echo '<h1>'.$key.'</h1>';
        // echo '<ul>';
        echo "<tr>".$key;
        foreach($val as $data) {
            echo "<td>".$data."</td>";
        //     echo '<li>'.$data.'</li>';
        }
        // echo '</ul>';
        echo "</tr>";
        echo $key;
    }
    echo "</table>";
}
catch (Exception $e) {
    echo 'Message: ' .$e->getMessage();
}
?>
</body>
</html>
