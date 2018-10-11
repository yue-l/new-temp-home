<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\DateTimeAsset;
$this->title= 'Date Time Calculator';
DateTimeAsset::register($this);
?>
<div class="apps-datetime">
    <h3>Date Time Calculator</h3>
    <div class="panel panel-primary">
        <div class="panel-heading">Date Time Calculator</div>
        <div class="panel-body">
            <div class="col-sm-8">
                <label>Choose Date Time</label>
                <input type='text' id="input-datetimepicker" class="form-control" placeholder="Click calender icon to choose"/><span id="datevalidation" hidden=""><font color="red">A valid date must exist.</font></span>
            </div>
            <div class="col-sm-4">
                <label>Choose Time Zone</label>
                <div class="form-group">
                    <select class="form-control" name="timezone" id="timezone">
                        <option value="UTC">UTC</option>
                        <option value="AEST">AEST</option>
                        <option value="CST">CST</option>
                        <option value="MST">MST</option>
                        <option value="NZST">NZST</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Modify Date and Time</div>
            <div class="panel-body">
                <div class="col-sm-12">
                    <label class="radio-inline"><input type="radio" checked id="addoperand" name="optradio">Add Date Time</label>
                    <label class="radio-inline"><input type="radio" id="minusoperand" name="optradio">Subtract Date Time</label>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <label>Day(s)</label>
                        <div class="input-group">
                            <input type="text" id="modifyDay" name="modifyDay" value="0" maxlength="6" class="form-control" placeholder=""/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label>Hour(s)</label>
                        <div class="input-group">
                            <input type="text" id="modifyHour" name="modifyHour" value="0" maxlength="6" class="form-control" placeholder=""/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label>Minute(s)</label>
                        <div class="input-group">
                            <input type="text" id="modifyMinute" name="modifyMinute" value="0" maxlength="6" class="form-control" placeholder=""/>
                        </div>
                    </div>
                    <div class="col-sm-12" >
                        <div class="alert alert-info" id="validation-notice" hidden="">
                            <strong>Info</strong> Removed non-number characters.
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" id="updateBtn" class="btn btn-primary">Click to update Date and Time</button>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">Timezones</div>
            <div class="panel-body" id="resultpanel" hidden="">
                <div class="col-md-4">
                    <span class="label label-default">UTC</span>
                    <input type="text" id="utcdisplay" readonly name="utcdisplay" value="" class="form-control" placeholder=""/>
                </div>
                <div class="col-sm-4">
                    <span class="label label-default">AEST</span>
                    <input type="text" id="aestdisplay" readonly name="aestdisplay" value="" class="form-control" placeholder=""/>
                </div>
                <div class="col-sm-4">
                    <span class="label label-default">NZST</span>
                    <input type="text" id="nzstdisplay" readonly name="nzstdiplay" value="" class="form-control" placeholder=""/>
                </div>
                <div class="col-sm-4">
                    <span class="label label-default">CST</span>
                    <input type="text" id="cstdisplay" readonly name="cstdisplay" value="" class="form-control" placeholder=""/>
                </div>
                <div class="col-sm-4">
                    <span class="label label-default">MST</span>
                    <input type="text" id="mstdisplay" readonly name="mstdisplay" value="" class="form-control" placeholder=""/>
                </div>
            </div>
        </div>
    </div>
</div>
