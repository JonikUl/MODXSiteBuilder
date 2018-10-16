<?php
/**
 * PHP version 7.1
 * @author Original author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Плагин транслитерации создаваемых папок с кириллицы на латиницу
 * 
 */

switch($modx->event->name) {
  case 'OnFileManagerDirCreate':
  case 'OnFileManagerDirRename':
    $basePath = $source->getBasePath();
    $dirName  = basename($directory);
    
    $name  = array_pop(array_filter(explode(DIRECTORY_SEPARATOR, $directory)));
    $tmpDoc = $modx->newObject('modResource');
    $newName = $tmpDoc->cleanAlias($name);
    
    if(strcmp($name, $newName) === 0) {
        return;
    }
    
    $oldPath = str_replace(realpath($basePath), '', $directory);
    $bases = $source->getBases($oldPath);
    $oldPath = $bases['pathAbsolute'].$oldPath;

    /** @var modDirectory $oldDirectory */
    $oldDirectory = $source->fileHandler->make($oldPath);
    /* make sure is a directory and writable */
    if (!($oldDirectory instanceof modDirectory)) {
        return false;
    }
    if (!$oldDirectory->isReadable() || !$oldDirectory->isWritable()) {
        return false;
    }
    /* sanitize new path */
    $newPath = $source->fileHandler->sanitizePath($newName);
    $newPath = $source->fileHandler->postfixSlash($newPath);
    $newPath = dirname($oldPath).'/'.$newPath;

    /* rename the dir */
    if (!$oldDirectory->rename($newPath)) {
        $modx->log(modX::LOG_LEVEL_ERROR, 'ERROR!');
        return false;
    }

    break;
}