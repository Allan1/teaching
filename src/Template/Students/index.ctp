<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Studentclasses'), ['controller' => 'Studentclasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Studentclass'), ['controller' => 'Studentclasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="students index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('enrolment_n') ?></th>
            <th><?= $this->Paginator->sort('rating_sum') ?></th>
            <th><?= $this->Paginator->sort('studentclasse_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('school_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $this->Number->format($student->id) ?></td>
            <td><?= $this->Number->format($student->enrolment_n) ?></td>
            <td><?= $this->Number->format($student->rating_sum) ?></td>
            <td>
                <?= $student->has('studentclass') ? $this->Html->link($student->studentclass->name, ['controller' => 'Studentclasses', 'action' => 'view', $student->studentclass->id]) : '' ?>
            </td>
            <td>
                <?= $student->has('user') ? $this->Html->link($student->user->surname, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?>
            </td>
            <td>
                <?= $student->has('school') ? $this->Html->link($student->school->name, ['controller' => 'Schools', 'action' => 'view', $student->school->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
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
