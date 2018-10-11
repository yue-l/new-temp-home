<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppsAsset;

$this->title= 'Fuel Tracker';
AppsAsset::register($this);
?>
<div class="apps-index">
    <h3>My Vehicles</h3>
    <?php
    if(sizeof($cars)> 0){
        foreach ($cars as $car) {
            ?>
            <div class="panel panel-default" id="<?= Html::encode($car->plate);?>">
                <div class="panel-heading">
                    <?= Html::encode($car->plate); ?>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Plate</label>
                                <input type="text" class="form-control" readonly="" value='<?= Html::encode($car->plate);?>'/>
                            </div>
                            <div class="form-group">
                                <label>Body Type</label>
                                <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->body_type);?>"/>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Control Panel</div>
                                    <div class="panel-body">
                                        <div class="col-sm-4">
                                            <?= Html::a('Update', ['apps/refuel', 'carid' => $car->id], ['class'=>'btn btn-default']); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?= Html::a('Status', ['/apps/checkstatus','carid' => $car->id], ['class' => "btn btn-primary"]);?>
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-danger" id="removeCarBtn" value="<?= $car->id;?>">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Make</label>
                                <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->brand);?>"/>
                            </div>
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->model);?>"/>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->year);?>"/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Current Odo Reading</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->odometer);?>"/>
                                    <span class="input-group-addon">Km</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Driver Travel Distance</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->traveldistance);?>" />
                                    <span class="input-group-addon">Km</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usr">Overral Cost</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->cost);?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Overral Fuel Consumption</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" value="<?= Html::encode($car->fuel);?>"/>
                                    <span class="input-group-addon">L</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <p>You currently have not registered any car with us. Want to regiter one?<a href="<?= Url::to(['apps/register']); ?>">Click Here</a></p>
        <?php
    } ?>
</div>
