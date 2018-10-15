<?php
/**
 * PHP version 7.1
 * @author Original Author Ilya Utkin https://github.com/ilyautkin/siteExtra
 * @author This version author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Файл транспортировки чанков
 * 
 */

/** @var modX $this->modx */
/** @var array $sources */

$chunks = array();

$tmp = array(
    'performance' => array(
        'file' => 'performance',
        'description' => 'Код для тестирования и вывода результатов производительности сайта.',
        'category' => '01 - sitename.ru'
    )
);

$setted = false;
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
    
    /** @var modchunk $chunk */
    $chunk = $this->modx->newObject('modChunk');
    $chunk->fromArray(array(
        'name' => $k,
        'category' => @$v['category'],
        'description' => @$v['description'],
        'content' => file_get_contents($this->config['PACKAGE_ROOT'] . 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/chunks/chunk.' . $v['file'] . '.html'),
        'static' => false,
        //'source' => 1,
        //'static_file' => 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/chunks/chunk.' . $v['file'] . '.html',
    ), '', true, true);
    $chunks[] = $chunk;
}
unset($tmp, $properties);

return $chunks;