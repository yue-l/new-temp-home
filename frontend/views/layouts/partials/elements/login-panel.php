<?php if (Yii::$app->user->isGuest): ?>
    <li><a href="/site/login">Login</a></li>
<?php else: ?>
    <li>
        <form action="/site/logout" method="post">
            <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
            <button type="submit" class="btn-link">Logout (<?=Yii::$app->user->identity->username;?>)</button>
        </form>
    </li>
<?php endif; ?>
