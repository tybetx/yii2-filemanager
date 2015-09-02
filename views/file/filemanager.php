<?php

use pendalf89\filemanager\assets\FilemanagerAsset;
use pendalf89\filemanager\Module;
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel pendalf89\filemanager\models\Mediafile */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['moduleBundle'] = FilemanagerAsset::register($this);
?>

<header id="header"><span class="glyphicon glyphicon-picture"></span> <?= Module::t('main', 'File manager') ?></header>

<div id="filemanager" data-url-info="<?= Url::to(['file/info']) ?>">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '<div class="items">{items}</div>{pager}',
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(
                Html::img($model->getDefaultThumbUrl($this->params['moduleBundle']->baseUrl))
                . '<span class="checked glyphicon glyphicon-check"></span>',
                '#mediafile',
                ['data-key' => $key]
            );
        },
    ]) ?>

    <div class="dashboard">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-upload"></span> ' . Module::t('main', 'Upload manager'),
                ['file/uploadmanager'], ['class' => 'btn btn-default']) ?>

            <?= Html::a('<span class="glyphicon glyphicon-search"></span> ' . Module::t('main', 'Search files'),
                '#search-collapse', ['class' => 'btn btn-default','data'=>['toggle'=>'collapse']]) ?>
        </p>
        <div class="collapse" id="search-collapse">
            <div class="well well-sm">
              <?= $this->render('_search', ['model' => $searchModel]) ?>
            </div>
        </div>
        <div id="fileinfo">

        </div>
    </div>
</div>