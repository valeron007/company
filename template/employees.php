<?php

use \Company\Employee;

include "essence/connect.php";
include "company/Employee.php";

$employee = new Employee();

$employees = $employee->getAllInformation();

?>

<div class="container employees">
	<table class="table table-striped">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Имя</th>
			<th scope="col">Фамиия</th>
			<th scope="col">Отчество</th>
			<th scope="col">Пол</th>
			<th scope="col">Зароботная лата</th>
			<th scope="col">Отделы</th>
		</tr>
		</thead>
		<tbody>
		<?
			foreach ($employees as $employee){
			    $departments = implode($employee['departments'], ',');

				echo "<tr class=''>
						<th scope='row'>" . $employee['employee_id'] . "</th>
						<td>" . $employee['name'] . "</td>
						<td>" . $employee['surname'] . "</td>
						<td>" . $employee['patronymic'] . "</td>
						<td>" . $employee['gender'] . "</td>
						<td>" . $employee['salary'] . "</td>						
						<td>" . $departments . "</td>
						<td><button type=\"button\" class=\"btn btn-primary\">Edit</button></td>
						<td><button type=\"button\" class=\"btn btn-danger\" data-id=" . $employee['employee_id'] . ">Delete</button></td>
					  </tr>";
			}
		?>
		</tbody>
	</table>
    <button type="button" class="btn btn-primary employee-add">Add</button>
    <div class="modal-employee" title="Добавение сотрудника">
        <div class="container">
                <form id="employee-added">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Имя</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Имя">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSurname">Фамилия</label>
                            <input type="text" class="form-control" id="inputSurname" placeholder="Фамилия">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPatronymic">Отчество</label>
                        <input type="text" class="form-control" id="inputPatronymic" placeholder="Отчество">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputDepartment">Выберите отдел</label>
                            <select multiple class="form-control" id="inputDepartment">

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputSalary">Зарпата</label>
                            <input type="text" class="form-control" id="inputSalary">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputGender">Выберите пол</label>
                            <select id="inputGender" class="form-control">
                                <option value="M">Мужской</option>
                                <option value="F">Женский</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary add-employee">Добавить</button>
                    <button type="button" class="btn btn-danger model-close">Закрыть</button>
                </form>

        </div>
    </div>
</div>
