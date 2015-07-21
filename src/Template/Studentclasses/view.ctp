<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Studentclass'), ['action' => 'edit', $studentclass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Studentclass'), ['action' => 'delete', $studentclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentclass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Studentclasses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studentclass'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professors'), ['controller' => 'Professors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professor'), ['controller' => 'Professors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="studentclasses view large-10 medium-9 columns">
    <h2><?= h($studentclass->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($studentclass->name) ?></p>
            <h6 class="subheader"><?= __('School') ?></h6>
            <p><?= $studentclass->has('school') ? $this->Html->link($studentclass->school->name, ['controller' => 'Schools', 'action' => 'view', $studentclass->school->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Professor') ?></h6>
            <p><?= $studentclass->has('professor') ? $this->Html->link($studentclass->professor->user_id, ['controller' => 'Professors', 'action' => 'view', $studentclass->professor->user_id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($studentclass->id) ?></p>
        </div>
    </div>
</div>
