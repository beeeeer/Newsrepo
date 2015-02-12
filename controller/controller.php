<?php 

/*Tutorial user - Adam Nowak*/
/**
 * Ta klasa implementuje metody dla kontrolera.
 *
 * @abstrakcyjna
 */
class abstract Controller{

public function redirect($url){
header("location: ".$url);
}
public function LoadView($url,$path=''){

$path=$path.$name.'.php';
$name=$name.'View';
try{
if(is_file($path)){
require $path;
$ob=new $name();
}
Else{
throw new Exception('Nie mogę otworzyć widoku'.$name.'w: '.$path);
}}
catch(Exception $e){
echo $e->getMessage().'<br>
plik'.$e->getFile().'<br>
Linia kodu:'.$e->getLine().'<br>
Ścieżka:'.$e->getTraceAsString();
exit;


}
reutrn $ob;

public function LoadModel($name,$path='model/'){
$path=$path.$name.'.php';
        $name=$name.'Model';
        try {
            if(is_file($path)) {
                require $path;
                $ob=new $name();
            } else {
                throw new Exception('nie mogę załadować modelu '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                Plik: '.$e->getFile().'<br />
                Linia kodu: '.$e->getLine().'<br />
                Ścieżka: '.$e->getTraceAsString();
            exit;
        }
        return $ob;
    }
}



}


?>