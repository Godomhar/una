<?php
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 *
 * @defgroup    UnaCore UNA Core
 * @{
 */

require_once('./inc/header.inc.php');
require_once(BX_DIRECTORY_PATH_INC . "design.inc.php");

bx_import('BxDolLanguages');

check_logged();

$sObject = isset($_REQUEST['object']) ? bx_process_input($_REQUEST['object']) : '';
$sAction = isset($_REQUEST['action']) && preg_match ('/^[A-Za-z_-]+$/', $_REQUEST['action']) ? bx_process_input($_REQUEST['action']) : '';

if(!empty($sObject)) {
    $oSearch = BxDolSearchExtended::getObjectInstance($sObject);
    if(!$oSearch || !$sAction) {
        echoJson(array());
        exit;
    } 

    $sMethod = 'action' . bx_gen_method_name($sAction);
    if(!method_exists($oSearch, $sMethod)) {
        echoJson(array());
        exit;
    }

    $oSearch->$sMethod();
    exit;
}

if(!empty($sAction)) {
    $sMethod = 'action' . bx_gen_method_name($sAction);
    if(!method_exists('BxDolSearchExtended', $sMethod)) {
        echoJson(array());
        exit;
    }

    BxDolSearchExtended::$sMethod();
    exit;
}

/** @} */
