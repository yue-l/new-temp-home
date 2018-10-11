<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\DateTimeAsset;

$this->title= 'My Career Events';
DateTimeAsset::register($this);
$this->registerJsFile('@web/js/career.js', ['depends' => [app\assets\DateTimeAsset::className()]]);

?>

<div class="apps-index">
    <h3>Homepage Career Timeline Control</h3>
    <?php
    if(sizeof($events)> 0) {
        $index = 0;
        foreach ($events as $event) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::encode($event->company); ?>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" class="form-control" readonly="" value='<?= Html::encode($event->date);?>'/>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <div class="input-group">
                                    <input type="radio" id="departjoin<?php echo $index; ?>" name="departjoin<?php echo $index; ?>" value="1" <?php if($event->isjoin) echo " checked "; else echo " disabled "; ?>class="radio-inline">Join</input>
                                    <input type="radio" id="departjoin<?php echo $index; ?>" name="departjoin<?php echo $index; ?>" value="0" <?php if(!$event->isjoin) echo " checked "; else echo " disabled ";?>class="radio-inline">Departure</input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Order</label>
                                <input type="text" class="form-control" value="<?= Html::encode($event->sequence); ?>" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" class="form-control" value="<?= Html::encode($event->company); ?>" readonly=""/>
                            </div>
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Control Panel</div>
                                    <div class="panel-body">
                                        <div class="col-sm-4">
                                            <?= Html::a('Update', ['/apps/updatecareer', 'eventid' => $event->id], ['class'=>'btn btn-default']); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-danger" id="removeCareer" value="<?= $event->id;?>">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Modal Name</label>
                                <input type="text" class="form-control" value="<?= Html::encode($event->modalname); ?>" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Brief</label>
                                <textarea type="text" rows="8" class="form-control" readonly=""><?= Html::encode($event->brief); ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Logo Name</label>
                                <input type="text" class="form-control" value="<?= Html::encode($event->logoname); ?>" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Achievements</label>
                                <textarea type="text" rows="8" class="form-control" readonly=""><?= Html::encode($event->achieve); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $index++;
        }
    } else {
        ?>
        <p>You currently have not registered any car with us. Want to regiter one?<a href="<?= Url::to(['apps/register']); ?>">Click Here</a></p>
        <?php
    }
    ?>
</div>
