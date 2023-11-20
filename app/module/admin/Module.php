<?php
declare(strict_types=1);

namespace app\module\admin;

use yii\web\ForbiddenHttpException;

/**
 * Admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\module\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if(\Yii::$app->request->get('token') !== 'xyz123') {
            throw new ForbiddenHttpException('You cannot open this page');
        }

        parent::init();
    }
}