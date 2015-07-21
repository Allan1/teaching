<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studentclass->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studentclass->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Studentclasses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="studentclasses form large-10 medium-9 columns">
    <?= $this->Form->create($studentclass) ?>
    <fieldset>
        <legend><?= __('Edit Studentclass') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('school_id', ['options' => $schools]);
            echo $this->Form->input('professor_user_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
