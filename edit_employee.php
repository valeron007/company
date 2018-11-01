<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 15.10.18
 * Time: 1:41
 */

use Company\Employee;

include "essence/connect.php";
include "company/Employee.php";

$employee = new Employee();
$employee->addEmployee($_POST['employee']);


