<?php

/**
 * ta klasa implementuje metody do widoku.
 *
 * @abstract
 */
abstract class View{
 
    /**
     * ładuje obiekt z modelu
     *
     * @param string $name nazwa klasy z klasą
     * @param string $path scieżka do pliku z klasą
     *
     * @return object
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
     * ładuje plik z templatką.
     *
     * @param string $name nazwa pliku template
     * @param string $path sciezka 
     *
     * @return void
     */
    public function render($name, $path='templates/') {
        $path=$path.$name.'.html.php';
        try {
            if(is_file($path)) {
                require $path;
            } else {
                throw new Exception('Can not open template '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
    }
    /**
     * Ustawia dane
     *
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function set($name, $value) {
        $this->$name=$value;
    }
    /**
     * Pobiera dane
     *
     * @param string $name
     *
     * @return mixed
     */
    public function get($name) {
        return $this->$name;
    }
}
?>