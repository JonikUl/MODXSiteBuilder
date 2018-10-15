<?php
/**
 * PHP version 7.1
 * @author Original Author Ilya Utkin https://github.com/ilyautkin/siteExtra
 * @author This version author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Файл транспортировки плагинов
 * 
 */

/** @var modX $this->modx */
/** @var array $sources */

$plugins = array();

$tmp = array(
    'dirRename' => array(
        'file' => 'dirRename',
        'description' => 'Плагин транслитерации создаваемых папок с кириллицы на латиницу',
        'category' => '01 - sitename.ru',
        'events' => array(
            'OnFileManagerDirCreate' => array(),
            'OnFileManagerDirRename' => array()
        )
    ),
    'fileRename' => array(
        'file' => 'fileRename',
        'description' => 'Плагин транслитерации загружаемых файлов с кириллицы на латиницу',
        'category' => '01 - sitename.ru',
        'events' => array(
            'OnFileManagerUpload' => array()
        )
    ),
);

foreach ($tmp as $k => $v) {

    // create category
    $ifCategory = $this->modx->getObject( 'modCategory', array('category' => $v['category']) );
    if( $ifCategory == '' ){
      $category = $this->modx->newObject('modCategory');
      $category->set('category', $v['category']);
      $category->save();
      $id_category = $category->get('id'); 
    } else {
      $id_category = $ifCategory->get('id');
    }

    /** @var modplugin $plugin */
    $plugin = $this->modx->newObject('modPlugin');
    $plugin->fromArray(array(
        'name' => $k,
        'category' => @$v['category'],
        'disabled' => $k == 'fileRename' ? 1 : 0, // Выключаем по умолчанию плагин fileRename
        'description' => @$v['description'],
        'plugincode' => getSnippetContent($this->config['PACKAGE_ROOT'] . 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/plugins/plugin.' . $v['file'] . '.php'),
        'static' => false,
        //'source' => 1,
        //'static_file' => 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/plugins/plugin.' . $v['file'] . '.php',
    ), '', true, true);

    // create plugin events
    $events = array();
    if (!empty($v['events'])) {
        foreach ($v['events'] as $k2 => $v2) {
            /** @var modPluginEvent $event */
            $event = $this->modx->newObject('modPluginEvent');
            $event->fromArray(array_merge(
                array(
                    'event' => $k2,
                    'priority' => 0,
                    'propertyset' => 0,
                ), $v2
            ), '', true, true);
            $events[] = $event;
        }
        unset($v['events']);
    }

    if (!empty($events)) {
        $plugin->addMany($events);
    }
    $plugins[] = $plugin;
}
unset($tmp, $properties);

return $plugins;