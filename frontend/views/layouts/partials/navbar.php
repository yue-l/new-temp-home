<nav id="navigator" class="navbar-inverse navbar-fixed-top top-nav-cust navbar">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Yue Li</a>
        </div>
        <div id="navigator-collapse" class="collapse navbar-collapse">
            <ul class="navbar-nav navbar-right nav">
                <li class="active"><a href="/site/index">Home</a></li>
                <li><a href="/site/contact">Contact</a></li>
                <?php if(!Yii::$app->user->isGuest): ?>
                    <?= $this->render('elements/apps-panel');?>
                <?php endif; ?>
                <!-- </?= $this->render('elements/hobby-panel');?> -->
                <?= $this->render('elements/login-panel');?>
            </ul>
        </div>
  </div>
</nav>
