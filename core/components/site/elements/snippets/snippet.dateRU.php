<?php
/**
 * PHP version 7.1
 * @author Original author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Скрипт перевода месяцев и дней с английского на русский для постов
 * Use MODX: [[*publishedon:dateRU=`%month`]] / [[*editedon:dateRU=`%month`]]
 * Use Fenom: {$_modx->resource.publishedon|dateRU:'%month'} / {$_modx->resource.editedon|dateRU:'%month'}
 * 
 */

// Сначала язык берётся из системных настроек
$cultureKey = $modx->getOption('cultureKey');

// Переопределение из параметров сниппета
$cultureKey = $modx->getOption('cultureKey', $scriptProperties, $cultureKey);
$input = (int)$input;

// Language data
switch ($cultureKey) {
	case 'en':
		$monthes = 'january, february, march, april, may, june, july, august, september, october, november, december';
		$weekdays = 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday';
	break;
	case 'ru':
	default:
		$monthes = 'Января, Февраля, Марта, Апреля, Мая, Июня, Июля, Августа, Сентября, Октября, Ноября, Декабря';
		$weekdays = 'Понедельник, Вторник, Среда, Четверг, Пятница, Суббота, Воскресенье';
	break;
}

$monthes = explode(',', $monthes);
array_unshift($monthes, '');
$weekdays = explode(',', $weekdays);

$monthName = trim($modx->getOption(date('n', $input), $monthes, ''));
$weekdayName = trim($modx->getOption((date('w', $input)+6)%7, $weekdays, ''));

// Будущий результат
$output = $options;

// Название месяца и дня
$output = str_replace('%month', $monthName, $output);
$output = str_replace('%weekday', $weekdayName,	$output);

// Замена стандартных значений
$chars = 'HisdjmwY';
$charsLength = strlen($chars);
for ($i = 0; $i < $charsLength; $i++) {
	$output = str_replace('%'.$chars[$i], date($chars[$i], $input), $output);
}

return $output;