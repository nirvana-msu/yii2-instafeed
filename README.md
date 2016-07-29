yii2-instafeed
================

Yii2 extension for [instafeed](https://github.com/stevenschobert/instafeed.js) Instagram javascript plugin,
providing a simple way to add Instagram photos to your website.

This widget publishes assets and registers necessary code to run plugin. It also optionally
renders a div container that plugin would automatically look for, to fill with thumbnails.
You can control the name of a created javascript plugin variable by configuring widget id.

## Resources
 * Yii2 [extension page](http://www.yiiframework.com/extension/yii2-instafeed)
 * Instafeed javascript plugin [documentation](https://github.com/stevenschobert/instafeed.js)

## Installation

### Composer

Add extension to your `composer.json` and update your dependencies as usual, e.g. by running `composer update`
```js
{
    "require": {
        "nirvana-msu/yii2-instafeed": "1.0.*@dev"
    }
}
```

##Widget Configuration

 * $renderThumbnailDiv *boolean* whether to render `<div id="instafeed"></div>` container that plugin would look for by default
 * $pluginOptions *array* instafeed javascript plugin options. For more information refer to instafeed [documentation](https://github.com/stevenschobert/instafeed.js)
   
##Sample Usage

The only thing you have to configure are plugin option.
For example, to fetch images from your account, set the `get`, `userId` and `accessToken` options:

```php
echo Instafeed::widget([
    'pluginOptions' => [
        'get' => 'user',
        'userId' => 'YOUR_USER_ID',     // your Instagram account id, not username!
        'accessToken' => 'YOUR_ACCESS_TOKEN',
    ],
]);
```

If, for convenience, you prefer to store application-wide configuration such as access token(s), client id(s) and user id(s)
in an application component, you may find `InstafeedConfig` class useful, for example:

In an application config:
```php
'components' => [
    'instafeedConfig' => [
        'class' => InstafeedConfig::className(),
        'userId' => 'YOUR_USER_ID',
        'accessToken' => 'YOUR_ACCESS_TOKEN',
    ],
],
```

In a view:
```php
$config = Yii::$app->instafeedConfig;
echo Instafeed::widget([
    'pluginOptions' => [
        'get' => 'user',
        'userId' => $config->userId,
        'accessToken' => $config->accessToken,
    ],
]);
```

##License

Extension is released under MIT license.
