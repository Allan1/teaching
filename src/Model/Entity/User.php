<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'first_name' => true,
        'surname' => true,
        'password' => true,
        'active' => true,
        'created_at' => true,
        'last_seen' => true,
        'administrators' => true,
        'professors' => true,
        'students' => true,
    ];
}
