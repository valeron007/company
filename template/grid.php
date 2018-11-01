<?php

use Company\Employee;

include "essence/connect.php";
include "company/Employee.php";

?>

<?
	$employee = new Employee();
	$department_employees = $employee->getDepartmentsEmployee();
	$departments = array();
	$employees = array();
	foreach ($department_employees as $department_employee){
		$departments[] = $department_employee['department_name'];
        $employees[$department_employee['name'] . " "
		.$department_employee['surname']][] = $department_employee['department_name'];
	};
	$departments = array_unique($departments);
	$departments = array_values($departments);
	function getColTable($departments, $search){
		$department_id = array_search($search, $departments);
		$ids = array();
        foreach ($search as $id){
			$ids[] = array_search($id, $departments);
        }
        return $ids;
    }
?>

<div class="container">
	<table class="table table-bordered table-dark">
		<thead>
		<tr>
			<?php
				echo '<th scope="col">#</th>';
				foreach ($departments as $department){
					echo "<th scope=\"col\">" . $department ."</th>";
				}
			?>
		</tr>
		</thead>
		<tbody>
		<?php
//			foreach ($departments as $name => $department_employee){
//				echo "<tr>
//					<th scope='row'>" .
//						$department_employee['name'] . " " .
//						$department_employee['surname'] .
//					"</th>";
//				$department_id = array_search($department_employee['department_name'], $departments);
//				for ($i = 0; $i < count($departments); $i++){
//					$mark = ($i == $department_id) ? '&#10004;' : '';
//					echo "<td>" . $mark . "</td>";
//				}
//			}

            foreach ($employees as $name => $employee){
				echo "<tr><th scope='row'>" . $name . "</th>";
				$ids = getColTable($departments, $employee);
                for ($i = 0; $i < count($departments); $i++){
                    if(in_array($i, $ids)){
						echo "<td>" . '&#10004;' . "</td>";
                    }else{
						echo "<td></td>";
                    }
                }
            }

		?>

		</tbody>
	</table>
</div>
