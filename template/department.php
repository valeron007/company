<?
    use \Company\Department;
	include "essence/connect.php";
	include "company/Department.php";

	$department = new Department();
	$departments = $department->getDepartment();
?>

<table class="table table-sm table-dark">
	<thead>
	<tr>
		<th scope="col">id</th>
		<th scope="col">Название отдела</th>
		<th scope="col">Количество сотрудников</th>
		<th scope="col">Максимальная заработная плата</th>
	</tr>
	</thead>
	<tbody>
	<?
		foreach ($departments as $department){
			echo "<tr>
					<th>" . $department['department_id'] . 		"</th>
					<td>" . $department['department_name'] . 	"</td>
					<td>" . $department['count_employee'] . 	"</td>
					<td>" . $department['max_salary'] . 	"</td>
					<td><button type=\"button\" class=\"btn btn-primary\">Edit</button></td>
					<td><button type=\"button\" class=\"btn btn-danger\">Delete</button></td>
				  </tr>";
		}
	?>
	</tbody>
</table>
<button type="button" class="btn btn-primary department-add">Add</button>
<div class="modal-department" title="Добавение отдела">
    <div class="container">
        <form id="department-added">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputName">Имя</label>
                    <input type="text" class="form-control" id="inputDepartment" placeholder="Имя">
                </div>
            </div>
            <button type="submit" class="btn btn-primary add-department">Добавить</button>
            <button type="button" class="btn btn-danger model-close">Закрыть</button>
        </form>
    </div>
</div>

