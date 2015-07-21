<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $professor->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $professor->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="professors form large-10 medium-9 columns">
    <?= $this->Form->create($professor) ?>
    <fieldset>
        <legend><?= __('Edit Professor') ?></legend>
        <?php
            echo $this->Form->input('document');
            echo $this->Form->input('school_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
