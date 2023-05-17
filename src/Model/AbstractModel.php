<?php

namespace App\Model;

use PDO;
use \App\Database\DbConnection;

abstract class AbstractModel
{
    /**
     * @var ?PDO Used to connect to database
     */
    protected ?PDO $_db = null;

    /**
     * @var string Identifies child model class table name
     */
    protected string $_table;

    public function __construct()
    {
        $this->_db = DbConnection::getDb();

        // Get child class (on the context where it is called)
        $class = get_class($this);

        // Explode the namespace into an array
        $class = explode('\\', $class);

        // Set $_table property value to the last array entry case lowered
        $this->_table = '`' . strtolower(array_pop($class)) . '`';

        // ! WARNING: At current version you must still define $_table property
        // ! WARNING: in child class if the model / table is more than 1 word long
        // ! WARNING: Exemple: model => UserAddress, table name => user_address
    }

    /**
     * @return array Sql results if request executed successfully
     */
    public function findAll(): array|false
    {
        $sql = 'SELECT * FROM ' . $this->_table;

        $select = $this->_db->prepare($sql);

        $select->execute();

        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id Representing id column in database
     * @return array Row from database if request executed successfully
     */
    public function find(int $id): array|false
    {
        $sql = 'SELECT * FROM ' . $this->_table . ' WHERE id = :id';

        $select = $this->_db->prepare($sql);

        $select->bindParam(':id', $id);

        $select->execute();

        return $select->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int Id representing id column in database
     * @return bool Depending if request is successfull or not
     */
    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM ' . $this->_table . ' WHERE id = :id';

        $select = $this->_db->prepare($sql);

        $select->bindParam(':id', $id);

        return $select->execute();
    }
}