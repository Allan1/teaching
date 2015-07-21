<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Professor Entity.
 */
class Professor extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'document' => true,
        'user_id' => true,
        'school_id' => true,
        'user' => true,
        'school' => true,
        'studentclasses' => true,
    ];
}
