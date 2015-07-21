<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit School'), ['action' => 'edit', $school->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete School'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Studentclasses'), ['controller' => 'Studentclasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studentclass'), ['controller' => 'Studentclasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="schools view large-10 medium-9 columns">
    <h2><?= h($school->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($school->name) ?></p>
            <h6 class="subheader"><?= __('Document') ?></h6>
            <p><?= h($school->document) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($school->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Professors') ?></h4>
    <?php if (!empty($school->professors)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('User Id') ?></th>
            <th><?= __('Document') ?></th>
            <th><?= __('School Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($school->professors as $professors): ?>
        <tr>
            <td><?= h($professors->user_id) ?></td>
            <td><?= h($professors->document) ?></td>
            <td><?= h($professors->school_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Professors', 'action' => 'view', $professors->user_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Professors', 'action' => 'edit', $professors->user_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Professors', 'action' => 'delete', $professors->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $professors->user_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Studentclasses') ?></h4>
    <?php if (!empty($school->studentclasses)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('School Id') ?></th>
            <th><?= __('Professor User Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($school->studentclasses as $studentclasses): ?>
        <tr>
            <td><?= h($studentclasses->id) ?></td>
            <td><?= h($studentclasses->name) ?></td>
            <td><?= h($studentclasses->school_id) ?></td>
            <td><?= h($studentclasses->professor_user_id) ?></td>

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
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Students') ?></h4>
    <?php if (!empty($school->students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('User Id') ?></th>
            <th><?= __('Enrolment N') ?></th>
            <th><?= __('Rating Sum') ?></th>
            <th><?= __('School Id') ?></th>
            <th><?= __('Studentclasse Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($school->students as $students): ?>
        <tr>
            <td><?= h($students->user_id) ?></td>
            <td><?= h($students->enrolment_n) ?></td>
            <td><?= h($students->rating_sum) ?></td>
            <td><?= h($students->school_id) ?></td>
            <td><?= h($students->studentclasse_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $students->user_id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $students->user_id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $students->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $students->user_id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
