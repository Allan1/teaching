<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Administrators'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="administrators form large-10 medium-9 columns">
    <?= $this->Form->create($administrator) ?>
    <fieldset>
        <legend><?= __('Add Administrator') ?></legend>
        <?php
            // echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('user.email');
            echo $this->Form->input('user.first_name');
            echo $this->Form->input('user.surname');
            echo $this->Form->input('user.password');
            echo $this->Form->input('user.active',array('required'=>false));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
