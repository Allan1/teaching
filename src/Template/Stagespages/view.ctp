<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Stagespage'), ['action' => 'edit', $stagespage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stagespage'), ['action' => 'delete', $stagespage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stagespage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stagespages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stagespage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="stagespages view large-10 medium-9 columns">
    <h2><?= h($stagespage->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($stagespage->title) ?></p>
            <h6 class="subheader"><?= __('Stage') ?></h6>
            <p><?= $stagespage->has('stage') ? $this->Html->link($stagespage->stage->title, ['controller' => 'Stages', 'action' => 'view', $stagespage->stage->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($stagespage->id) ?></p>
            <h6 class="subheader"><?= __('Number') ?></h6>
            <p><?= $this->Number->format($stagespage->number) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Text') ?></h6>
            <?= $this->Text->autoParagraph(h($stagespage->text)) ?>
        </div>
    </div>
</div>
