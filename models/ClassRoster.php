<?php

namespace Models;
use \PDO;

class ClassRoster
{
    protected $id;
    protected $code;
    protected $student_number;
    protected $connection;

    public function __construct($code, $student_number)
    {
        $this->code = $code;
        $this->student_number = $student_number;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getStudentNumber()
    {
        return $this->student_number;
    }
    public function setConnection($connection)
    {
        return $this->connection = $connection;
    }
    public function save()
    {
        try {
            $sql ="INSERT INTO class_rosters SET name=:name, description=description, code:code";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $code,
                $student_number,
                $this->getID()
			]);
            $this->code = $code;
            $this->student_number = $student_number;
        } catch (Exeption $e) {
            error_log($e->getMessage());
        }
    }    
    public function delete()
	{
		try {
			$sql = 'DELETE FROM class_rosters WHERE id=?';
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
            $sql = 'SELECT * FROM class_rosters';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        }catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}