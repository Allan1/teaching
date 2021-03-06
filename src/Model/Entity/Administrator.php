<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Administrator Entity.
 */
class Administrator extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'user' => true,
    ];
}
