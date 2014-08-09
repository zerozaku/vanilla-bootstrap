<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

echo '<h2 class="H">'.T('Comments').'</h2>';
if (sizeof($this->Data('Comments'))) {
   echo '<ul class="DataList SearchResults">';
   echo $this->FetchView('profilecomments', 'Discussion', 'Vanilla');
   echo '</ul>';
   echo $this->Pager->ToString('more');
} else {
   echo '<div class="Empty">'.T('This user has not commented yet.').'</div>';
}
