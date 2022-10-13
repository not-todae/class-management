<?php

namespace Models;
use \PDO;

class Student
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $student_number;
    protected $email;
    protected $contact;
    protected $program;
    protected $connection;

    public function __construct($first_name, $last_name, $student_number, $email, $contact, $program)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->student_number = $student_number;
        $this->email = $email;
        $this->contact = $contact;
        $this->program = $program;

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
    public function getStudentNumber()
    {
        return $this->student_number;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getContact()
    {
        return $this->contact;
    }
    public function getProgram()
    {
        return $this->program;
    }
    public function setConnection($connection)
    {
        return $this->connection = $connection;
    }
    public function save()
    {
        try {
            $sql = "INSERT INTO students SET first_name=:first_name, last_name=:last_name, student_number=:student_number, email=:email, contact=:contact";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $first_name,
                $last_name,
                $student_number,
                $email,
                $contact,
                $program,
                $this->getID()
			]);
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->student_number = $student_number;
            $this->email = $email;
            $this->contact = $contact;
            $this->program = $program;
        } catch (Exeption $e) {
            error_log($e->getMessage());
        }
    }
    public function update($first_name, $last_name, $contact)
	{
		try {
			$sql = 'UPDATE classes SET first_name=?, last_name=?, contact=? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
                $first_name,
                $last_name,
                $contact,
                $this->getID()

			]);
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->contact = $contact;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}    
    public function delete()
	{
		try {
			$sql = 'DELETE FROM students WHERE id=?';
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
            $sql = 'SELECT * FROM students';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        }catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}