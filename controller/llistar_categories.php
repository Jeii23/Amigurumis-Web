<?php
// controller/llistar_categories.php

require_once __DIR__.'/../model/connectaDb.php';
require_once __DIR__.'/../model/categories.php';

$categories = getCategories(); // Aquesta crida és al model

include __DIR__.'/../views/llistar_categories.php';

?>