<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Studentclass'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="studentclasses index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('school_id') ?></th>
            <th><?= $this->Paginator->sort('professor_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($studentclasses as $studentclass): ?>
        <tr>
            <td><?= $this->Number->format($studentclass->id) ?></td>
            <td><?= h($studentclass->name) ?></td>
            <td>
                <?= $studentclass->has('school') ? $this->Html->link($studentclass->school->name, ['controller' => 'Schools', 'action' => 'view', $studentclass->school->id]) : '' ?>
            </td>
            <td>
                <?= $studentclass->has('professor') ? $this->Html->link($studentclass->professor->user_id, ['controller' => 'Professors', 'action' => 'view', $studentclass->professor->user_id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $studentclass->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentclass->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentclass->id)]) ?>
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
