<?php

namespace app\controllers;

use app\models\Pictures;
use Yii;
use yii\db\Exception;
use yii\web\Controller;

class SiteController extends Controller
{
    private const MIN = 1;
    private const MAX = 1000;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex(): string
    {
        $pictures = Pictures::find()
            ->select(['picture_id'])
            ->all();
        $ids = array_map(fn ($id) => $id['picture_id'], $pictures);

        do {
            $id = rand(self::MIN, self::MAX);
        } while (in_array($id, $ids));

        return $this->render('index', [
            'id' => $id,
        ]);
    }

    /**
     * @throws Exception
     */
    public function actionApproval(): void
    {
        $model = new Pictures();
        $model->picture_id = (int) Yii::$app->request->post('picture_id');
        $model->is_approved = filter_var(Yii::$app->request->post('is_approved'), FILTER_VALIDATE_BOOLEAN);

        if ($model->save()) {
            return;
        }

        throw new Exception('Failed to approve picture');
    }
}
