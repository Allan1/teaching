<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Studentclasses'), ['controller' => 'Studentclasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studentclass'), ['controller' => 'Studentclasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="students view large-10 medium-9 columns">
    <h2><?= h($student->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Studentclass') ?></h6>
            <p><?= $student->has('studentclass') ? $this->Html->link($student->studentclass->name, ['controller' => 'Studentclasses', 'action' => 'view', $student->studentclass->id]) : '' ?></p>
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $student->has('user') ? $this->Html->link($student->user->surname, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('School') ?></h6>
            <p><?= $student->has('school') ? $this->Html->link($student->school->name, ['controller' => 'Schools', 'action' => 'view', $student->school->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($student->id) ?></p>
            <h6 class="subheader"><?= __('Enrolment N') ?></h6>
            <p><?= $this->Number->format($student->enrolment_n) ?></p>
            <h6 class="subheader"><?= __('Rating Sum') ?></h6>
            <p><?= $this->Number->format($student->rating_sum) ?></p>
        </div>
    </div>
</div>
