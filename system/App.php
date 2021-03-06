<?php restrictAccess();
/**
 * Created by SUR-SER.
 * User: SURO
 * Date: 26.05.2015
 * Time: 7:07
 * Ядро API CCN - Currency Clearing Network
 */
use \Illuminate\Filesystem\Filesystem;


class App {

    /**
     * Название и версия
     */
    const ABBR = "FCB", CODE_NAME = "Banants", VERSION = "1.0.0.0";

    /**
     * Приставка к URL
     */
    const URI_EXT = ".html";

    /**
     * Храните экземпляр ядра
     * @var App
     */
    private static $_instance;

    /**
     * Экземпляр класса для работы с Http
     * @var Http
     */
    private $_http;

    /**
     * Текуший Слуг для УРЛ
     * @var Router
     */
    private $_current;


    private static $_config = [
        'base_url' => '/', //базовый урл
        'native_hash_key' => '$SHELBY$', //Дефолтный ключ шифрования
    ];

    /**
     * Сообщения
     * @var array
     */
    private static $_messages = [];

    private function __clone(){}
    private function __wakeup(){}
    private function __construct(){
        $this->_http = new Http();

        // Инициализация конфигов
        $fileSystem = new Filesystem();
        $files = $fileSystem->allFiles('config');
        foreach ($files as $file) {
            if(is_array($fileSystem->getRequire($file))){
                $this->setConfig($fileSystem->getRequire($file), $fileSystem->name($file));
            }
        }
    }

    public static function instance(){
        if(empty(static::$_instance)){
            static::$_instance = new static();
            static::$_messages = include_once (ROOT_PATH.'messages/errors'.EXT);
        }
        return static::$_instance;
    }

    /**
     * Текуший Слуг для УРЛ
     * @return string
     */
    public function getCurrentSlug()
    {
        return $this->_current = Router::getCurrentRoute()->getActionVariable('page') ?: 'home';
    }

    /**
     * Начинает работу приложения
     */
    public static function start(){
        static::instance();
        Router::startWorking();
    }

    /**
     * Возвращает базовый урл сайта
     * @return string
     */
    public static function baseUrl($absolute = false){
        return ($absolute) ? (App::instance()->http()->getProtocol().App::instance()->http()->getHostName().static::getConfig('base_url')) : static::getConfig('base_url');
    }

    /**
     * Возвращает заданный параметр конфигурации
     */
    public static function getConfig($key, $default = null){
        return array_get(static::$_config, $key, $default);
    }

    /**
     * Установить заданное значение конфигурации.
     *
     * @param  array|string  $key
     * @param  mixed   $value
     * @return void
     */
    public static function setConfig($key, $value = null)
    {
        if (is_array($key))
        {
            if(!empty($value))
            {
                foreach ($key as $innerKey => $innerValue)
                {
                    array_set(static::$_config[$value], $innerKey, $innerValue);
                }
            } else {
                foreach ($key as $innerKey => $innerValue)
                {
                    array_set(static::$_config, $innerKey, $innerValue);
                }
            }
        }
        else
        {
            array_set(static::$_config, $key, $value);
        }

    }
    /**
     * Возвращает объект http
     * @return \Http
     */
    public function http(){
        return $this->_http;
    }


    /**
     * Возвращает родной ключ хеширования
     * @return mixed
     */
    public function getNativeHashKey(){
        return static::getConfig('native_hash_key');
    }

    /**
     * Возвращает сообщение
     * @param $msg
     * @return null
     */
    public static function getMessage($msg){
        return isset(static::$_messages[$msg]) ? static::$_messages[$msg] : null;
    }
}