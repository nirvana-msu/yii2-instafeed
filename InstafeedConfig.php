<?php
/**
 * @link https://github.com/nirvana-msu/yii2-instafeed
 * @copyright Copyright (c) 2016 Alexander Stepanov
 * @license MIT
 */

namespace nirvana\instafeed;

use yii\base\Object;

/**
 * Object for storing and retrieving instafeed config
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class InstafeedConfig extends Object
{
    /**
     * @var string Instagram user id
     */
    public $userId;

    /**
     * @var string Instagram client id
     */
    public $clientId;

    /**
     * @var string Instagram access token
     */
    public $accessToken;
}