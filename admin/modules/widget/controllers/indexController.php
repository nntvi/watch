<?php
    function construct()
    {
        //load_model('index');
    }
    function addAction(){
        load_view('add');
    }  

    function listAction(){
        load_view('list');
    }

    function menuAction(){
        load_view('menu');
    }
?>