<?php

namespace app\modules\admin\controllers;

use app\models\VendorMetadata;
use yii\web\Controller;
use yii;
use yii\data\ActiveDataProvider;
use \yii\db\Query as Query;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionListVendor() {

        $dataProvider = new ActiveDataProvider([
            'query' => (new Query())
                ->select('*')
                ->from('vendor_metadata')
                ->leftJoin('user', 'user.id = vendor_metadata.vendor_id')
        ]);

        return $this->render('list-vendors', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdateLevel($id) {

        $modelVendorMetadata = VendorMetadata::find()->where(['vendor_id' => $id])->one();

        if ($modelVendorMetadata->load(Yii::$app->request->post()) && $modelVendorMetadata->save()) {
            return $this->redirect(['list-vendor', 'id' => $modelVendorMetadata->vendor_id]);
        }

        return $this->render('update-level', [
            'model' => $modelVendorMetadata,
        ]);
    }
}
