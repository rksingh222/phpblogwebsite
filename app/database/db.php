<?php
session_start();

require('connect.php');

/* when you are printing its dying be careful  call this when you do not require any more functions to work*/
function dd($value)
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQuery($sql, $data)
{

    global $conn;

    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();


    return $stmt;
}


function selectAll($table, $conditions = [])
{

    global $conn;

    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {

        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i == 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $stmt = executeQuery($sql, $conditions);

        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i == 0) {
            $sql = $sql . " WHERE $key=?";
        } else {
            $sql = $sql . " AND $key=?";
        }
        $i++;
    }

    $sql = $sql . " LIMIT 1";

    $stmt = executeQuery($sql, $conditions);

    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function create($table, $data)
{
    global $conn;

    /* $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?" */

    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }



    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;

    return $id;
}

function update($table, $id, $data)
{
    global $conn;

    /* $sql = "UPDATE users SET username=?, admin=?, email=?, password=? WHERE id=?"*/

    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    
    $sql = $sql . " WHERE id=?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);

    return $stmt->affected_rows;
}

function delete($table, $id)
{
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";
    $stmt = executeQuery($sql, ['id' => $id]);

    return $stmt->affected_rows;
}


function getPublishedPost(){
    /* select * from posts where published = 1 */
    $sql = "SELECT p.*,u.username FROM posts AS p JOIN users AS u ON u.id=p.user_id WHERE p.published=?";

    $stmt = executeQuery($sql, ["published" => 1]);

    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchPost($term){
    $match = '%' . $term . '%';
    $sql = "SELECT p.*,u.username FROM posts AS p JOIN users as u ON u.id=p.user_id WHERE p.published=? AND p.title LIKE ? OR p.body LIKE ?";
    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);

    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function getPostsByTopicId($id){
    $sql = "SELECT p.*,u.username FROM posts AS p JOIN users AS u ON u.id=p.user_id WHERE p.published=? AND p.topic_id=?";
    $stmt = executeQuery($sql,['published' => 1, 'topic_id' => $id]);
    
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

//function insert($table,$data){
    /*global $conn;

    $name = $data['title'];
    $description = $data['description'];
    $sql = "INSERT INTO topics (name, description) VALUES ('".$name."','".$description."')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }*/

    /*global $conn; */

    /* $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?" */

    /* $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . "$key=?";
        } else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }

    

   if($stmt = $conn->prepare($sql))
   {
    $values = array_values($data);
    $types = str_repeat('s', 2);
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    $id = $stmt->insert_id;
    echo $id;

   }
   else{
    $error = $conn->errno . ' ' . $conn->error;
    echo $error; 
   } */

   

    /*$stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;*/


    //return $id;
//}




/*$data = [
    'admin' => 1,
    'username' => 'Rahulhack',
    'email' => 'hack@hack.com',
    'password' => 'hack'
];

$id =  delete('users', 3);
dd($id); */

/*insert();*/

/*function updateQuery($table, $id, $data)
{
    global $conn;

    $published = $data['published'];
    $sql = "UPDATE posts SET published=$published WHERE id=$id";
     UPDATE posts SET published=0 WHERE id=7 
    dd($sql); 
    
    $sql = "UPDATE posts SET published='".$published."' WHERE id='".$id."'";
  
    dd($sql);
    UPDATE posts SET published='0' WHERE id='7'
    UPDATE posts SET published='0' where id='7'; working
   
    if (mysqli_query($conn, $sql)) {
        echo "record update sucessfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


}*/