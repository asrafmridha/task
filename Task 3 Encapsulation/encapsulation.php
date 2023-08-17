<?php
class Employee
{
    private $emp_id;
    private $name;
    private $salary;

    public function __construct($emp_id, $name)
    {
        $this->emp_id = $emp_id;
        $this->name = $name;
        $this->salary = 0; // Initialize with default salary of 0
    }

    // Getter method for employee ID
    public function getEmpId()
    {
        return $this->emp_id;
    }

    // Getter method for employee name
    public function getName()
    {
        return $this->name;
    }

    // Getter method for employee salary
    public function getSalary()
    {
        return $this->salary;
    }

    // Setter method for employee salary
    public function setSalary($salary)
    {
        if ($salary >= 0) {
            $this->salary = $salary;
        } else {
            echo "Salary cannot be negative.";
        }
    }
}

$emp1 = new Employee(1, "John Doe");
$emp2 = new Employee(2, "Jane Smith");

$emp1->setSalary(50000);
$emp2->setSalary(60000);

echo "Employee ID: " . $emp1->getEmpId() . ", Name: " . $emp1->getName() . ", Salary: $" . $emp1->getSalary() . PHP_EOL;
echo "Employee ID: " . $emp2->getEmpId() . ", Name: " . $emp2->getName() . ", Salary: $" . $emp2->getSalary() . PHP_EOL;
