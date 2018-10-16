<?php
/**
 * PHP version 7.1
 * @author Original author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Скрипт форматирования правильного склонения месяца
 * Use MODX: [[*publishedon:strtotime:correctMonth=`%b %d %Y`]] / [[*editedon:strtotime:correctMonth=`%b %d %Y`]]
 * Use Fenom: {$_modx->resource.publishedon|date_format|correctMonth:'%b %d %Y'} / {$_modx->resource.editedon|date_format|correctMonth:'%b %d %Y'}
 * 
 */

$month_arr = array('01' => 'Янв', 
  '02' => 'Февраля',
  '03' => 'Марта',
  '04' => 'Апреля',
  '05' => 'Мая',
  '06' => 'Июня',
  '07' => 'Июля',
  '08' => 'Августа',
  '09' => 'Сентября',
  '10' => 'Октября',
  '11' => 'Ноября',
  '12' => 'Декабря'
);

$d = $input; 
$month = strftime("%m",$d); 
$year = strftime("%Y",$d); 
$day = strftime("%d",$d); 
$month = $month_arr[$month]; 

return $day.' '.$month.' '.$year;