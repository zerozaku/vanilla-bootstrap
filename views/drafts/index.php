<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

echo '<h1 class="H HomepageTitle">'.$this->Data('Title').'</h1>';
include($this->FetchViewLocation('helper_functions', 'discussions', 'vanilla'));
$Session = Gdn::Session();
$ShowOptions = TRUE;
$Alt = '';
$ViewLocation = $this->FetchViewLocation('drafts', 'drafts');
// WriteFilterTabs($this);
echo Gdn_Theme::Module('DiscussionFilterModule');
if ($this->DraftData->NumRows() > 0) {
   echo $this->Pager->ToString('less');
?>
<ul class="DataList Drafts">
   <?php
   include($ViewLocation);
   ?>
</ul>
   <?php
   echo $this->Pager->ToString('more');
} else {
   ?>
   <div class="Empty"><?php echo T('You do not have any drafts.'); ?></div>
   <?php
}
