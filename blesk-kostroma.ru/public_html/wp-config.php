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
define('DB_NAME', 'o91688bx_silver');
/** Имя пользователя MySQL */
define('DB_USER', 'o91688bx_silver');
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
define('AUTH_KEY', 'bKxzbbVcGNZPWeXrd7PlBg7xvc19PTs8qI0BMw5lXuh6DqHe8GYwuZQaoiXEesTs');
define('SECURE_AUTH_KEY', 'jC3F9n5nwuSWyRDLoEuVEy2iqvjd0swBdF/5UJaJ3By8c8QygtgMIrgUoAdnb5oT');
define('LOGGED_IN_KEY', 'W0xFoc2HJV0++qCyxaEnXw4s89CW/c0af5PCtfyoQWKyeNxfuJJx9PykEKgg3JSW');
define('NONCE_KEY', 'wwmZiZS5wj2h9RXLchWZOJryW7KRwNZo1YDEEqFRrjYe0CcNnX26eIfnX2hMDiHD');
define('AUTH_SALT', '2odtWe7h37LTwivtfIZcuZfZ54h0/2HL2ZQtv9HZRY2a1k5epSKKk8j8tcxwf4Ft');
define('SECURE_AUTH_SALT', '2xYl9oQbj1nUV4fIsUgmqU/k0NXhpufKLTwX6kTstww854ftFgvj2l/eF48k1W8r');
define('LOGGED_IN_SALT', 'Lze6a0VgyEmE9N8R9tCyDSarUDDBEbE1sUPgXRUlzSi2WTQTw3kV9GiW8RAOpO5B');
define('NONCE_SALT', 'UhhlNPDx8a2zMzLxEpYhWj4kIuNc1KdaP+NJx7KKFyeid2DsRuc8BtWul3AvMMAk');
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
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
/* Это всё, дальше не редак;тируем. Успехов! */
/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
