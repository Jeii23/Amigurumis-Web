<?php
2 // controller/llistar_categories.php
3
4 require_once __DIR__.'/../model/connectaDb.php';
5 require_once __DIR__.'/../model/categories.php';
6
7 $categories = getCategories(); // Aquesta crida és al model
8
9 include __DIR__.'/../views/llistar_categories.php';