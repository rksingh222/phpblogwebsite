<?php

 function validateTopic($topic){

    $errors = array();

    if(empty($topic['name']))
    {
        array_push($errors, 'name is required');
    }

    $existingTopic = selectOne('topics',['name' => $topic['name']]);  

    if($existingTopic){
        array_push($errors, "name already exists");
    }

    return $errors;
 }
