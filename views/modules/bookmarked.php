<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

require_once $this->FetchViewLocation('helper_functions');
require_once Gdn::Controller()->FetchViewLocation('helper_functions', 'Discussions', 'Vanilla');

$Bookmarks = $this->Data('Bookmarks');
?>
<div id="Bookmarks" class="Box BoxBookmarks">
   <h4><?php echo T('Bookmarked Discussions'); ?></h4>
   <?php if (count($Bookmarks->Result()) > 0): ?>
   
   <ul id="<?php echo $this->ListID; ?>" class="PanelInfo PanelDiscussions DataList">
      <?php
      foreach ($Bookmarks->Result() as $Discussion) {
         WriteModuleDiscussion($Discussion);
      }
      if ($Bookmarks->NumRows() == $this->Limit) {
      ?>
      <li class="ShowAll"><?php echo Anchor(T('All Bookmarks'), 'discussions/bookmarked'); ?></li>
      <?php } ?>
   </ul>
   
   <?php else: ?>
   <div class="P PagerWrapper">
      <?php
         echo sprintf(
            T('Click the %s beside discussions to bookmark them.'),
            '<a href="javascript: void(0);" class="Bookmark"> </a>');
      ?>
   </div>
   <?php endif; ?>
</div>
