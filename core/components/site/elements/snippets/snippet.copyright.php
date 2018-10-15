<?php
/**
 * PHP version 7.1
 * @author Original author iWatchYouFromAfar https://github.com/iWatchYouFromAfar
 * @version 1.0.0
 * 01.10.2018 - 04.10.2018
 * 
 * Скрипт автоматического копирайта на сайт
 * Use MODX: [[++site_name]] | [[copyright? &start=`2018`]]
 * Use Fenom: {$_modx->config.site_name | htmlent} | {'copyright' | snippet : ['start' => '2018']}
 * 
 */

$year = date("Y"); 
    if($year == $start) 
      { return $year; 
    } else { 
  return ''.$start.' – '.$year.''; 
 }