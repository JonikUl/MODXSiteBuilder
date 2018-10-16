<?php
/**
 * PHP version 7.1
 * @author Original Author Ilya Utkin https://github.com/ilyautkin/siteExtra
 * @author This version author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Устанавливаем настройки MODX и компонентов
 * 
 */

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        /*
        * Component pdoTools settings
        * 1. Разрешить пользователям использовать одинаковые E-Mail адреса: Нет
        * 2. Создавать ЧПУ-псевдоним в реальном времени: Да
        * 3. Использовать ЧПУ-псевдоним: Да
        * 4. Строгий режим дружественных URL: Да
        * 5. Скрыть документ из меню по умолчанию: Да
        * 6. Публиковать по умолчанию: Нет
        * 7. Использовать вложенные URL: Да
        * 8. Шаблон для фильтрации символов в псевдонимах: Используется регулярное выражение от Ильи Уткина
        * 9. Убираем суффик псевдонима контейнеров
        * 10. Транслитерация псевдонимов: russian
        * 11. Поле для названия узла в дереве ресурсов: menutitle
        * 12. Поле для подсказки для узла в дереве ресурсов: textfield
        * 13. Страница ошибки 404 «Документ не найден»: указываем автоматически созданную страницу 404
        * 14. Страница «Сайт недоступен»: указываем автоматически созданную страницу 404
        * 15. Страница ошибки 403 «Доступ запрещен»: указываем автоматически созданную страницу 404
        * 16. Локаль: ru_RU.utf8
        * 17. Отправлять заголовок X-Powered-By: нет
        */

        // Разрешить пользователям использовать одинаковые E-Mail адреса: Нет
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'allow_multiple_emails'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'authentication',
            'xtype'     => 'combo-boolean',
            'value'     => '0',
            'key'       => 'allow_multiple_emails',
        ), '', true, true);
        $tmp->save();
        
        // Создавать ЧПУ-псевдоним в реальном времени: Да
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_alias_realtime'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_alias_realtime',
        ), '', true, true);
        $tmp->save();
        
        // Использовать ЧПУ-псевдоним: Да
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_urls'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_urls',
        ), '', true, true);
        $tmp->save();

        // Строгий режим дружественных URL: Да
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_urls_strict'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_urls_strict',
        ), '', true, true);
        $tmp->save();

        // Скрыть документ из меню по умолчанию: Да
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'hidemenu_default'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'hidemenu_default',
        ), '', true, true);
        $tmp->save();

        // Публиковать по умолчанию: Нет
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'publish_default'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'publish_default',
        ), '', true, true);
        $tmp->save();

        // Использовать вложенные URL: Да
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'use_alias_path'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'use_alias_path',
        ), '', true, true);
        $tmp->save();

        // Шаблон для фильтрации символов в псевдонимах: Используется регулярное выражение от Ильи Уткина
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_alias_restrict_chars_pattern'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'textfield',
            'value'     => file_get_contents($modx->getOption('core_path') . 'components/' . strtolower($options['site_category'])  . '/docs/friendly_alias_restrict_chars_pattern.txt'),
            'key'       => 'friendly_alias_restrict_chars_pattern',
        ), '', true, true);
        $tmp->save();

        // Убираем суффик псевдонима контейнеров
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'container_suffix'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'textfield',
            'value'     => '',
            'key'       => 'container_suffix',
        ), '', true, true);
        $tmp->save();

        // Транслитерация псевдонимов: russian
        if (in_array('translit', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_alias_translit'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'core',
                'area'      => 'furls',
                'xtype'     => 'textfield',
                'value'     => 'russian',
                'key'       => 'friendly_alias_translit',
            ), '', true, true);
            $tmp->save();
        }
        
        // Поле для названия узла в дереве ресурсов: menutitle
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'resource_tree_node_name'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'manager',
            'xtype'     => 'textfield',
            'value'     => 'menutitle',
            'key'       => 'resource_tree_node_name',
        ), '', true, true);
        $tmp->save();
        
        // Поле для подсказки для узла в дереве ресурсов: textfield
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'resource_tree_node_tooltip'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'manager',
            'xtype'     => 'textfield',
            'value'     => 'alias',
            'key'       => 'resource_tree_node_tooltip',
        ), '', true, true);
        $tmp->save();

        // Страница ошибки 404 «Документ не найден»: указываем автоматически созданную страницу 404
        $alias = '404';
        $tid = $modx->getOption('site_start');
        if ($resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $tid = $resource->get('id');
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'error_page'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => $tid,
            'key'       => 'error_page',
        ), '', true, true);
        $tmp->save();
        
        // Страница «Сайт недоступен»: указываем автоматически созданную страницу 404
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'site_unavailable_page'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => $tid,
            'key'       => 'site_unavailable_page',
        ), '', true, true);
        $tmp->save();
        
        // Страница ошибки 403 «Доступ запрещен»: указываем автоматически созданную страницу 404
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'unauthorized_page'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => $tid,
            'key'       => 'unauthorized_page',
        ), '', true, true);
        $tmp->save();

        // Локаль: ru_RU.utf8
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'locale'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'language',
            'xtype'     => 'textfield',
            'value'     => 'ru_RU.utf8',
            'key'       => 'locale',
        ), '', true, true);
        $tmp->save();

        // Отправлять заголовок X-Powered-By: нет
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'send_poweredby_header'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'system',
            'xtype'     => 'combo-boolean',
            'value'     => '0',
            'key'       => 'send_poweredby_header',
        ), '', true, true);
        $tmp->save();

        // НУЖНО ТЕСТИРОВАТЬ!!! URL фавиконки панели управления: 
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'manager_favicon_url'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'manager',
            'xtype'     => 'textfield',
            'value'     => $modx->getOption('assets_url') . 'components/' . strtolower($options['site_category']) . '/web/img/favicon.ico',
            'key'       => 'manager_favicon_url',
        ), '', true, true);
        $tmp->save();

        // НУЖНО ТЕСТИРОВАТЬ!!!
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'cache_prefix'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'caching',
            'xtype'     => 'textfield',
            'value'     => '',
            'key'       => 'cache_prefix',
        ), '', true, true);
        $tmp->save();
        
        /*
        * Component pdoTools settings
        * 1. Использовать Fenom на страницах: Да
        * 2. Разрешить PHP в Fenom: Да
        */
        
        // Использовать Fenom на страницах: Да
        if (in_array('pdoTools', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'pdotools_fenom_parser'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'pdotools',
                'area'      => 'pdotools_main',
                'xtype'     => 'combo-boolean',
                'value'     => '1',
                'key'       => 'pdotools_fenom_parser',
            ), '', true, true);
            $tmp->save();
        }

        // Разрешить PHP в Fenom: Да
        if (in_array('pdoTools', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'pdotools_fenom_php'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'pdotools',
                'area'      => 'pdotools_main',
                'xtype'     => 'combo-boolean',
                'value'     => '1',
                'key'       => 'pdotools_fenom_php',
            ), '', true, true);
            $tmp->save();
        }

        /*
        * Plugin Ace settings
        * 1. Размер шрифта в редакторе: 16px
        * 2. Размер табуляции в редакторе: 2
        * 3. Тема редактора: clouds_midnight
        */

        // Размер шрифта в редакторе: 16px
        if (in_array('Ace', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ace.font_size'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'ace',
                'area'      => 'general',
                'xtype'     => 'textfield',
                'value'     => '16px',
                'key'       => 'ace.font_size',
            ), '', true, true);
            $tmp->save();
        }
        
        // Размер табуляции в редакторе: 2
        if (in_array('Ace', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ace.tab_size'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'ace',
                'area'      => 'general',
                'xtype'     => 'textfield',
                'value'     => '2',
                'key'       => 'ace.tab_size',
            ), '', true, true);
            $tmp->save();
        }

        // Тема редактора: clouds_midnight
        if (in_array('Ace', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ace.theme'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'ace',
                'area'      => 'general',
                'xtype'     => 'textfield',
                'value'     => 'clouds_midnight',
                'key'       => 'ace.theme',
            ), '', true, true);
            $tmp->save();
        }

        /*
        * Plugin TinyMCE Rich Text Editor settings
        * 1. Вставить как текст: Да
        * 2. Путь к кастомному файлу external-config.json: ../assets/components/modxstarterbuild/tinymcerte/js/external-config.json
        * 3. Активируем все нужные плагины
        * 4. Устанавливаем тему lightgray для TinyMCERTE
        * 5. Настраиваем Панель инструментов 1
        * 6. Настраиваем Панель инструментов 2
        */

        // Вставить как текст: Да
        if (in_array('TinyMCE Rich Text Editor', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tinymcerte.paste_as_text'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'tinymcerte',
                'area'      => 'default',
                'xtype'     => 'combo-boolean',
                'value'     => '1',
                'key'       => 'tinymcerte.paste_as_text',
            ), '', true, true);
            $tmp->save();
        }

        // Путь к кастомному файлу external-config.json: ../assets/components/modxstarterbuild/tinymcerte/js/external-config.json
        if (in_array('TinyMCE Rich Text Editor', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tinymcerte.external_config'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'tinymcerte',
                'area'      => 'default',
                'xtype'     => 'textfield',
                'value'     => '../assets/components/modxstarterbuild/tinymcerte/js/external-config.json',
                'key'       => 'tinymcerte.external_config',
            ), '', true, true);
            $tmp->save();
        }

        // Активируем все нужные плагины
        if (in_array('TinyMCE Rich Text Editor', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tinymcerte.plugins'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'tinymcerte',
                'area'      => 'default',
                'xtype'     => 'textfield',
                'value'     => 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern modximage modxlink code paste spellchecker typograf',
                'key'       => 'tinymcerte.plugins',
            ), '', true, true);
            $tmp->save();
        }

        // Устанавливаем тему lightgray для TinyMCERTE
        if (in_array('TinyMCE Rich Text Editor', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tinymcerte.skin'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'tinymcerte',
                'area'      => 'default',
                'xtype'     => 'textfield',
                'value'     => 'lightgray',
                'key'       => 'tinymcerte.skin',
            ), '', true, true);
            $tmp->save();
        }

        // Настраиваем Панель инструментов 1
        if (in_array('TinyMCE Rich Text Editor', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tinymcerte.toolbar1'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'tinymcerte',
                'area'      => 'tinymcerte.toolbar',
                'xtype'     => 'textfield',
                'value'     => 'undo redo | formatselect fontsizeselect  | bold italic strikethrough forecolor backcolor removeformat | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent',
                'key'       => 'tinymcerte.toolbar1',
            ), '', true, true);
            $tmp->save();
        }

        // Настраиваем Панель инструментов 2
        if (in_array('TinyMCE Rich Text Editor', $options['install_addons'])) {
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tinymcerte.toolbar2'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'tinymcerte',
                'area'      => 'tinymcerte.toolbar',
                'xtype'     => 'textfield',
                'value'     => 'link unlink openlink | image media | template codesample code cite | hr | spellchecker typograf',
                'key'       => 'tinymcerte.toolbar2',
            ), '', true, true);
            $tmp->save();
        }

        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
