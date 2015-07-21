<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Administrators'), ['controller' => 'Administrators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrator'), ['controller' => 'Administrators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($user->first_name) ?></p>
            <h6 class="subheader"><?= __('Surname') ?></h6>
            <p><?= h($user->surname) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Last Login') ?></h6>
            <p><?= h($user->last_login) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $user->active ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Administrators') ?></h4>
    <?php if (!empty($user->administrators)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->administrators as $administrators): ?>
        <tr>
            <td><?= h($administrators->id) ?></td>
            <td><?= h($administrators->user_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Administrators', 'action' => 'view', $administrators->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Administrators', 'action' => 'edit', $administrators->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Administrators', 'action' => 'delete', $administrators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrators->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Professors') ?></h4>
    <?php if (!empty($user->professors)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Document') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('School Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->professors as $professors): ?>
        <tr>
            <td><?= h($professors->id) ?></td>
            <td><?= h($professors->document) ?></td>
            <td><?= h($professors->user_id) ?></td>
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
    <h4 class="subheader"><?= __('Related Students') ?></h4>
    <?php if (!empty($user->students)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Enrolment N') ?></th>
            <th><?= __('Rating Sum') ?></th>
            <th><?= __('Studentclasse Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('School Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->students as $students): ?>
        <tr>
            <td><?= h($students->id) ?></td>
            <td><?= h($students->enrolment_n) ?></td>
            <td><?= h($students->rating_sum) ?></td>
            <td><?= h($students->studentclasse_id) ?></td>
            <td><?= h($students->user_id) ?></td>
            <td><?= h($students->school_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $students->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $students->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $students->id], ['confirm' => __('Are you sure you want to delete # {0}?', $students->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
