<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Professor'), ['action' => 'edit', $professor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professor'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Studentclasses'), ['controller' => 'Studentclasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studentclass'), ['controller' => 'Studentclasses', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="professors view large-10 medium-9 columns">
    <h2><?= h($professor->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Document') ?></h6>
            <p><?= h($professor->document) ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $professor->has('user') ? $this->Html->link($professor->user->id, ['controller' => 'Users', 'action' => 'view', $professor->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('School') ?></h6>
            <p><?= $professor->has('school') ? $this->Html->link($professor->school->name, ['controller' => 'Schools', 'action' => 'view', $professor->school->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($professor->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Studentclasses') ?></h4>
    <?php if (!empty($professor->studentclasses)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('School Id') ?></th>
            <th><?= __('Professor Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($professor->studentclasses as $studentclasses): ?>
        <tr>
            <td><?= h($studentclasses->id) ?></td>
            <td><?= h($studentclasses->name) ?></td>
            <td><?= h($studentclasses->school_id) ?></td>
            <td><?= h($studentclasses->professor_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Studentclasses', 'action' => 'view', $studentclasses->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Studentclasses', 'action' => 'edit', $studentclasses->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Studentclasses', 'action' => 'delete', $studentclasses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentclasses->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
