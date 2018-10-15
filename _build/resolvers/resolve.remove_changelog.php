<?php
/**
 * PHP version 7.1
 * @author Original Author Ilya Utkin https://github.com/ilyautkin/siteExtra
 * @author This version author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 03.10.2018
 * 
 * Удаляем файл changelog.txt, чтобы исчезла ошибка об угрозе а так же в целях безопасности. Незачем посторонним знать нашу версию MODX
 * 
 */

if ($object->xpdo) {
	/** @var modX $modx */
	$modx =& $object->xpdo;
    
    $file = $modx->getOption('core_path') . 'docs/changelog.txt';
    
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:
			if (file_exists($file)) {
			    $modx->log(modX::LOG_LEVEL_INFO, 'Removing <b>changelog.txt</b>');
			    unlink($file);
			}
			break;

		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;