<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use pendalf89\filemanager\Module;

/* @var $this yii\web\View */
/* @var $model pendalf89\filemanager\models\MediafileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="search-form">

    <?php $form = ActiveForm::begin([
        'action' => ['filemanager'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'filename')->textInput(['class' => 'form-control input-sm']) ?>

    <?= $form->field($model, 'alt')->textInput(['class' => 'form-control input-sm']) ?>

    <?= $form->field($model, 'description')->textInput(['class' => 'form-control input-sm']) ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('main', 'Search'), ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::resetButton(Module::t('main', 'Reset'), ['class' => 'btn btn-default btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

