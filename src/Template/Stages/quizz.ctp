<div class="stages view large-10 medium-9 columns">
    <h2><?= h($stage->title) ?></h2>
    <?= $this->Form->create('Quizz',['action'=>'result/'.$stage->id]) ?>
    <fieldset>
        <legend><?= __('Quizz') ?></legend>
        <?php
            foreach ($stage->questions as $value) {
                foreach ($value->answers as $value2) {
                    $answers[$value2['id']] = $value2['name'];
                }
                echo $this->Form->input('question.'.$value->id, ['label'=>$value->name,'options'=>$answers]);   
                $answers = null; 
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>