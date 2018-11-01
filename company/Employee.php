<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 08.10.18
 * Time: 0:01
 */

namespace Company;

use Connect;

class Employee
{
	private $db = null;
	private $connect = null;
	public function __construct(){
		$this->db = Connect::getInstance();
		$this->connect = $this->db->getConnection();
	}

	public function getEmployees()
	{
		$query = "SELECT * FROM employee";
		$employees = $this->connect->query($query);
		return $employees->fetchAll();
	}

	public function addEmployee(Array $employee){
		$query = "";
	}

	public function getDepartmentsEmployee(){
		$query = "SELECT emp.*, dep.*
					FROM employee emp
					JOIN department_employees dep_emp ON dep_emp.emp_id = emp.employee_id
					JOIN department dep ON dep.department_id = dep_emp.dep_id;";
		$employe_departments = $this->connect->query($query);
		$emp_dep = $employe_departments->fetchAll(\PDO::FETCH_ASSOC);

		return $emp_dep;
	}


	public function getAllInformation(){
		$query = "SELECT emp.*, dep.department_name 
					FROM employee emp
					JOIN department_employees dep_emp ON dep_emp.emp_id = emp.employee_id
					JOIN department dep ON dep.department_id = dep_emp.dep_id;";
		$informations = array();
		$employe_department = $this->connect->query($query);
		$informations = $employe_department->fetchAll(\PDO::FETCH_ASSOC);
		$employees = array();
		$del_id = null;
		for ($i = 0; $i < count($informations); $i++){
			$departments = array();
			for ($j = 0; $j < count($informations); $j++){
				if($informations[$i]['employee_id'] == $informations[$j]['employee_id']){
					$departments[] = $informations[$j]['department_name'];
				}
			}
			if(array_search($informations[$i]['employee_id'], array_column($employees, 'employee_id')) === FALSE){
				$informations[$i]['departments'] = $departments;
				$employees[] = $informations[$i];
			}
		}
		return $employees;
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function delete($id){
		try{
			$query = 'DELETE FROM `employee` WHERE employee_id = :id';
			$del_employee = $this->connect->prepare($query);
			$del_employee->execute(['id' => $id]);
			return array('success' => true);
		}catch (PDOException $exception){
			return array('error' => "Ошибка при удалении сотрудника" . $exception->getMessage());
		}

	}

}

