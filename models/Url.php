<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Url as UrlHelper;

/**
 * This is the model class for table "url".
 *
 * @property integer $id
 * @property string $url
 */
class Url extends ActiveRecord
{
    const symbols = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url'], 'string', 'max' => 255],
            [['url'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'URL',
        ];
    }

    public function getShortUrl()
    {
        return UrlHelper::to(['site/redirect', 'token' => static::tokenize($this->id)], true);
    }

    /**
     * Get original URL by token.
     * @param string $token
     * @return string|null url or null if url not found.
     */
    public static function getOriginalUrl($token)
    {
        $id = static::unTokenize($token);

        if ($model = static::findOne($id))
            return static::findOne($id)->url;
        else
            return null;

    }

    /**
     * @param integer $int
     * @return string
     */
    public static function tokenize($int)
    {
        //return base_convert($int, 10, 36); // alternative solution

        $result = '';
        $n = floor($int/strlen(static::getSymbols()));
        if ($n > 0)
            $result .= static::tokenize($n);
        $result .= static::getSymbols()[$int % strlen(static::getSymbols())];

        return $result;
    }

    public static function unTokenize($string)
    {
        //return base_convert($string, 36, 10); // alternative solution

        $result = 0;
        $i = strlen($string);
        $string = strrev($string);
        while (isset($string[--$i])) {
            $result += strpos(static::getSymbols(), $string[$i]) * pow(strlen(static::getSymbols()), $i);
        }

        return $result;
    }

    /**
     * Helper method, because static::symbols[5] does not work.
     * @return string
     */
    public static function getSymbols() {
        return static::symbols;
    }
}