<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 21.10.18
 * Time: 10:43
 */


use \Company\Department;

include "essence/connect.php";
include "company/Department.php";

$department = new Department();

echo json_encode($department->getDepartments());



