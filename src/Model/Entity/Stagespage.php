<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stagespage Entity.
 */
class Stagespage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'number' => true,
        'title' => true,
        'stage_id' => true,
        'text' => true,
        'stage' => true,
    ];
}
