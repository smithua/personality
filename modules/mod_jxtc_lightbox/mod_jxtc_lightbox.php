<?php
/*
	JoomlaXTC Lightbox  module

	version 1.1.0
	
	Copyright (C) 2011 Monev Software LLC.	All Rights Reserved.

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

	THIS LICENSE IS NOT EXTENSIVE TO ACCOMPANYING FILES UNLESS NOTED.

	See COPYRIGHT.php for more information.
	See LICENSE.php for more information.

	Monev Software LLC
	www.joomlaxtc.com
*/

if (!defined( '_JEXEC' )) die;

JHTML::_('behavior.modal', 'a.modal');

$live_site = JURI::base();
$doc =&JFactory::getDocument();
$db =&JFactory::getDBO();

$menuid = $params->get('menuid');
$linkstring = $params->get('linkstring');
$buttonimg = $params->get('buttonimg'); if ($buttonimg == -1) $buttonimg = '';
$width = $params->get('width',600);
$height = $params->get('height',400);
$auto = $params->get('auto',0);
$age = $params->get('age',2592000);

$query = "SELECT link from #__menu WHERE id='$menuid'";
$db->setQuery($query);
$link = $db->loadResult();

$link = $linkstring ? $linkstring : $link.'&tmpl=component&Itemid='.$menuid;

$jxtc = uniqid('jxtc');
if ($auto) {
	$cookieName='jxtclightbox'.$module->id;
	$cookie = isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : '';
	setcookie($cookieName, '1', time()+$age,'/'); 
	if (!$cookie) { // Cookie not found, trigger first-time event
		$doc =&JFactory::getDocument();
		$doc->addScriptDeclaration("window.addEvent('load', function(){ SqueezeBox.fromElement(document.getElementById('$jxtc')); });");
	}
}

if ($buttonimg) { 
	$html = '<a id="'.$jxtc.'" class="modal" style="border:none;padding:0;margin:0;height:auto;width:auto" href="'.$link.'" rel="{handler: \'iframe\', size: {x:'.$width.', y:'.$height.'}}">';
	$html .= '<img src="images/'.$buttonimg.'" style="border:0;padding:0;margin:0"/>';
	$html .= '</a>';
}
else {
	$html = '<a id="'.$jxtc.'" class="modal" style="display:none" href="'.$link.'" rel="{handler: \'iframe\', size: {x:'.$width.', y:'.$height.'}}"> </a>';
}
echo $html;
?>
<div style="display:none"><a href="http://www.joomlaxtc.com">JoomlaXTC Lightbox Component - Copyright 2011 Monev Software LLC</a></div>
