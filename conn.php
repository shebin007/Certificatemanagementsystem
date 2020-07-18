
<?php
    $db_host="localhost";
    $db_user="root";
    $db_password="";
    $db_name="blockchain";
    try{
        $db=new PDO("mysql:host={$db_host};dbname={$db_name}","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e){
        $e->getMessage();

    }
?>
