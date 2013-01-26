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

class SkinBillabong extends SkinTemplate
{
    var $skinname  = 'billabong'
      , $stylename = 'billabong'
      , $template  = 'BillabongTemplate'
      , $useHeadElement = true;

    public function initPage(OutputPage $out)
    {
        parent::initPage($out);
        $out->addMeta('author', 'losyme');
    }

    function setupSkinUserCss(OutputPage $out)
    {
        parent::setupSkinUserCss($out);
        $out->addModuleStyles('skins.billabong');
    }
}

class BillabongTemplate extends BaseTemplate
{
    public function execute()
    {
        if (!isset($this->data['sitename']))
        {
            global $wgSitename;
            $this->set( 'sitename', $wgSitename );
        }

        $renderer = new BillabongRenderer($this, $this->data);

        wfSuppressWarnings();
        $this->html('headelement'); ?>
        <?php $renderer->renderDocument(); ?>
        <?php $this->printTrail(); ?>
        </body>
        </html>
        <?php wfRestoreWarnings();
    }
}
?>
