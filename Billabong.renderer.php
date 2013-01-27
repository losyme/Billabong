<?php
/*
    Billabong is a simple but complete MediaWiki skin.

    Copyright (c) 2013 losyme <losyme@gmail.com>

    This file is part of Billabong.

    Billabong is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Billabong is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Billabong. If not, see <http://www.gnu.org/licenses/>.
*/

class BillabongRenderer
{
    private $skin
          , $data
          , $domd;

    public function __construct($skin, $data)
    {
        $this->skin = $skin;
        $this->data = $data;
        $this->domd = new DOMDocument();
    }

    public function renderDocument()
    {
        ?>
        <header>
            <?php $this->renderHeader() ?>
        </header>
        <div class="wrapper">
            <section>
                <?php $this->renderContent() ?>
            </section>
            <aside>
                <?php $this->renderSideBar() ?>
            </aside>
        </div>
        <footer>
            <?php $this->renderFooter() ?>
        </footer>
        <?php
    }

/*
========================================================================================================================
--- Header
========================================================================================================================
*/

    public function renderHeader()
    {
        ?>
        <div class="wrapper">
            <ul class="personal">
                <?php foreach ($this->skin->getPersonalTools() as $key => $item) { ?>
                    <?php echo $this->skin->makeListItem($key, $item) ?>
                <?php } ?>
            </ul>
            <div class="title">
                <h1>
                    <a href="<?php echo $this->data['nav_urls']['mainpage']['href'] ?>"
                        <?php echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs('p-logo')) ?>>
                        <?php $this->skin->text('sitename') ?>
                    </a>
                </h1>
            </div>
        </div>
        <div class="actions">
            <div class="wrapper">
                <ul>
                    <?php foreach ($this->data['content_actions'] as $key => $tab) { ?>
                        <?php echo $this->skin->makeListItem($key, $tab) ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php
    }

/*
========================================================================================================================
--- Content
========================================================================================================================
*/

    public function renderContent()
    {
        ?>
        <header>
            <p class="title"><?php $this->skin->html('title') ?></p>
            <?php if ($this->data['subtitle']) { ?><p><?php $this->skin->html('subtitle') ?></p><?php } ?>
        </header>
        <article id="bodyContent">
            <?php $this->skin->html('bodycontent') ?>
            <?php $this->skin->html('catlinks') ?>
            <?php $this->skin->html('dataAfterContent') ?>
        </article>
        <?php
    }


/*
========================================================================================================================
--- SideBar
========================================================================================================================
*/

    public function renderSideBar()
    {
        foreach ($this->skin->getSidebar(array('htmlOnly' => true)) as $boxName => $box) { ?>
            <div id='<?php echo Sanitizer::escapeId($box['id']) ?>'<?php echo Linker::tooltip($box['id']) ?>>
                <h4><?php echo htmlspecialchars($box['header']) ?></h4>
                <?php echo $box['content']; ?>
            </div>
        <?php }
    }

/*
========================================================================================================================
--- Footer
========================================================================================================================
*/

    public function renderFooter()
    {
        ?>
        <div class = "search">
            <div class="wrapper">
                <form action="<?php $this->skin->text('searchaction') ?>">
                    <input name="search" type="text"<?php
                        if (isset($this->data['search'])) { ?>
                        value="<?php $this->skin->text('search') ?>"<?php } ?>/>
                    <input type='submit' name="go" value="<?php $this->skin->msg('searcharticle') ?>"/>
                    <input type='submit' name="fulltext" value="<?php $this->skin->msg('searchbutton') ?>"/>
                </form>
            </div>
        </div>
        <div class="wrapper">
            <div class="informations">
                <?php foreach ($this->skin->getFooterLinks() as $category => $links) { ?>
                    <ul>
                        <?php foreach ($links as $key) { ?>
                            <li><?php $this->skin->html($key) ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php foreach ($this->skin->getFooterIcons('icononly') as $blockName => $footerIcons) { ?>
                    <ul>
                        <?php foreach ($footerIcons as $icon) { ?>
                            <li><?php echo $this->skin->getSkin()->makeFooterIcon($icon) ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <p class="author">
                    <span class="S">Skined</span><span class="B">by</span><span class="L">losyme</span>
                </p>
            </div>
        </div>
        <?php
    }
}
?>
