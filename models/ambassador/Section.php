<?php

namespace app\models\ambassador;

use Yii;

/**
 * This is the model class for table "ambassador_section".
 *
 * @property int $id
 * @property string $status
 * @property string $name
 * @property string $text
 * @property string $banner
 *
 * @property AmbassadorPhoto[] $ambassadorPhotos
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ambassador_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['status', 'name', 'banner'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'name' => 'Name',
            'text' => 'Text',
            'banner' => 'Banner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmbassadorPhotos()
    {
        return $this->hasMany(AmbassadorPhoto::className(), ['section_id' => 'id']);
    }
}
