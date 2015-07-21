<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Students Has Stage'), ['action' => 'edit', $studentsHasStage->stage_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Students Has Stage'), ['action' => 'delete', $studentsHasStage->stage_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentsHasStage->stage_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students Has Stages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Students Has Stage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stages'), ['controller' => 'Stages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stage'), ['controller' => 'Stages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="studentsHasStages view large-10 medium-9 columns">
    <h2><?= h($studentsHasStage->stage_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Stage') ?></h6>
            <p><?= $studentsHasStage->has('stage') ? $this->Html->link($studentsHasStage->stage->id, ['controller' => 'Stages', 'action' => 'view', $studentsHasStage->stage->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Student') ?></h6>
            <p><?= $studentsHasStage->has('student') ? $this->Html->link($studentsHasStage->student->id, ['controller' => 'Students', 'action' => 'view', $studentsHasStage->student->id]) : '' ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Rating') ?></h6>
            <?= $this->Text->autoParagraph(h($studentsHasStage->rating)) ?>
        </div>
    </div>
</div>
