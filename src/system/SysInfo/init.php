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
 * initialise the template module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function sysinfo_init()
{
    // Initialisation successful
    return true;
}

/**
 * Upgrade the errors module from an old version
 * 
 * This function must consider all the released versions of the module!
 * If the upgrade fails at some point, it returns the last upgraded version.
 *
 * @param        string   $oldVersion   version number string to upgrade from
 * @return       mixed    true on success, last valid version string or false if fails
 */
function sysinfo_upgrade($oldversion)
{
    // Update successful
    return true;
}

/**
 * delete the errors module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function sysinfo_delete()
{
    // Deletion successful
    return true;
}
