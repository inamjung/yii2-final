<?php

use frontend\models\Inmain;
use frontend\models\Indetail;
use frontend\models\Products;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>

    </style>
    <body>
        <div class="container" style="padding-left: 50px; font-size:15pt;">
            <div>
                <div style="padding-left:450px;"> เลขที่ใบส่งของ &nbsp;&nbsp; 
</div>
<!--                <img src="images/icons/k.jpg" width="75" height="71" class="pull-left" style="margin-top: 1px;">-->
               
            </div>
            

                <br>

                <table class="table" style="font-size:15pt; ">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td><strong>รายการ</strong></td>
                            <td><strong>จำนวน</strong></td>                            
                            <td><strong>ราคา</strong></td>
                            <td><strong>exp</strong></td>
                            <td><strong></strong></td>
                          

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach (Indetail::find()->where(['inventory_id' => $model->id])->all() as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->product->name;?></td>                               
                                <td style="text-align:center"><?= $row->qty; ?></td>
                                 <td style="text-align:center"><?= $row->price; ?></td>
                                <td style="text-align:center"><?= $row->exp; ?></td> 
                                <td style="text-align:center"></td>
                                <td></td>
                            </tr>                            
                        <?php endforeach; ?>                            
                    </tbody>                    
                </table>   


