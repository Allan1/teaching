<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Stage'), ['action' => 'edit', $stage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stage'), ['action' => 'delete', $stage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stagespages'), ['controller' => 'Stagespages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stagespage'), ['controller' => 'Stagespages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="stages view large-10 medium-9 columns">
    <h2><?= h($stage->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($stage->title) ?></p>
            <h6 class="subheader"><?= __('Section') ?></h6>
            <p><?= $stage->has('section') ? $this->Html->link($stage->section->name, ['controller' => 'Sections', 'action' => 'view', $stage->section->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($stage->id) ?></p>
            <h6 class="subheader"><?= __('Number') ?></h6>
            <p><?= $this->Number->format($stage->number) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Questions') ?></h4>
    <?php if (!empty($stage->questions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Question') ?></th>
            <th><?= __('Stage Id') ?></th>
            <th><?= __('Answer Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($stage->questions as $questions): ?>
        <tr>
            <td><?= h($questions->id) ?></td>
            <td><?= h($questions->question) ?></td>
            <td><?= h($questions->stage_id) ?></td>
            <td><?= h($questions->answer_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Stagespages') ?></h4>
    <?php if (!empty($stage->stagespages)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Number') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Stage Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($stage->stagespages as $stagespages): ?>
        <tr>
            <td><?= h($stagespages->id) ?></td>
            <td><?= h($stagespages->number) ?></td>
            <td><?= h($stagespages->title) ?></td>
            <td><?= h($stagespages->stage_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Stagespages', 'action' => 'view', $stagespages->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Stagespages', 'action' => 'edit', $stagespages->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stagespages', 'action' => 'delete', $stagespages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stagespages->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
