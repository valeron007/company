<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 12.10.18
 * Time: 2:34
 */

use \Company\Employee;

include "essence/connect.php";
include 'company/Employee.php';

$employee = new Employee();

echo json_encode($employee->delete($_GET['delete_id']));

