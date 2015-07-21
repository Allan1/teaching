<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Stages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="stages form large-10 medium-9 columns">
    <?= $this->Form->create($stage) ?>
    <fieldset>
        <legend><?= __('Add Stage') ?></legend>
        <?php
            echo $this->Form->input('number');
            echo $this->Form->input('description');
            echo $this->Form->input('sections_id', ['options' => $sections]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
