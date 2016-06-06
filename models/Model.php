<?php
namespace Models;

/**
 * Class Model
 * @package Model
 */
class Model
{
    /**
     * @var string
     */
    protected $table = '';
    protected $nbpage = 4;
    /**
     * @var null|\PDO
     */
    protected $cn = null;

    /**
     * Model constructor.
     * Creates the PDO connection
     */
    public function __construct()
    {
        $dbConfig = parse_ini_file('db.ini');
        $pdoOptions = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];

        try {
            $dsn = sprintf(
                '%s:dbname=%s;host=%s',
                $dbConfig['driver'],
                $dbConfig['dbname'],
                $dbConfig['host']
            );
            $this->cn = new \PDO(
                $dsn,
                $dbConfig['username'],
                $dbConfig['password'],
                $pdoOptions
            );
            $this->cn->exec('SET CHARACTER SET UTF8');
            $this->cn->exec('SET NAMES UTF8');
        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Returns everything from a table
     *
     * @return array
     */
    public function all($page)
    {
        if($page==0) {
            $sql = sprintf('SELECT * FROM %s', $this->table);
        } else{
            $nbpage = $this->nbpage;
            $start = ($page - 1) * $nbpage;// à calculer selon la valeur de $page
            $sql = sprintf('SELECT * FROM %s LIMIT %s,%s',$this->table, $start, $nbpage);
        }
        $pdoSt = $this->cn->query($sql);

        return $pdoSt->fetchAll();
    }
    public function getNbPages()
    {
        $sql = sprintf('
            SELECT COUNT(id) as nbpage FROM %s',$this->table);

        $pdoSt = $this->cn->query($sql);

        return $pdoSt->fetch();
    }
    /**
     * Returns a single record from a table
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id', $this->table);
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetch();
    }

    public function save($fields)
    {
        $sFieldsNames = implode('`, `', array_keys($fields));
        $sFieldsJokers = implode(', :', array_keys($fields));
        $sql = sprintf('INSERT INTO %s(`%s`) VALUES(:%s)',
            $this->table,
            $sFieldsNames,
            $sFieldsJokers);
        $pdoSt = $this->cn->prepare($sql);
        foreach (array_keys($fields) as $field) {
            $pdoSt->bindValue(':' . $field, $fields[$field]);
        }
        return $pdoSt->execute();
    }
    public function delete($id){
        $sql = sprintf('DELETE FROM %s WHERE id = :id', $this->table);
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);
    }
}