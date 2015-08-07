<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Stagespages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="stagespages form large-10 medium-9 columns">
    <?= $this->Form->create($stagespage) ?>
    <fieldset>
        <legend><?= __('Add Stagespage') ?></legend>
        <?php
            echo $this->Form->input('number');
            echo $this->Form->input('title');
            echo $this->Form->input('stage_id', ['options' => $stages]);
            echo $this->Form->input('text');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
