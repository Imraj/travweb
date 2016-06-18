<?php

  $results = array();

  $result = array();
  $result["name"] = "Test";
  array_push($results,$result);

  $result = array();
  $result["name"] = "Abc";
  array_push($results,$result);


  echo json_encode($results);

 ?>
