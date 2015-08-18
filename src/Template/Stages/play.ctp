<div class="stages view large-10 medium-9 columns">
    <h2><?= h($stage->title) ?></h2>
    <div class="row">
        <div class=" columns strings">
            <p><?= h($page->title) ?></p>
            <p><?= h($page->text) ?></p>
        </div>
        <div class="large-3 columns strings">
        <?php
        	if ($previous) {
        		echo $this->Html->link(__('Previous'), ['controller' => 'Stages', 'action' => 'play',$stage->id,$previous]);
        	}
        ?>
        </div>
        <div class="large-4 columns strings">
        </div>
        <div class="large-3 columns strings">
        <?php
        	if ($next) {
        		echo $this->Html->link(__('Next'), ['controller' => 'Stages', 'action' => 'play',$stage->id,$next]);
        	}
        	elseif ($quizz) {
        		echo $this->Html->link(__('Apply for quizz'), ['controller' => 'Stages', 'action' => 'quizz',$stage->id]);
        	}
        ?>
        </div>
    </div>
</div>