<?php

namespace frontend\controllers;

use frontend\models\LineBot;
use frontend\models\Departments;
use yii\helpers\Url;

class LineBotController extends \yii\web\Controller {

    public function actionCurl() 
       {
        $last_thread = LineBot::findOne(['name' => 'แจ้งเตือน']);
        $thread = \frontend\models\Departments::find()->orderBy(['id' => SORT_DESC])->one();
        if (!$last_thread) {
            $last_thread = new LineBot();
            $last_thread->name = 'แจ้งเตือน';
            $last_thread->last_id = $thread->id;
            $last_thread->save();
            $message = $thread->name;
            $res = $this->notify_message($message);
        } else {
            if ($last_thread->last_id != $thread->id) {
                $message = $thread->name;
                $res = $this->notify_message($message);
                $last_thread->last_id = $thread->id;
                $last_thread->save();
                
            return $this->redirect(['departments/index']);
            }
        }
    }

    public function notify_message($message) {
        $line_api = 'https://notify-api.line.me/api/notify';
        $line_token = '29HxBjqKQq8en5OxVVbeR7PXyl9lSTVkiPCGTk7UoYe';
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $line_token . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($line_api, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }

}
