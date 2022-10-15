<?php

namespace Models;
use \PDO;

class Teacher
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $contact;
    protected $employee_number;


    public function __construct($first_name, $last_name, $email, $contact, $employee_number)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->contact = $contact;
        $this->employee_number = $employee_number;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getFirstName()
    {
        return $this->first_name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getContact()
    {
        return $this->contact;
    }
    public function getEmployeeNumber()
    {
        return $this->employee_number;
    }
    public function setConnection($connection)
    {
        return $this->connection = $connection;
    }
    public function save()
    {
        try {
            $sql = "INSERT INTO teachers SET first_name=:first_name, last_name=:last_name, email=:email, contact=:contact, employee_number=:employee_number";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $first_name,
                $last_name,
                $email,
                $contact,
                $employee_number,
                $this->getID()
			]);
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->contact = $contact;
            $this->employee_number = $employee_number;
        } catch (Exeption $e) {
            error_log($e->getMessage());
        }
    }    
    public function delete()
	{
		try {
			$sql = 'DELETE FROM teachers WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
    }
    public function getAll()
    {
        try{
            $sql = 'SELECT * FROM teachers';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        }catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}