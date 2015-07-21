<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="professors index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('document') ?></th>
            <th><?= $this->Paginator->sort('school_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($professors as $professor): ?>
        <tr>
            <td><?= $this->Number->format($professor->user_id) ?></td>
            <td><?= h($professor->document) ?></td>
            <td><?= $this->Number->format($professor->school_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $professor->user_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professor->user_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professor->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->user_id)]) ?>
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
