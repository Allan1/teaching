<?php
$this->layout = false;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <style type="text/css">
    h1{
        font-size: 1.5rem;
    }
    .home .checks{
        margin-top: 10px;
    }
    .home header{
        height: auto;
        line-height: auto;
        padding: auto;
    }
    .home header .header-image{
        width: 300px;
        display: block;
        margin: 0 auto;
    }
    </style>
</head>
<body class="home">
    <header>
        <div class="header-image">
            <h1>Web concepts</h1>
            <p>
                <h1>Login</h1>
                <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login']]); ?>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->input('password') ?>
                <?= $this->Form->button('Login') ?>
                <?= $this->Form->end() ?>
            </p>
        </div>
    </header>
    <div id="content">
        <div class="row">
            <div class="columns large-12 checks">
                <p>Join us and learn about how the web works!</p>
            </div>
            <div class="columns large-6 checks">
                <p class="success">Request-response interaction</p>
                <p class="success">Stateless communication</p>
                <p class="success">Http packets</p>
            </div>
            <div class="columns large-6 checks">
                <p class="success">Http verbs</p>
                <p class="success">Http hearders</p>
                <p class="success">and much more!</p>
                
            </div>
        </div>

        <hr/>
    </div>
    <footer>
    </footer>
</body>
</html>
