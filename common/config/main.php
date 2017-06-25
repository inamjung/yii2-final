<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'th',
    'name'=>'Yii2-Final',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // ตั้งค่าเรียกใช้งาน ระบบuser ของ dektrium
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        'user' => [
            'identityClass' => 'detrium\user\models\User',
            'enableAutoLogin' => true,
            //'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        // จบตั้งค่าเรียกใช้งาน ระบบuser ของ dektrium
    ],
    'modules' => [
        'gridview' =>  [
             'class' => '\kartik\grid\Module'
         ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout'=>'left-menu'
        ],
        ],
        
//    'as access' => [
//        'class' => 'mdm\admin\components\AccessControl',
//        'allowActions' => [
//            'site/index',            
//            'user/*',           
//            'admin/*', 
//            'rbac/*',
//            'gii/*',
//            'setting/*',           
//            'departments/*',
//            'customers/*',
//          
//            ]
//        ],
];
