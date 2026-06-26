<?php

require_once 'Database.php';

class Category extends Database
{

    public function getCategories()
    {
        return $this->read_query('cms_categories');
    }
}