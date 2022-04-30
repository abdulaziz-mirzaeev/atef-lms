<?php

use yii\helpers\Url;
?>

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-tile text-center">
                    <a href="<?php echo Url::toRoute('/settings/person'); ?>">
                        People
                    </a>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-tile text-center">
                    <a href="<?php echo Url::toRoute('/settings/student'); ?>">
                        Students
                    </a>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-tile text-center">
                    <a href="<?php echo Url::toRoute('/settings/grade'); ?>">
                        Grades
                    </a>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h3 class="card-tile text-center">
                    <a href="<?php echo Url::toRoute('/settings/group'); ?>">
                        Groups
                    </a>
                </h3>
            </div>
        </div>
    </div>
</div>