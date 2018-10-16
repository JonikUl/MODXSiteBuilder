<?php
/**
 * PHP version 7.1
 * @author Original Author Ilya Utkin https://github.com/ilyautkin/siteExtra
 * @author This version author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 03.10.2018
 * 
 * Переименовываем файл ht.access. Если используется связка nginx и php-fpm, то этот резолвер бесполезен. Если же на сервере работает Apache, 
 * то ht.access надо переименовать, чтобы заработали дружественные URL.
 * 
 */

if ($object->xpdo) {
    /** @var modX $modx */
    $modx =& $object->xpdo;
    
    $inroot = $modx->getOption('base_path') . 'ht.access';
    $incore = $modx->getOption('core_path') . 'ht.access';
    
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            if (file_exists($inroot) || file_exists($incore)) {
                $new_inroot = $modx->getOption('base_path') . '.htaccess';
                $new_incore = $modx->getOption('core_path') . '.htaccess';
                $log = false;
                if (!file_exists($new_inroot)) {
                    rename($inroot, $new_inroot);
                    $log = true;
                }
                if (!file_exists($new_incore)) {
                    rename($incore, $new_incore);
                    $log = true;
                }
                if ($log) {
                    $modx->log(modX::LOG_LEVEL_INFO, 'Renaming <b>htaccess</b>');
                }
            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;