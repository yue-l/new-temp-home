<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * SnchockeyController is created for capture some ideas while AKL SNC Hockey training and practice records.
 * The implementation is currently done in Laravel.
 * @deprecated since AUG-2018
 */
class SncHockeyController extends CommonController
{

    /**
     * Hockey index page
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
