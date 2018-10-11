<?php

namespace frontend\controllers;

use Yii;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use common\models\User;

/**
 * CommonController is the generic class of all the other controllers in frontend application
 */
class CommonController extends \yii\web\Controller
{
    /**
     * AppUser can be used for later as session init
     */
    protected $appUser;


    /**
     * default error handler
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * attached system behaviors.
     *
     * RBAC logs user out when user underpriviledged.
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Before routing, condition check or pre-data processes features.
     */
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    /**
     * Controller Initiation
     * @inheritDoc
     * @see /yii/web/Controller
     */
    public function init()
    {
        date_default_timezone_set('Pacific/Auckland');
        parent::init();
        if (!Yii::$app->user->isGuest) {
            $this->appUser = User::findOne(Yii::$app->user->id);
        }
        if (!empty($this->appUser)) {
            $this->layout = 'main';
        }
    }
}
