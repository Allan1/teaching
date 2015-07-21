<?php
namespace App\Model\Table;

use App\Model\Entity\StudentsHasStage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentsHasStages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Stages
 * @property \Cake\ORM\Association\BelongsTo $StudentUsers
 */
class StudentsHasStagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('students_has_stages');
        $this->displayField('stage_id');
        $this->primaryKey(['stage_id', 'student_user_id']);
        $this->belongsTo('Stages', [
            'foreignKey' => 'stage_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('StudentUsers', [
            'foreignKey' => 'student_user_id',
            'joinType' => 'INNER'
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
            ->requirePresence('rating', 'create')
            ->notEmpty('rating');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['stage_id'], 'Stages'));
        $rules->add($rules->existsIn(['student_user_id'], 'StudentUsers'));
        return $rules;
    }
}
