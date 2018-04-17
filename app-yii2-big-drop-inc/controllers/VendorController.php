<?php

namespace app\controllers;

use app\models\VendorMetadata;
use app\models\User;
use Yii;
use app\models\EventService;
use app\models\EventVendor;
use yii\data\ActiveDataProvider;
use \yii\db\Query as Query;

class VendorController extends \yii\web\Controller
{

    const VENDOR_CONFIRM_ON = 1;
    const VENDOR_CONFIRM_OFF = 0;

    public function actionService()
    {
        return $this->redirect(['service/index']);
    }

    public function actionListVerified()
    {
        $vendorId = (Yii::$app->user->id) ? Yii::$app->user->id : '';

        $dataProvider = new ActiveDataProvider([
            'query' => (new Query)
                ->select('*')
                ->from('event_service')
                ->leftJoin('service', 'event_service.service_id = service.id')
                ->where(['vendor_confirm' => NULL])
                ->where(['verify' => NULL])
                ->where(['user_id' => $vendorId])
        ]);

        return $this->render('list-verified', [
            'dataProvider' => $dataProvider,
        ]);

    }

//id - serviceID
    public function actionActivateService($id)
    {
        $eventService = EventService::find()
            ->where(['service_id' => $id])
            ->andWhere(['vendor_confirm' => $this::VENDOR_CONFIRM_OFF])
            ->one();

        if ($eventService->vendor_confirm == $this::VENDOR_CONFIRM_OFF) {
            $eventService->vendor_confirm = $this::VENDOR_CONFIRM_ON;
            if ($eventService->save()) {
                return $this->redirect(['/vendor/list-verified']);
            } else {
                $errors = $eventService->firstErrors;
                throw new UserException(reset($errors));
            }
        }

        return $this->redirect(['/vendor/list-verified']);
    }

//id - serviceID
    public function actionDeactivateService($id)
    {
        $eventService = EventService::find()
            ->where(['service_id' => $id])
            ->andWhere(['vendor_confirm' => $this::VENDOR_CONFIRM_ON])
            ->one();

        if ($eventService->vendor_confirm == $this::VENDOR_CONFIRM_ON) {
            $eventService->vendor_confirm = $this::VENDOR_CONFIRM_OFF;
            if ($eventService->save()) {
                return $this->redirect(['/vendor/list-verified']);
            } else {
                $errors = $eventService->firstErrors;
                throw new UserException(reset($errors));
            }
        }

        return $this->redirect(['/vendor/list-verified']);
    }

    public function actionShowSuccessOrder()
    {
        $vendorId = (Yii::$app->user->id) ? Yii::$app->user->id : '';

        $dataProvider = new ActiveDataProvider([
            'query' => (new \yii\db\Query())
                ->select('*')
                ->from('event_service')
                ->leftJoin('service', 'event_service.service_id = service.id')
                ->where(['vendor_confirm' => 1])
                ->andwhere(['verify' => 1])
                ->andwhere(['user_id' => $vendorId])
        ]);

        return $this->render('show-success-order', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEditVendorProfile()
    {
        $vendorId = (Yii::$app->user->id) ? Yii::$app->user->id : '';

        $dataProvider = new ActiveDataProvider([
            'query' => (new Query())
                ->select('*')
                ->from('user')
                ->leftJoin('vendor_metadata', 'user.id = vendor_metadata.vendor_id')
                ->andWhere(['vendor_id' => $vendorId])
        ]);

        return $this->render('/vendor-metadata/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    //List of those who want to buy time vendor's
    public function actionListClientsForBuyTime()
    {
        $vendorId = (Yii::$app->user->id) ? Yii::$app->user->id : '';

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
                ->leftJoin('user', 'user.id = event_vendor.client_id')
                ->andWhere(['vendor_id' => $vendorId])
                ->andWhere(['user.status' => User::STATUS_ACTIVE])
        ]);

        return $this->render('list-client-for-buy-time', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionActivateVendorTime($id)
    {
        $modelEventVendor = EventVendor::find()
            ->where(['id' => $id])
            ->andWhere(['vendor_confirm' => $this::VENDOR_CONFIRM_OFF])
            ->one();

        if ($modelEventVendor->vendor_confirm == $this::VENDOR_CONFIRM_OFF) {
            $modelEventVendor->vendor_confirm = $this::VENDOR_CONFIRM_ON;
            if ($modelEventVendor->save()) {
                return $this->redirect(['/vendor/list-clients-for-buy-time']);
            } else {
                $errors = $modelEventVendor->firstErrors;
                throw new UserException(reset($errors));
            }
        }
        return $this->redirect(['/vendor/list-clients-for-buy-time']);
    }

//id - serviceID
    public function actionDeactivateVendorTime($id)
    {
        $modelEventVendor = EventVendor::find()
            ->where(['id' => $id])
            ->andWhere(['vendor_confirm' => $this::VENDOR_CONFIRM_ON])
            ->one();

        if ($modelEventVendor->vendor_confirm == $this::VENDOR_CONFIRM_ON) {
            $modelEventVendor->vendor_confirm = $this::VENDOR_CONFIRM_OFF;
            if ($modelEventVendor->delete()) {
                return $this->redirect(['/vendor/list-clients-for-buy-time']);
            } else {
                $errors = $modelEventVendor->firstErrors;
                throw new UserException(reset($errors));
            }
        }

        return $this->redirect(['/vendor/list-clients-for-buy-time']);
    }
}
