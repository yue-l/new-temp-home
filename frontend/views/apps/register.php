<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// typeahead feature
use kartik\widgets\Typeahead;
use app\assets\AppsAsset;

$this->title= 'Fuel Tracker - register';
AppsAsset::register($this);

$makes = [
    "Alfa romeo","Aston martin","Audi","Austin","Bentley","BMW","Cadillac","Chery","Chevrolet","Chrysler","Citroen","Daewoo","Daihatsu","Daimler","Dodge","Ferrari","Fiat","Ford","Foton","Geely","GMC","Great Wall","Holden","Honda","Hummer","Hyundai","Isuzu","Iveco","Jaguar","Jeep","Kia","Lamborghini","Land Rover","LDV","Lexus","Lotus","Mahindra","Maserati","Mazda","McLaren","Mercedes-Benz","MG","Mini","Mitsubishi","Morris","Nissan","Opel","Peugeot","Pontiac","Porsche","Renault","Rolls-Royce","Rover","Saab","Seat","Skoda","Smart","Ssangyong","Subaru","Suzuki","Toyota","Triumph","TVR","Vauxhall","Volkswagen","Volvo",
];
$bodies =[
    "Convertible", "Coupe", "Hatchback", "Sedan", "Station Wagon", "R/V SUV", "Ute", "Van",
];
?>
<div class="apps-register">
    <h3>Register New Vehicle</h3>
    <!-- <div class="col-sm-6"> -->
    <?php $form = ActiveForm::begin([
        'id' => 'carregisterform',
        'action' => ['apps/completeregister'],
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'plate'); ?>
    <?= $form->field($model, 'brand')->widget(Typeahead::classname(), [
        'options' => ['placeholder' => 'Filter as you type ...'],
        'pluginOptions' => ['highlight'=>true],
        'dataset' => [
            [
                'local' => $makes,
                'limit' => 10
            ]
        ]
    ]); ?>
    <?= $form->field($model, 'odometer'); ?>
    <?= $form->field($model, 'model'); ?>
    <?= $form->field($model, 'year'); ?>
    <?= $form->field($model, 'body_type')->widget(Typeahead::classname(),[
        'options' => ['placeholder' => 'Filter as you type ...'],
        'pluginOptions' => ['hightlight' => true],
        'dataset' => [
            [
                'local' => $bodies,
                'limit' => 3
            ]
        ]
    ]); ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::button('Complete Registration', ['id'=>'carRegBtn', 'class' => 'btn btn-primary', 'name' => 'carRegBtn']); ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default', 'name' => 'reset-button']); ?>
            <a href="index">
                <?= Html::button('Cancel', ['class' => 'btn btn-danger', 'name' => 'cancel-register-btn']); ?>
            </a>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="col-sm-6">

    </div>

</div><!-- fueltracker-register -->
