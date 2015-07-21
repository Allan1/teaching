<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stage Entity.
 */
class Stage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'number' => true,
        'description' => true,
        'sections_id' => true,
        'section' => true,
    ];
}
