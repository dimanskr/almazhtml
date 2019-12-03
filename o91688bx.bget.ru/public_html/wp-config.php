<?php
/** Enable W3 Total Cache */
//Added by WP-Cache Manager

/**
* Основные параметры WordPress.
*
* Скрипт для создания wp-config.php использует этот файл в процессе
* установки. Необязательно использовать веб-интерфейс, можно
* скопировать файл в "wp-config.php" и заполнить значения вручную.
*
* Этот файл содержит следующие параметры:
*
* * Настройки MySQL
* * Секретные ключи
* * Префикс таблиц базы данных
* * ABSPATH
*
* @link https://codex.wordpress.org/Editing_wp-config.php
*
* @package WordPress
*/

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'o91688bx_blesk');

/** Имя пользователя MySQL */
define('DB_USER', 'o91688bx_blesk');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '28jan1984');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/** Увеличение памяти для сайта до 64М. */
define( 'WP_MEMORY_LIMIT', '128M' );

/**#@+
* Уникальные ключи и соли для аутентификации.
*
* Смените значение каждой константы на уникальную фразу.
* Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
* Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
*
* @since 2.6.0
*/
define('AUTH_KEY', 'z/fcSPqFVgewjBcY5WsP56KRYEdFLDSMaYa02PexWd3+Fa/aeOAI2z/0oYvvSU5/');
define('SECURE_AUTH_KEY', '48fldz3xtNm5yFnOyjfjy2alWDtUrsUKBaYKo9OR+ZExL+8hewOzFAM5w0PGwfZc');
define('LOGGED_IN_KEY', 'KuvOB5m4ZgEG2TPVnj3YADXTFSOXKyYqkY+nZsb5CQ7IOXM8VM0F7ZmV3d7MMYGj');
define('NONCE_KEY', '/C41KRpvJKJaXRZqaCZQEV7vEYPKcHsMsKcPfZS9yrx34PP3xyjO0AuD4ao0rqwa');
define('AUTH_SALT', 'AabMuc1/DD0LyTdP/XrrJxdYay3O2wBlSNhebvHFsJFZx3yUkShw4qbmozz43el6');
define('SECURE_AUTH_SALT', 'tQN3Aq4fdbQeMQZ1SOrS/GeEgIHPCbmDRCaoaIs6z2CPVH4avErQ6Dhnvrp2MnfF');
define('LOGGED_IN_SALT', 'i0oyi2B3GGXBBeXeOx7VaKOJBBUgrfkz/6sceDWIZlNSIGCufJGzKLvWpiUN9OLG');
define('NONCE_SALT', 'DQUDr9BGb/Pzq9nyyyzh/tkPGGwUviDFavWW7glqDPjnCBGT0YQwrjBFxF+3Qlhm');

/**#@-*/

/**
* Префикс таблиц в базе данных WordPress.
*
* Можно установить несколько сайтов в одну базу данных, если использовать
* разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
*/
$table_prefix = 'wp_';

/**
* Для разработчиков: Режим отладки WordPress.
*
* Измените это значение на true, чтобы включить отображение уведомлений при разработке.
* Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
* в своём рабочем окружении.
*
* Информацию о других отладочных константах можно найти в Кодексе.
*
* @link https://codex.wordpress.org/Debugging_in_WordPress
*/
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', true);
/* Это всё, дальше не редак;тируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
