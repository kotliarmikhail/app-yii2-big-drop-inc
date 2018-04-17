<?php

namespace app\controllers;

use app\models\VendorMetadata;
use app\models\ClientMetadata;
use Yii;
use app\models\EventService;
use yii\data\ActiveDataProvider;
use app\models\EventVendor;
use yii\db\Query as Query;
use app\models\User;

class ClientController extends \yii\web\Controller
{


    public function actionShowSuccessOrder()
    {
        $clientId = (Yii::$app->user->id) ? Yii::$app->user->id : '';

        $dataProvider = new ActiveDataProvider([
            'query' => (new Query())
                ->select('*')
                ->from('event_service')
                ->leftJoin('service', 'event_service.service_id = service.id')
                ->where(['vendor_confirm' => 1])
                ->andwhere(['verify' => 1])
                ->andwhere(['client_id' => $clientId]),
        ]);

        return $this->render('show-success-order', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionListVendor()
    {
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

    //$id - vendor_id
    public function actionBuyVendor($id)
    {
        $vendorId = $id;
        $modelVendorMetadata = new VendorMetadata();
        $modelVendorMetadata = $modelVendorMetadata::findOne(['vendor_id' => $vendorId]);

        $levelVendor = $modelVendorMetadata->level;
        $clientId = Yii::$app->user->id;
        $modelEventVendor = new EventVendor();


        $vendorName = VendorMetadata::find()
            ->select('user.username')
            ->leftJoin('user', 'user.id = vendor_metadata.vendor_id')
            ->where(['vendor_metadata.vendor_id' => $vendorId])
            ->one();

        if ($modelEventVendor->load(Yii::$app->request->post())) {
            $modelEventVendor->vendor_id = $vendorId;
            $modelEventVendor->client_id = $clientId;
            $modelEventVendor->price = $modelEventVendor::MINIMUM_VENDOR_PRICE * $levelVendor;

            if ($modelEventVendor->save()) {
                Yii::$app->session->setFlash('success');
                return $this->redirect(['list-vendor']);
            }
        }

        return $this->render('buy-vendor', [
            'model' => $modelEventVendor,
            'vendorName' => $vendorName,
        ]);
    }

    public function actionShowSuccessOrderVendorTime()
    {
        $clientId = (Yii::$app->user->id) ? Yii::$app->user->id : '';

        $dataProvider = new ActiveDataProvider([
            'query' => (new Query())
                ->select(
                    'user.username,          
                    event_vendor.id,
                    event_vendor.id,
                    event_vendor.date,
                   event_vendor.price,
                   event_vendor.vendor_confirm'
                )
                ->from('event_vendor')
                ->leftJoin('user', 'user.id = event_vendor.vendor_id')
                ->andWhere(['client_id' => $clientId])
                ->andWhere(['user.status' => User::STATUS_ACTIVE])
        ]);

        return $this->render('show-success-order-vendor-time', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewProfile()
    {
        $clientId = (Yii::$app->user->id) ? Yii::$app->user->id : '';

        $modelClientMetadata = new ClientMetadata();

        $profile = $modelClientMetadata->find()->where(['client_id' => $clientId])->one();

        return $this->render('view-profile', [
            'model' => $profile,
        ]);
    }

    public function actionUpdateProfile($id)
    {
        $modelClientMetadata = new ClientMetadata();

        $profile = $modelClientMetadata->find()->where(['id' => $id])->one();

        if ($profile->load(Yii::$app->request->post())) {

            if ($profile->save()) {
                return $this->redirect(['view-profile']);
            }
        }

        return $this->render('update-profile', [
            'model' => $profile,
        ]);

    }

}
