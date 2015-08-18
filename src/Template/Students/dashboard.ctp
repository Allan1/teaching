<style type="text/css">
      .grid-container{
        width: 100%; 
        max-width: 1200px;      
    }

    /*-- our cleafix hack -- */ 
    .row:before, 
    .row:after {
        content:"";
          display: table ;
        clear:both;
    }

    [class*='col-'] {
        float: left; 
        min-height: 50px; 
        width: 16.66%; 
        /*-- our gutter -- */
        padding: 12px; 
        /*background-color: #FFDCDC;*/
    }

    .col-1{ width: 16.66%; }
    .col-2{ width: 33.33%; }
    .col-3{ width: 50%;    }
    .col-4{ width: 66.66%; }
    .col-5{ width: 83.33%; }
    .col-6{ width: 100%;   }

    .outline, .outline *{
        /*outline: 1px solid #F6A1A1; */
    }

    /*-- some extra column content styling --*/
    [class*='col-'] > p {
     background-color: #C2CDFF; 
     padding: 0;
     margin: 0;
     text-align: center; 
     color: white; 
     min-height: 60px; 
    }
    .unlocked > p {
     background-color: green;
    }
    /*.full_star:after {
        content: ""
    }*/
</style>

<div class="dashboard large-12 columns">
    <div class="grid-container outline">
        <?php foreach ($sections as $section) : ?>
        <span><?= $section['name'];?></span>
        <div class="row">
            <?php foreach ($section['stages'] as $stage) : ?>
                
                <?php 

                    $rating = 0;
                    if($stage['studentsHasStages']){
                        echo "<a href='/teaching/stages/play/{$stage["id"]}'>";
                        echo '<div class="col-1 unlocked">';
                        $rating = $stage['studentsHasStages']['rating'];
                    }
                    else{
                        echo '<div class="col-1">';
                    }
                ?>
                    <p>
                        <?= $stage['title'];?>
                    </p>
                    <p>
                    <?php 
                        for ($i=0; $i < 3; $i++) { 
                            if ($rating>0) {
                                echo "&#9733";
                            }
                            else
                                echo "&#9734;";
                            $rating--;
                        }
                    ?>
                        
                    </p>
                </div>
                </a> 
            <?php endforeach;?>
        </div>
        <?php endforeach;?>
    </div>    
</div>
