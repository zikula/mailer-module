<?php
/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv2.1 (or at your option, any later version).
 * @package Zikula
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */


/**
 * Initialise the Admin module.
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * @author Mark West
 *
 * @return boolean True if initialisation succcesful, false otherwise.
 */
function Admin_init()
{
    if (!DBUtil::createTable('admin_category')) {
        return false;
    }

    if (!DBUtil::createTable('admin_module')) {
        return false;
    }

    ModUtil::setVar('Admin', 'modulesperrow', 3);
    ModUtil::setVar('Admin', 'itemsperpage', 15);
    ModUtil::setVar('Admin', 'defaultcategory', 5);
    ModUtil::setVar('Admin', 'modulestylesheet', 'navtabs.css');
    ModUtil::setVar('Admin', 'admingraphic', 1);
    ModUtil::setVar('Admin', 'startcategory', 1);
    // change below to 0 before release - just makes it easier doing development meantime - drak
    // we can now leave this at 0 since the code also checks the development flag (config.php) - markwest
    ModUtil::setVar('Admin', 'ignoreinstallercheck', 0);
    ModUtil::setVar('Admin', 'admintheme', '');
    ModUtil::setVar('Admin', 'displaynametype', 1);
    ModUtil::setVar('Admin', 'moduledescription', 1);

    Admin_defaultdata();

    // Initialisation successful
    return true;
}

/**
 * upgrade the module from an old version
 *
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @author       Mark West
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function Admin_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch ($oldversion)
    {
        case '1.5':
            if (!DBUtil::changeTable('admin_module')) {
                return '1.5';
            }

        case '1.6':
            ModUtil::setVar('Admin', 'modulesperrow', 3);
            ModUtil::setVar('Admin', 'itemsperpage', 15);
            ModUtil::setVar('Admin', 'moduledescription', 1);

        case '1.7':
        case '1.8':
            // future upgrade routines
    }

    // Update successful
    return true;
}

/**
 * delete the Admin module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 * @author Mark West
 * @return bool true if deletetion succcesful, false otherwise
 */
function Admin_delete()
{
    if (!DBUtil::dropTable('admin_module')) {
        return false;
    }

    if (!DBUtil::dropTable('admin_category')) {
        return false;
    }

    ModUtil::delVar('Admin');

    // Deletion successful
    return true;
}

/**
 * create the default data for the modules module
 *
 * This function is only ever called once during the lifetime of a particular
 * module instance
 *
 * @author       Mark West
 * @return       bool       false
 */
function Admin_defaultdata()
{
    $record = array(array('catname'     => __('System'),
                          'description' => __('Core modules at the heart of operation of the site.')),
                    array('catname'     => __('Layout'),
                          'description' => __("Layout modules for controlling the site's look and feel.")),
                    array('catname'     => __('Users'),
                          'description' => __('Modules for controlling user membership, access rights and profiles.')),
                    array('catname'     => __('Content'),
                          'description' => __('Modules for providing content to your users.')),
                    array('catname'     => __('Uncategorised'),
                          'description' => __('Newly-installed or uncategorized modules.')),
                    array('catname'     => __('Security'),
                          'description' => __('Modules for managing the site\'s security.')));

    DBUtil::insertObjectArray($record, 'admin_category', 'cid');
}
