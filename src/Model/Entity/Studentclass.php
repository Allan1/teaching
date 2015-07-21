<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Studentclass Entity.
 */
class Studentclass extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'school_id' => true,
        'professor_user_id' => true,
        'school' => true,
        'professor_user' => true,
    ];
}
