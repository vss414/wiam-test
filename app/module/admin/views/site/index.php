<?php
declare(strict_types=1);

use app\models\Pictures;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pictures');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pictures-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Picture',
                'format' => 'html',
                'value' => function (Pictures $model) {
                    return Html::img("https://picsum.photos/id/$model->picture_id/50/50");
                },
            ],
            'picture_id',
            [
                'attribute' => 'is_approved',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_approved ? 'Yes' : 'No';
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Yii::$app->getUrlManager()->createUrl([
                        "admin/site/$action",
                        'id' => $model->id,
                        'token' => \Yii::$app->request->get('token'),
                    ]);
                },
                'template'=>'{delete}',
            ],
        ],
    ]); ?>
</div>