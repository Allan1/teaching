<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Students Has Stage'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="studentsHasStages index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('stage_id') ?></th>
            <th><?= $this->Paginator->sort('student_user_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($studentsHasStages as $studentsHasStage): ?>
        <tr>
            <td>
                <?= $studentsHasStage->has('stage') ? $this->Html->link($studentsHasStage->stage->number, ['controller' => 'Stages', 'action' => 'view', $studentsHasStage->stage->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($studentsHasStage->student_user_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $studentsHasStage->stage_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentsHasStage->stage_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentsHasStage->stage_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentsHasStage->stage_id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
