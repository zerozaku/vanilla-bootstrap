<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

echo '<h2 class="H">'.T('Discussions').'</h2>';

// Create some variables so that they aren't defined in every loop.
$ViewLocation = $this->FetchViewLocation('discussions', 'discussions', 'vanilla');

if (!is_object($this->DiscussionData) || $this->DiscussionData->NumRows() <= 0) {
   echo Wrap(T("This user has not made any discussions yet."), 'div', array('Class' => 'Empty'));
} else {
   echo '<ul class="DataList Discussions">';
   include($ViewLocation); 
   echo '</ul>';
   echo $this->Pager->ToString('more');
}
