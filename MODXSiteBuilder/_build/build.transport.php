<?php
/**
 * PHP version 7.1
 * @author Original Author Ilya Utkin https://github.com/ilyautkin/siteExtra
 * @author This version author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 03.10.2018
 */

/* Список файлов, которые будут запущены во время установки пакета. Сами резолверы хранятся в папке /_build/resolvers/ */
require_once 'build.class.php';
$resolvers = array(
    'providers',
    'addons',
    'rename_htaccess',
    'remove_changelog',
    'cache_options',
    'resources',
    'settings',
    'fix_translit',
    'content_type',
    'manager_customisation'
);

/* Прописываем список дополнений которые можно будет установить. В файле /includes/setup.options.php отмечаем опциональные плагины */
$addons = array(
    // Из официального репозитория modx.com/extras/
    array('name' => '', 'packages' => array(
            'translit' => '1.0.0-beta',
            'TinyMCE Rich Text Editor' => '1.2.1-pl',
            'FormIt' => '4.1.0-pl',
            'simpleUpdater' => '2.1.3-rc',
            'BackupMODX' => '1.0.5-beta',
            'Collections' => '3.6.0-pl',
            'MIGX' => '2.12.0-pl',
            'SimpleSearch' => '1.9.2-pl',
            'ReCaptchaV2' => '2.3.0-rc1',
            'SEO Pro' => '1.3.0-pl',
            'Login' => '1.9.7-pl',
            'Cron Manager' => '1.1.0-pl'
        )),
    // Из репозитория https://modstore.pro/packages/
    array('name' => 'modstore.pro', 'packages' => array(
            'Ace' => '1.6.5-pl',
            'pdoTools' => '2.11.2-pl',
            'autoRedirector' => '0.1.0-beta',
            'AdminTools' => '1.12.2-pl',
            'phpThumbOn' => '1.3.4-beta',
            'AjaxForm' => '1.1.9-pl',
            'controlErrorLog' => '1.2.1-pl',
            'elementNotes' => '1.0.1-pl',
            'miniShop2' => '2.4.15-pl'
        )),
);

/* Указываем имя стартера и версию */
$builder = new siteBuilder('MODXSiteBuilder', '1.0.1', 'rc', $resolvers, $addons);

/* Начинаем сборку */
$builder->build();
