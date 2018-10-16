<?php
/**
 * PHP version 7.1
 * @author Original Author Ilya Utkin https://github.com/ilyautkin/siteExtra
 * @author This version author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Файл транспортировки сниппетов
 * 
 */

/** @var modX $this->modx */
/** @var array $sources */

$snippets = array();

$tmp = array(
    'copyright' => array(
        'file' => 'copyright',
        'description' => 'Автоматический копирайт в футере. Вызов: [[++site_name]] | [[copyright? &start=`2018`]].',
        'category' => '01 - sitename.ru'
    ),
    'correctMonth' => array(
        'file' => 'correctMonth',
        'description' => 'Форматирование правильного склонения месяца. Вызывается: [[*publishedon:strtotime:correctMonth=`%b %d %Y`]] / [[*editedon:strtotime:correctMonth=`%b %d %Y`]].',
        'category' => '01 - sitename.ru'
    ),
    'dateRU' => array(
        'file' => 'dateRU',
        'description' => 'Перевод месяцев и дней с английского на русский для постов.',
        'category' => '01 - sitename.ru'
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
    
    /** @var modsnippet $snippet */
    $snippet = $this->modx->newObject('modSnippet');
    $snippet->fromArray(array(
        'name' => $k,
        'category' => @$v['category'],
        'description' => @$v['description'],
        'snippet' => getSnippetContent($this->config['PACKAGE_ROOT'] . 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/snippets/snippet.' . $v['file'] . '.php'),
        'static' => false,
        //'source' => 1,
        //'static_file' => 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/snippets/snippet.' . $v['file'] . '.php',
    ), '', true, true);

    $snippets[] = $snippet;
}
unset($tmp, $properties);

return $snippets;
