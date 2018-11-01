--создание базы данных если она не создана
CREATE DATABASE IF NOT EXISTS company CHARACTER SET UTF8 collate utf8_bin;

CREATE TABLE IF NOT EXISTS department(
  department_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  department_name VARCHAR(50)
) ENGINE=InnoDB, DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS employee(
  employee_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  name VARCHAR(30) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  patronymic VARCHAR(50) NOT NULL,
  gender ENUM('M', 'F'),
  salary INT
)ENGINE=InnoDB, DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS department_employees(
  dep_emp_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
  dep_id INT,
  emp_id INT
) ENGINE=InnoDB, DEFAULT CHARSET=utf8;

ALTER TABLE department_employees
ADD CONSTRAINT emp_id_constraint
FOREIGN KEY (emp_id) REFERENCES employee(employee_id)
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE department_employees
ADD CONSTRAINT dep_id_constraint
FOREIGN KEY (dep_id) REFERENCES department(department_id)
ON UPDATE CASCADE ON DELETE CASCADE;

INSERT INTO department(department_name) VALUES
('Отдел закуок'),
('Отдел одаж'),
('PR-отдел');

ALTER TABLE department ADD UNIQUE (department_name);

INSERT INTO department(department_name) VALUES
  ('Отдел закуок');

INSERT INTO employee(name, surname, patronymic, gender, salary)
VALUES
('Валерий', 'Андрющенко', 'Геннадьевич', 'M', 30000),
('Вася', 'Пупкин', 'Иванов', 'M', 20000),
('Анна', 'Иванова', 'Ивановна', 'F', 25000),
('Жанна', 'Иванова', 'Ивановна', 'F', 25000),
('Клава', 'Иванова', 'Ивановна', 'F', 18000);

INSERT INTO department_employees(emp_id, dep_id)
VALUES
(1,1),
(1,3),
(2,1),
(2,2),
(3,1),
(3,2),
(4,1);

INSERT INTO department_employees(emp_id, dep_id)
VALUES
(5,1),
(5,2);


INSERT INTO employee(name, surname, patronymic, gender, salary)
VALUES ('Жанна', 'Иванова', 'Ивановна', 'F', 25000),
  ('Клава', 'Иванова', 'Ивановна', 'F', 18000);


SELECT dep.department_name, dep.department_id, COUNT(dep_imp.emp_id) count_employee, MAX(emp.salary) max_salary
FROM department dep
JOIN department_employees dep_imp ON dep_imp.dep_id = dep.department_id
JOIN employee emp ON emp.employee_id = dep_imp.emp_id
GROUP BY dep.department_name, dep.department_id
ORDER BY dep.department_id;

SELECT emp.*, dep.department_name
FROM employee emp
JOIN department_employees dep_emp ON dep_emp.emp_id = emp.employee_id
JOIN department dep ON dep.department_id = dep_emp.dep_id;


