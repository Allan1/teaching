<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $professor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Studentclasses'), ['controller' => 'Studentclasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Studentclass'), ['controller' => 'Studentclasses', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="professors form large-10 medium-9 columns">
    <?= $this->Form->create($professor) ?>
    <fieldset>
        <legend><?= __('Edit Professor') ?></legend>
        <?php
            echo $this->Form->input('user.email');
            echo $this->Form->input('user.first_name');
            echo $this->Form->input('user.surname');
            echo $this->Form->input('user.active',array('required'=>false));
            echo $this->Form->input('document');
            echo $this->Form->input('school_id', ['options' => $schools]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
