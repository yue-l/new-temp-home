<?php
namespace frontend\controllers;

use Yii;

use common\models\User;

use frontend\models\LoginForm;
use frontend\models\Career;
use frontend\models\ContactForm;
use frontend\models\UserRegisterForm;

/**
 * SiteController defines default routes in Frontend app. It allows all connection.
 *
 */
class SiteController extends CommonController
{

    /**
     * Home page profile
     */
    public function actionIndex()
    {
        $this->layout = 'homepage';

        return $this->render('index');
    }

    /**
     * User Login
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(array('apps/index'));
        }

        return $this->render('login', ['model' => $model,]);
    }

    /**
     * Logout
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->cache->flush();

        return $this->redirect(array('site/index'));
    }

    /**
     * Display 403 when user under priviledged
     */
    public function actionRestrict()
    {
        $this->layout = 'main';

        return $this->render('restrict');
    }

    /**
     * Send Email contact
     */
    public function actionContact()
    {
        $this->layout = 'main';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            $mailRequest = Yii::$app->request->post()['ContactForm'];
            Yii::$app->session->setFlash('contactFormSubmitted');
            Yii::$app->mailer->compose()
                ->setFrom($mailRequest['email'])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject($mailRequest['subject'])
                ->setTextBody($mailRequest['body'])
                ->send();

            return $this->refresh();
        } else {

            return $this->render('contact', ['model' => $model,]);
        }

    }

}
