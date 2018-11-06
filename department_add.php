<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 04.11.18
 * Time: 1:12
 */

use Company\Department;

include "essence/connect.php";
include "company/Department.php";

$department = new Department();
echo json_encode($department->department_add($_POST['department']));


