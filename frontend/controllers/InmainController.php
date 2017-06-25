<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Inmain;
use frontend\models\InmainSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

// เรียกมาใช้เพิ่ม
use mcms\cart\Cart;
use frontend\models\Products;
use yii\helpers\Html;
use kartik\mpdf\Pdf;
/**
 * InmainController implements the CRUD actions for Inmain model.
 */
class InmainController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Inmain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InmainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inmain model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Inmain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inmain();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inmain model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inmain model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Inmain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Inmain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inmain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionAdd(){
         $model = new Inmain();

        if ($model->load(Yii::$app->request->post())) {            
            $id = Html::encode($model->product_id);
            $arr = Products::findOne(['id' => $id]);

            $cart = new Cart();

            $data = array(
                'id' => Html::encode($model->product_id),              
                'qty' => Html::encode($model->qty),
                'price' => Html::encode($model->price),                
                'exp' => Html::encode($model->exp),
                'name' => $arr->id                    
            );
            $cart->insert($data);
            return $this->redirect(['create']);
        }
        
    }
    public function actionIn() {    
        $model = new Inmain();
        return $this->render('in', [
            'model' => $model,
        ]);
    }
     public function actionIntotal() {    
        $model = new Inmain();
        if ($model->load(Yii::$app->request->post())) {
            $model->bill_no = $model->bill_no;           
            $model->inventory = 'i';
            $model->save();
            $cart = new Cart();
            foreach ($cart->contents() as $items) {
                $detail = new \frontend\models\Indetail();
                $detail->load(Yii::$app->request->post());
                $detail->inventory_id = $model->id;
                $detail->product_id = $items['id'];               
                $detail->qty = $items['qty'];
                $detail->price = $items['price'];                
                $detail->exp = $items['exp'];                
                $product = Products::findOne($items['id']);
                echo $product->qty = $product->qty + $items['qty']; 
                $product->save();
                $detail->save();
            }

            $cart->destroy();
            
            //return $this->redirect(['line-bot/curl']);
            
            return $this->redirect(['inmain/index']);
            
        }
    }
    public function actionItemdelete() {
        $cart = new Cart();
        $cart->destroy();
        return $this->redirect(['create']);
    }
    public function actionCartdelect($id) {
        $cart = new Cart();
        $cart->remove($id);
        return $this->redirect(['inmain/create']);
    }
    
    public function actionReport($id) {
    // get your HTML raw content without any layouts or scripts
        $model = \frontend\models\Indetail::find()->where(['id'=>$id])->one();
       $content = $this->renderPartial('_reportView',[
           'model'=>$model
       ]);
    
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Krajee Report Header'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render(); 
}
}
