<?php
namespace App\Model\Table;

use App\Model\Entity\School;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schools Model
 *
 * @property \Cake\ORM\Association\HasMany $Professors
 * @property \Cake\ORM\Association\HasMany $Studentclasses
 * @property \Cake\ORM\Association\HasMany $Students
 */
class SchoolsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('schools');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Professors', [
            'foreignKey' => 'school_id'
        ]);
        $this->hasMany('Studentclasses', [
            'foreignKey' => 'school_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'school_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->requirePresence('document', 'create')
            ->notEmpty('document')
            ->add('document', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }
}
