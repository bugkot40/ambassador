<?php

namespace app\models\ambassador;

use Yii;

/**
 * This is the model class for table "ambassador_photo".
 *
 * @property int $id
 * @property int $section_id
 * @property string $name
 *
 * @property AmbassadorSection $section
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ambassador_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => AmbassadorSection::className(), 'targetAttribute' => ['section_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'Section ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(AmbassadorSection::className(), ['id' => 'section_id']);
    }
}
