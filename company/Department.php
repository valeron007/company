<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 08.10.18
 * Time: 0:00
 */

namespace Company;

use Connect;
use PDOException;
use function var_dump;

class Department
{
	private $db = null;
	private $connect = null;
	public function __construct(){
		$this->db = Connect::getInstance();
		$this->connect = $this->db->getConnection();
	}

	public function getDepartments(){
		$query = "SELECT * FROM department ORDER BY department_id";
		$department = $this->connect->query($query);
		return $department->fetchAll();
	}

	public function getDepartment(){
		$query = "
			SELECT dep.department_name, dep.department_id, COUNT(dep_imp.emp_id) count_employee, MAX(emp.salary) max_salary
			FROM department dep
			LEFT JOIN department_employees dep_imp ON dep_imp.dep_id = dep.department_id
			LEFT JOIN employee emp ON emp.employee_id = dep_imp.emp_id
			GROUP BY dep.department_name, dep.department_id
			ORDER BY dep.department_id";
		$department = $this->connect->query($query);
		return $department->fetchAll();
	}

	public function department_add(Array $department){
		try{
			$query = "INSERT INTO department(department_name) VALUES (:name)";
			$department_db = $this->connect->prepare($query);
			$department_db->bindParam(':name', $department['name']);
			$department_db->execute();
		}catch (PDOException $pdo){
			return array('error' => $pdo->getMessage());
		}

		$dep_id = $this->connect->lastInsertId();
		return array("success" => $dep_id);
	}


	public function deleteDepartment($id){

	}

}
