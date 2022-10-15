<?php

namespace Models;
use \PDO;

class Classes
{
    protected $id;
    protected $name;
    protected $description;
    protected $code;
    protected $connection;

    public function __construct($name, $description, $code)
    {
        $this->name = $name;
        $this->description = $description;
        $this->code = $code;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function setConnection($connection)
    {
        return $this->connection = $connection;
    }
    public function save()
    {
        try {
            $sql ="INSERT INTO classes SET name=:name, description=description, code:code";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $name,
                $code,
                $description,
                $this->getID()
			]);
            $this->name = $name;
            $this->description = $description;
            $this->code = $code;
        } catch (Exeption $e) {
            error_log($e->getMessage());
        }
    }    
    public function delete()
	{
		try {
			$sql = 'DELETE FROM classes WHERE id=?';
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
            $sql = 'SELECT * FROM classes';
            $data = $this->connection->query($sql)->fetchAll();
            return $data;
        }catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}