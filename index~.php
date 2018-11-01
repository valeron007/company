<?php

include "essence/connect.php";
include "company/Employee.php";

//$database = Connect::getInstance();
//$query = "select * from employee";
//$db = $database->getConnection();
//$employees = $db->query($query);
//
//while ($employe = $employees->fetch()){
//	var_dump($employe);
//}

$employee = new Employee();
$department_employee = $employee->getAllInformation();

var_dump($department_employee);

