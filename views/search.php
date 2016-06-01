<?php
/**
 * File: search.php
 * User: Dylan Schirino
 * Date: 25/05/16
 * Time: 23:20
 */
$search = $_GET['search'];
echo $search;
    $sql= "
    SELECT *
    FROM author
    WHERE
        firstname LIKE '%{$search}%'
        OR name LIKE '%{$search}%'
";
$pdoSt = $pdoSt->cn->prepare($sql);
$pdoSt->execute([':id' => $id]);
return $pdoSt->fetchAll();
    var_dump($results);

