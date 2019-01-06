<?php


namespace app\controllers;


use app\classes\ambassador\ContentGenerator;
use app\models\ambassador\Photo;
use app\models\ambassador\Section;
use yii\web\Controller;

class AmbassadorController extends Controller
{
    public $layout = 'ambassador/main';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSection($id)
    {
        $section = Section::findOne($id);
        $photos = Photo::find()->where(['section_id'=>$id])->asArray()->all();
        $text = ContentGenerator::getText($section);

        return $this->renderPartial('_section', [
            'section' => $section,
            'text' => $text,
            'photos' => $photos
        ]);
    }
}