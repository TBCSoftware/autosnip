<?php
// src/Model/Entity/Book.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Book extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}