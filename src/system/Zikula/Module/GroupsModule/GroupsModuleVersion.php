<?php
/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Zikula
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

namespace Zikula\Module\GroupsModule;

class GroupsModuleVersion extends \Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname']    = $this->__('Groups');
        $meta['description']    = $this->__('User group administration module.');
        //! module name that appears in URL
        $meta['url']            = $this->__('groups');
        $meta['version']        = '2.3.2';
        $meta['core_min'] = '1.3.7';
        $meta['securityschema'] = array('ZikulaGroupsModule::' => 'Group ID::');

        return $meta;
    }
}