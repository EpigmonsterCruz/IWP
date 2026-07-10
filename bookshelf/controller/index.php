<?php
//require 'functions.php';
//vdd($_SERVER['REQUEST_URI']);
//echo substr_replace($_SERVER['REQUEST_URI'], "",0,10);
//echo str_replace("/bookshelf","",$_SERVER['REQUEST_URI']);

//$heading="Home";
view('index.view.php', ['heading'=>'Home']);
