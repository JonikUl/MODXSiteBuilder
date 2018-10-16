<?php
/**
 * PHP version 7.1
 * @author Original author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Плагин транслитерации загружаемых файлов с кириллицы на латиницу
 * 
 */

switch ($modx->event->name) {
    case 'OnFileManagerUpload':
        $generator = $modx->newObject('modResource');
        $bases = $source->getBases($directory);
        $fullPath = $bases['pathAbsolute'].ltrim($directory,'/');
        $directory = $source->fileHandler->make($fullPath);
        foreach ($files as $file) {
            $ext = @pathinfo($file['name'],PATHINFO_EXTENSION);
            $name = str_replace('.'.$ext,'',$file['name']) . '-' . date('d-m-Y-H-i-s').'.'.$ext; // Формат: название файла-день-месяц-год-час-минута-день
            rename($directory->getPath().$file['name'], $directory->getPath() .
            $generator->cleanAlias($name));
        }
        break;
    default: break;
}
return true;