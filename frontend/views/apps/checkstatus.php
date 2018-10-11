<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppsAsset;
$this->registerJsFile('@web/js/ticketstatus.js');
$this->title= 'Fuel Tracker - Fuel Tickets';
AppsAsset::register($this);
?>
<div class="apps-refuelstatus panel panel-default">
    <div class="panel-heading">
        <h3>Refuel Tickets for: <?= Html::encode($model->plate); ?></h3>
    </div>
    <div class="panel-body">
        <?php if(sizeof($tickets)> 0){ ?>

            <table id="fueltickets-table" class="display tabletable-striped table-bordered" style="width:100%" >
                <thead>
                    <tr>
                        <th>Refuel Date Time</th>
                        <th>Historical Odo Reading</th>
                        <th>Refuel Amount</th>
                        <th>Refuel Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tickets as $ticket) {
                        ?>
                        <tr>
                            <td><?= Html::encode($ticket->createdtime);?></td>
                            <td><?= Html::encode($ticket->currentodo) . " Km";?></td>
                            <td><?= Html::encode($ticket->fuelamount) . " L";?></td>
                            <td><?= "$ " . Html::encode($ticket->fuelcost);?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            <p><?= Html::encode($model->plate);?> has no refuel record</p>
            <?php
        } ?>
    </div>
</div>
