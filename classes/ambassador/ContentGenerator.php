<?php

namespace app\classes\ambassador;
use app\models\ambassador\Section;
use Yii;

class ContentGenerator
{
    /**
     * Generation of objects in the menu section
     * @return mixed
     */
    public static function getMenu()
    {
        $menu['hotels'] = Section::find()->where(['status' => 'hotels'])->asArray()->all();
        $menu['relaxations'] = Section::find()->where(['status' => 'relaxations'])->asArray()->all();
        return $menu;
    }

    /**
     * Reads text from a file for a specific section
     * @param Section $section
     * @return string
     */
    public static function getText(Section $section)
    {
        $dir = Yii::getAlias('text/ambassador/');
        $file = $dir.$section->section.'.txt';
        $fOpen = fopen($file, 'r');
        $text = file_get_contents($file);
        fclose($fOpen);
        return $text;
    }

}