<?php

use app\models\ambassador\Section;

class ContentGenerator
{
    public static function getMenu()
    {
        $menu['hotels'] = Section::find()->where(['status' => 'hotels'])->asArray()->all();
        $menu['relaxations'] = Section::find()->where(['status' => 'relaxations'])->asArray()->all();
        return $menu;
    }

    public static function getText(Section $section)
    {
        $dir = Yii::getAlias('text/ambassador');
        $file = $dir.$section->section.'txt';
        $fOpen = fopen($file, 'r');
        $text = file_get_contents($file);
        fclose($fOpen);
        return $text;
    }

}