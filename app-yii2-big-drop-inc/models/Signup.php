<?php

namespace app\models;

use Yii;

use mdm\admin\models\form\Signup as SignupForm;
use mdm\admin\models\Assignment;
use app\models\VendorMetadata;
use app\models\ClientMetadata;

class Signup extends SignupForm {

    public $role;
    public $first_name;
    public $last_name;

    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name'], 'filter', 'filter' => 'trim'],
            [['username', 'first_name', 'last_name'], 'required'],
            ['username', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'This username has already been taken.'],
            [['username', 'first_name', 'last_name'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['role', 'required'],
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();

            $user->username = $this->username;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->setpassword($this->password);
            $user->generateauthkey();

            if ($user->save()) {

                $modelVendorMetadata = new VendorMetadata();
                $modelClientMetadata = new ClientMetadata();

                    if ($user->role == 'vendor' && !$modelVendorMetadata->findOne(['id' => $user->id])) {
                        $modelVendorMetadata->vendor_id = $user->id;
                        $modelVendorMetadata->save();
                    }
                    if ($user->role == 'client' && !$modelClientMetadata->findOne(['id' => $user->id])) {
                        $modelClientMetadata->client_id = $user->id;
                        $modelClientMetadata->save();
                    }

                $model = new Assignment($user->id);
                $model->assign([$user->role]);
                return $user;
            }
        }
        return null;
    }

}