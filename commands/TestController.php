<?php
/**
 * Created by PhpStorm.
 * User: kot
 * Date: 07.12.18
 * Time: 4:18
 */

namespace app\commands;


use yii\base\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {
        $hotels = [
            ['Ocean wing', 'ocean', 21],
            ['Marina wing', 'marina', 11],
            ['Garden wing', 'garden', 8],
            ['Inn wing', 'inn', 6]
        ];

        $i = 0;
        foreach ($hotels as $hotel) {

            $arr[$i]['status'] = 'hotel';
            $arr[$i]['name'] = $hotel[0];
            $arr[$i]['folder'] = $hotel[1];
            $arr[$i]['banner'] = $hotel[1] . '.jpg';
            $i++;

        }
        print_r($arr);
    }
}