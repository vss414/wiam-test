<?php
declare(strict_types=1);

namespace app\models;

use Yii;

/**
 * This is the model class for table "pictures".
 *
 * @property integer $id
 * @property integer $picture_id
 * @property boolean $is_approved
 */
class Pictures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['picture_id'], 'required'],
            [['picture_id'], 'integer'],
            [['is_approved'], 'boolean'],
            [['picture_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'picture_id' => Yii::t('app', 'Picture ID'),
            'is_approved' => Yii::t('app', 'Is approved?'),
        ];
    }
}