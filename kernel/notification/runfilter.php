<?php
//
// Created on: <21-May-2003 12:45:12 sp>
//
// ## BEGIN COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
// SOFTWARE NAME: eZ Publish
// SOFTWARE RELEASE: 4.1.x
// COPYRIGHT NOTICE: Copyright (C) 1999-2009 eZ Systems AS
// SOFTWARE LICENSE: GNU General Public License v2.0
// NOTICE: >
//   This program is free software; you can redistribute it and/or
//   modify it under the terms of version 2.0  of the GNU General
//   Public License as published by the Free Software Foundation.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of version 2.0 of the GNU General
//   Public License along with this program; if not, write to the Free
//   Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
//   MA 02110-1301, USA.
//
//
// ## END COPYRIGHT, LICENSE AND WARRANTY NOTICE ##
//

/*! \file
*/
require_once( 'kernel/common/template.php' );

$http = eZHTTPTool::instance();
$Module = $Params['Module'];

$tpl = templateInit();

$tpl->setVariable( 'filter_proccessed', false );
$tpl->setVariable( 'time_event_created', false );

if ( $http->hasPostVariable( 'RunFilterButton' ) )
{
    eZNotificationEventFilter::process();
    $tpl->setVariable( 'filter_proccessed', true );

}
else if ( $http->hasPostVariable( 'SpawnTimeEventButton' ) )
{
    $event = eZNotificationEvent::create( 'ezcurrenttime', array() );
    $event->store();
    $tpl->setVariable( 'time_event_created', true );

}

$Result = array();
$Result['content'] = $tpl->fetch( 'design:notification/runfilter.tpl' );
$Result['path'] = array( array( 'url' => false,
                                'text' => ezi18n( 'kernel/notification', 'Notification settings' ) ) );

?>
