<?php
/**
 * Copyright (c) UNA, Inc - https://una.io
 * MIT License - https://opensource.org/licenses/MIT
 */

$aConfig = array(
    /**
     * Main Section.
     */
    'title' => 'Conversations',
    'version_from' => '10.0.4',
    'version_to' => '11.0.0',
    'vendor' => 'BoonEx',

    'compatible_with' => array(
        '11.0.0-B1'
    ),

    /**
     * 'home_dir' and 'home_uri' - should be unique. Don't use spaces in 'home_uri' and the other special chars.
     */
    'home_dir' => 'boonex/convos/updates/update_10.0.4_11.0.0/',
    'home_uri' => 'convos_update_1004_1100',

    'module_dir' => 'boonex/convos/',
    'module_uri' => 'convos',

    'db_prefix' => 'bx_convos_',
    'class_prefix' => 'BxCnv',

    /**
     * Installation/Uninstallation Section.
     */
    'install' => array(
        'execute_sql' => 1,
        'update_files' => 1,
        'update_languages' => 1,
        'clear_db_cache' => 1,
    ),

    /**
     * Category for language keys.
     */
    'language_category' => 'Conversations',

    /**
     * Files Section
     */
    'delete_files' => array(),
);