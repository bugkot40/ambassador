<?php

use yii\db\Migration;
use app\models\ambassador\Section;

/**
 * Class m181205_190044_init_migration
 */
class m181205_190044_init_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ambassador_section', 'section', $this->string()->unique());
        $this->dropColumn('ambassador_section', 'text');
        $this->dropColumn('ambassador_section', 'banner');

        $modules = [
            'hotels' => [
                ['Ocean wing', 'ocean', 21],
                ['Marina wing', 'marina', 11],
                ['Garden wing', 'garden', 8],
                ['Inn wing', 'inn', 6]
            ],
            'relaxations' => [
                ['Пляж', 'beach', 5],
                ['Аквапарк', 'aquapark', 5],
                ['Океанариум', 'oceanarium', 9],
                ['Сад камней', 'stone_garden', 7],
                ['Морской круиз', 'cruise', 6],
                ['Рынки Паттаи', 'market', 7]
            ]
        ];

        foreach ($modules as $key => $sections) {
            foreach ($sections as $section) {
                $this->insert('ambassador_section', [
                        'status' => $key,
                        'name' => $section[0],
                        'section' => $section[1]                     ]
                );
                $arraySection = Section::find()->where(['name' => $section[0]])->asArray()->one();
                for ($i = 1; $i <= $section[2]; $i++) {
                    $this->insert('ambassador_photo', [
                        'name' => $i,
                        'section_id' => $arraySection['id']
                    ]);
                }
            }

        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }


}
