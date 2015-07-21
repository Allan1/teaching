<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studentsHasStage->stage_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studentsHasStage->stage_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Students Has Stages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="studentsHasStages form large-10 medium-9 columns">
    <?= $this->Form->create($studentsHasStage) ?>
    <fieldset>
        <legend><?= __('Edit Students Has Stage') ?></legend>
        <?php
            echo $this->Form->input('rating');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
