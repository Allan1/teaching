<div class="stages view large-10 medium-9 columns">
    <h2><?= h($stage->title) ?></h2>
    <div class="row">
        <div class=" columns strings">
            <p>Quizz Result</p>
            <p style="font-size:20px">
            <?php 
            	$r = $rating;
			    for ($i=0; $i < 3; $i++) { 
			        if ($r>0) {
			            echo "&#9733";
			        }
			        else
			            echo "&#9734;";
			        $r--;
			    }
			?>
            </p>
            	<?php
            		if ($rating >= 2) {
            			echo "<p>Congratulations! Move on to the next stage!  ".$this->Html->link('Ok', ['controller' => 'Students', 'action' => 'dashboard'])."</p>";
            			
            		}
            		else
            		{
            			echo "<p>Ops, not good enough! Try again!  ".$this->Html->link('Ok', ['controller' => 'Students', 'action' => 'dashboard'])."</p>";
            		}
            		foreach ($result as $value) {
            			if ($value['correct']) {
            				echo "<div class='message'>";
            			}
            			else{
            				echo "<div class='message error'>";
            			}
            			echo "<p>Question: ".$value['question'].'</p>';
            			echo "<p>Right answer: ".$value['answer'].'</p>';
            			echo '</div>';
            		}
            	?>
            
        </div>
        
    </div>
</div>
