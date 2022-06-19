<?php

require('connect.php');

/* when you are printing its dying be careful  call this when you do not require any more functions to work*/
function dd($value){
    echo "<pre>" , print_r($value,true) , "</pre>" ;
    die();
}

function executeQuery($sql, $data){

    global $conn;

    echo "test";
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    if($stmt->execute()){
        echo "New record created";
    }
    else{
        echo "unable to create record";
    }


    return $stmt;
}


function selectAll($table, $conditions = []){

    global $conn;

    $sql = "SELECT * FROM $table";
    if(empty($conditions))
    {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;

    }else{

        $i = 0;
        foreach ($conditions as $key => $value) {
            if($i == 0){
                $sql = $sql . " WHERE $key=?";
            }else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $stmt = executeQuery($sql, $conditions);

        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;

    }
}

function selectOne($table, $conditions){
    global $conn;
    $sql = "SELECT * FROM $table";
    
    $i = 0;
    foreach ($conditions as $key => $value) {
            if($i == 0){
                $sql = $sql . " WHERE $key=?";
            }else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";

        $stmt = executeQuery($sql, $conditions);

        $records = $stmt->get_result()->fetch_assoc();
        return $records;

    
}

function create($table, $data){
    global $conn;

    /* $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?" */

    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if($i === 0){
            $sql = $sql . "$key=?";
        }else{
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
   
    dd($id);
    return $id;
}

function update($table, $id, $data){
    global $conn;

    /* $sql = "UPDATE users SET username=?, admin=?, email=?, password=? WHERE id=?"*/

    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if($i === 0){
            $sql = $sql . "$key=?";
        }else{
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    
    return $stmt->affected_rows;
}

function delete($table, $id){
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";
    $stmt = executeQuery($sql, ['id' => $id]);

    return $stmt->affected_rows;
}

/*
function insert(){
    global $conn;

    $sql = "INSERT INTO users (admin, username, email, password) VALUES (1, 'Singh', 'singh@singh.com', 'singh')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
*/



$data = [
    'admin' => 1,
    'username' => 'Rahulhack',
    'email' => 'hack@hack.com',
    'password' => 'hack'
];

$id =  delete('users', 3);
dd($id);

/*insert();*/

?>