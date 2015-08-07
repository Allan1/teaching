<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity.
 */
class Student extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'enrolment_n' => true,
        'rating_sum' => true,
        'studentclasse_id' => true,
        'user_id' => true,
        'school_id' => true,
        'studentclass' => true,
        'user' => true,
        'school' => true,
    ];

   
}
