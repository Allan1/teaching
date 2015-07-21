<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentsHasStage Entity.
 */
class StudentsHasStage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'rating' => true,
        'stage' => true,
        'student_user' => true,
    ];
}
