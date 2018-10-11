<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppsAsset;

$this->title= 'My Jobs';
AppsAsset::register($this);
?>
<div class="apps-index">
    <h3>My Job Applications</h3>
    <?php
    if(sizeof($jobs)> 0){
        foreach ($jobs as $job) {
            ?>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Job Title: <?= Html::encode($job->title); ?></div>
                    <div class="panel-body">
                        <div class="col-sm-6">
                            <label>Location</label>
                            <div class="input-group">
                                <input type="text" readonly="" value="<?= Html::encode($job->location); ?>" class="form-control" placeholder=""/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Appiled On</label>
                            <div class="input-group">
                                <input type="text" readonly="" value="<?= Html::encode($job->date); ?>" class="form-control" placeholder=""/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Company Name</label>
                            <div class="input-group">
                                <input type="text" readonly="" value="<?= Html::encode($job->company); ?>" class="form-control" placeholder=""/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Contact</label>
                            <div class="input-group">
                                <input type="text" readonly="" value="<?= Html::encode($job->contact); ?>" class="form-control" placeholder=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <p>There is no job created yet.</p>
        <?php
    }
    ?>
</div>
