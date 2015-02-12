<?php
/**
 * Ta klasa implementuje metody dla modeli
 *
 * @abstract
 */
abstract class Model{
    /**
     * obiekt z klasy PDO
     *
     * @deklaracja obiektu
     */
    protected $pdo;
 
    /**
     * It sets connect with the database.
     *
     * @return void
     */
    public function  __construct() {
        try {
            require 'config/sql.php';
            $this->pdo=new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
    }
    /**
     * ładuje obiekt z modelem.
     *
     * @param tekst $name nazwa klasy z klasą
     * @param tekst $path link do pliku z klasą
     *
     * @return obiekt
     */
    public function loadModel($name, $path='model/') {
        $path=$path.$name.'.php';
        $name=$name.'Model';
        try {
            if(is_file($path)) {
                require $path;
                $ob=new $name();
            } else {
                throw new Exception('Can not open model '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
        return $ob;
    }
    /**
     * Wybiera rekordy z bazy
     *
     * @param tekst $from tabeli
     * @param <type> $select Rekordy do wybrania (default * (all))
     * @param <type> $where warunek do zapytania
     * @param <type> $order sortowanie ($record ASC/DESC)
     * @param <type> $limit LIMIT
     * @return array
     */
    public function select($from, $select='*', $where=NULL, $order=NULL, $limit=NULL) {
        $query='SELECT '.$select.' FROM '.$from;
        if($where!=NULL)
            $query=$query.' WHERE '.$where;
        if($order!=NULL)
            $query=$query.' ORDER BY '.$order;
        if($limit!=NULL)
            $query=$query.' LIMIT '.$limit;
 
        $select=$this->pdo->query($query);
        foreach ($select as $row) {
            $data[]=$row;
        }
        $select->closeCursor();
 
        return $data;
    }
}


?>