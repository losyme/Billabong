<?php
/*
    Billabong is a simple but complete MediaWiki skin.

    Copyright (c) 2013 losyme <losyme@gmail.com>

    This file is part of Billabong.

    Billabong is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Foobar is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/

if (!defined('MEDIAWIKI'))
    die ('This is a skin extension to the MediaWiki package and cannot be run standalone.');

$wgExtensionCredits['skin'][] = array
(
    'path' => __FILE__
,   'name' => 'Billabong'
,   'version' => '0.01'
,   'author' => '[http://losyme.p.ht losyme]'
,   'url' => 'https://github.com/losyme/Billabong'
,   'descriptionmsg' => 'billabong-descmsg'
);

$wgValidSkinNames['billabong'] = 'Billabong';

$wgAutoloadClasses['SkinBillabong']     = dirname(__FILE__).'/Billabong.skin.php';
$wgAutoloadClasses['BillabongRenderer'] = dirname(__FILE__).'/Billabong.renderer.php';
$wgExtensionMessagesFiles['Billabong']  = dirname(__FILE__).'/Billabong.i18n.php';

$wgResourceModules['skins.billabong'] = array
(
    'styles' => array
    (
        'Billabong/assets/css/MediaWiki.css' => array('media' => 'screen')
    ,   'Billabong/assets/css/Billabong.css' => array('media' => 'screen')
    )
,   'remoteBasePath' => &$GLOBALS['wgStylePath']
,   'localBasePath'  => &$GLOBALS['wgStyleDirectory']
);
?>
