<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

use common\models\User;

use frontend\models\Vehicle;
use frontend\models\CarRegisterForm;
use frontend\models\Refueldetail;
use frontend\models\Career;
use frontend\models\Job;
use frontend\models\Fileupload;


/**
 * AppsController takes some of my daily ideas and converts those ideas into PHP implementation.
 *
 * The role: Set up my experiment routes
 */
class AppsController extends CommonController
{

    /**
     * add user validation
     *
     * @inheritDoc
     * @see frontend/controllers/CommonController
     */
    public function actions()
    {
        $this->validateUserRole();

        return parent::actions();
    }

    /**
     * App default index redirects to fueltracker
     * recorded at Feb 2016
     */
    public function actionIndex()
    {
        $this->layout = 'fueltrackerlayout';
        $cars = Vehicle::find()->where(['user_id' => Yii::$app->user->id, 'isdelete' => false])->all();

        return $this->render('index', ['user' => Yii::$app->user, 'cars' => $cars]);
    }

    /**
     * register new car plate
     */
    public function actionRegister()
    {
        $this->layout = 'fueltrackerlayout';
        $model = new Vehicle();

        return $this->render('register', ['model' => $model,]);
    }

    /**
     * complete new car plate form
     */
    public function actionCompleteregister()
    {
        $vehicle = new vehicle();
        if ($vehicle->load(Yii::$app->request->post())) {
            Vehicle::create($vehicle, Yii::$app->user->id);
        }

        return $this->redirect('index');
    }

    /**
     * Records car refuel details
     * @param int $carid
     */
    public function actionRefuel($carid)
    {
        $this->layout = 'fueltrackerlayout';
        $car = Vehicle::findOne($carid);
        $model = new Refueldetail();

        return $this->render('refuel', ['model'=> $model,'carid' => $carid, 'car' => $car]);
    }

    /**
     * submit refuel form
     */
    public function actionCompleterefuel()
    {
        $this->layout = 'fueltrackerlayout';
        $carid = intval($_POST['Refueldetail']['vehicle']);
        $car = Vehicle::findOne($carid);
        $refuel = new Refueldetail();
        if($refuel->load(Yii::$app->request->post())) {
            Refueldetail::create($refuel);
        } else {
            print_r($refuel->getErrors());
            die();
        }
        Vehicle::updateCarDetails($refuel);

        return $this->redirect('apps/index');
    }

    /**
     * Remove car plate in AJAX
     */
    public function actionRemovecar()
    {
        $this->layout = 'fueltrackerlayout';
        $plateDiv = Vehicle::removeCar($_POST['id']);

        return $plateDiv;
    }

    /**
     * Check car fuel status
     *
     * @param int $carid
     */
    public function actionCheckstatus($carid)
    {
        $this->layout = 'fueltrackerlayout';
        $car = Vehicle::findOne($carid);
        $refuels = Refueldetail::find()
            ->where(['vehicle' => $carid])
            ->orderBy('createdtime')
            ->all();

        return $this->render('checkstatus', ['model' => $car, 'tickets' => $refuels]);
    }

    /**
     * My jobs applications
     * Recorded at Jan 2017
     */
    public function actionMyjobs()
    {
        $this->layout = 'joblayout';
        $user = User::findOne(Yii::$app->user->id);
        $jobs = Job::find()
            ->where(['userid' => $user->id])
            ->orderBy('date DESC')
            ->all();

        return $this->render('myjobs', ['user' => $user, 'jobs' => $jobs]);
    }

    /**
     * Add new job entry
     */
    public function actionNewjob()
    {
        $this->layout = 'joblayout';
        $job = new Job();

        return $this->render('newjob', ['model' => $job]);
    }

    /**
     * Submit job registration form
     */
    public function actionCompletejobreg ()
    {
        $this->layout = 'joblayout';
        $job = new Job();
        if ($job->load(Yii::$app->request->post())) {
            $job->document = UploadedFile::getInstances($job, 'document');
            $job = Job::create($job, Yii::$app->user->id);
            $job->uploadFiles();
        } else {
            // debug error
            print_r($job->getErrors());
            die();
        }

        return $this->redirect('myjobs');
    }

    /**
     * Convert datetime in zones
     * Recorded at Jan 2016
     */
    public function actionDatetime()
    {
        $this->layout = 'main';

        return $this->render('datetime');
    }

    /**
     * Convert time zones
     */
    public function actionDatetimecalculate()
    {
        /**
         * local function with a set of time zones
         */
        function updateTimeZones($datetime) {
          $resultArray = array();
          $dtUTC = clone $datetime;
          $dtUTC->setTimezone(new \DateTimeZone("UTC"));
          $dtAEST = clone $datetime;
          $dtAEST->setTimezone(new \DateTimeZone("AEST"));
          $dtCST = clone $datetime;
          $dtCST->setTimezone(new \DateTimeZone("CST"));
          $dtMST = clone $datetime;
          $dtMST->setTimezone(new \DateTimeZone("MST"));
          $dtNZST = clone $datetime;
          $dtNZST->setTimezone(new \DateTimeZone("NZST"));
          $resultArray = ['utc' => $dtUTC->format('d/m/Y h:i A T'),
          'aest' => $dtAEST->format('d/m/Y h:i A T'),
          'cst' => $dtCST->format('d/m/Y h:i A T'),
          'mst' =>$dtMST->format('d/m/Y h:i A T'),
          'nzst' => $dtNZST->format('d/m/Y h:i A T')];
          return $resultArray;
        }

        /**
         * update time
         */
        function alterDateTime($current, $method, $day, $hour, $minute) {
            $result = clone $current;
            $dtIntervalRep = 'P0Y0M' . $day . 'D' . 'T' . $hour . 'H' . $minute . 'M0S';
            $dateInterval = new \DateInterval($dtIntervalRep);
            if ($method == 'add') {
                $result = $result->add($dateInterval);
            } else if ($method == 'minus') {
                $result = $result->sub($dateInterval);
            }
            return $result;
        }

        $ymd = explode(' ', $_POST['currentDatetime']);
        $ymd = $ymd[0];
        $ymd = explode('/', $ymd);
        $year = $ymd[2];
        $month = $ymd[1];
        $day = $ymd[0];
        $hi = explode(' ', $_POST['currentDatetime'])[1];
        $hour = explode(':', $hi)[0];
        $minute = explode(':', $hi)[1];
        $currentDateTime = new \DateTime($_POST['timeZone']);
        $currentDateTime->setDate(intval($year), intval($month), intval($day));
        $currentDateTime->setTime($hour, $minute);
        $alteredDateTime = alterDateTime($currentDateTime, $_POST['updateType'], $_POST['day'], $_POST['hour'], $_POST['minute']);

        return json_encode(updateTimeZones($alteredDateTime));
    }

    /**
     * show employment history index
     */
    public function actionMycareer()
    {
        $this->validateAdminRole();
        $this->layout = 'careerlayout';
        $events = Career::find()->orderBy('sequence desc')->all();

        return $this->render('careerhistory', ['events' => $events]);
    }

    /**
     * add new career entry form
     */
    public function actionNewcareer()
    {
        $this->validateAdminRole();
        $this->layout = 'careerlayout';
        $model = new Career();

        return $this->render('newcareer', ['model' => $model]);
    }

    /**
     * submit new career entry form
     */
    public function actionCompletecareerreg()
    {
        $this->validateAdminRole();
        $this->layout = 'careerlayout';
        $career = new Career();
        if ($career->load(Yii::$app->request->post())) {
            Career::create($career);
        } else {
            print_r($job->getErrors());
            die();
        }

        return $this->redirect('mycareer');
    }

    /**
     * Edit career details
     * @param int $eventid
     */
    public function actionUpdatecareer($eventid)
    {
        $this->validateAdminRole();
        $this->layout = 'careerlayout';
        $career = Career::findOne($eventid);

        return $this->render('updatecareer', ['model' => $career]);
    }

    /**
     * submit update career form
     * @return void redirect to my career index page
     */
    public function actionCompleteupdatecareer()
    {
        $this->validateAdminRole();
        $this->layout = 'careerlayout';
        $career = new Career();
        if ($career->load(Yii::$app->request->post())) {
            $current = Career::find()->where(['sequence' => $career->sequence])->one();

            $current->isjoin = $career->isjoin;
            $current->company = $career->company;
            $current->date = $career->date;
            $current->brief = $career->brief;
            $current->achieve = $career->achieve;
            $current->modalname = $career->modalname;
            $current->logoname = $career->logoname;
            $current->sequence = $career->sequence;
            $current->save();
        } else {
            print_r($current->getErrors());
            die();
        }

        return $this->redirect('mycareer');
    }

    /**
     * validate User role
     */
    public function validateUserRole()
    {
        if(Yii::$app->user->id == null || Yii::$app->user->isGuest) {
            return $this->redirect(array('site/restrict'));
        }
    }

    /**
     * validate admin role
     */
    public function validateAdminRole()
    {
        if(Yii::$app->user->id == null || Yii::$app->user->identity->role != 'admin') {
            return $this->redirect(array('site/restrict'));
        }
    }

    /**
     * get user registration form
     */
    public function actionUserRegister()
    {
        $this->layout = 'main';
        $model = new UserRegisterForm();
        return $this->render('register', [
            'model'=> $model,
        ]);
    }

    /**
     * complete user registration form
     */
    public function actionCompleteUserRegister()
    {
        $this->layout = 'main';
        $model = new UserRegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            User::create($model);
            Yii::$app->session->setFlash('userCreated');

            return $this->render('register', ['model'=> $model]);
        }
    }
}
