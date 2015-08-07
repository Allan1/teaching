<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $stage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $stage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stagespages'), ['controller' => 'Stagespages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stagespage'), ['controller' => 'Stagespages', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="stages form large-10 medium-9 columns">
    <?= $this->Form->create($stage) ?>
    <fieldset>
        <legend><?= __('Edit Stage') ?></legend>
        <?php
            echo $this->Form->input('number');
            echo $this->Form->input('title');
            echo $this->Form->input('section_id', ['options' => $sections]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
