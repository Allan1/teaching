<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Professor'), ['action' => 'edit', $professor->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Professor'), ['action' => 'delete', $professor->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="professors view large-10 medium-9 columns">
    <h2><?= h($professor->user_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Document') ?></h6>
            <p><?= h($professor->document) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('User Id') ?></h6>
            <p><?= $this->Number->format($professor->user_id) ?></p>
            <h6 class="subheader"><?= __('School Id') ?></h6>
            <p><?= $this->Number->format($professor->school_id) ?></p>
        </div>
    </div>
</div>
