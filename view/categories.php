<?php

include 'view/view.php';
 
class CategoriesView extends View{
    public function  index() {
        $cat=$this->loadModel('categories');
        $this->set('catsData', $cat->getAll());
        $this->render('indexCategory');
    }
    public function  add() {
        $this->render('addCategory');
    }
}
?>