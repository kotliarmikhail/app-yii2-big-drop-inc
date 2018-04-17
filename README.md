# Task

### Installation

You may add

```
        "mdmsoft/yii2-admin": "~2.0",
        "philippfrenzel/yii2fullcalendar": "*",
        "kartik-v/yii2-widget-datepicker": "@dev"
```
to the require section of your composer.json file and execute php composer update.

### DB location:

db has been contained in the root application folder with the name - ```db_big_drop_inc.sql```

### Scheme db of application:
![](https://github.com/kotliarmikhail/app-yii2-big-drop-inc/blob/master/bd-scheme.png)

### More information:

Exist 3 entities of users: 
- admin;
- vendor;
- client.

For testing with admin permission (```username - admin, password - 123456```).

Other roles(for example client, vendor) can be chosen in process of the sign-up.

I have used RBAC for the application.

### The users have roles:
![](https://github.com/kotliarmikhail/app-yii2-big-drop-inc/blob/master/roles.png)

### The roles have permission:
![](https://github.com/kotliarmikhail/app-yii2-big-drop-inc/blob/master/permission.png)

### The permissions have access to some routes:
![](https://github.com/kotliarmikhail/app-yii2-big-drop-inc/blob/master/permission.png)
