<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

$Controller = Gdn::Controller();
$Session = Gdn::Session();
$Title = property_exists($Controller, 'Category') ? GetValue('Name', $Controller->Category, '') : '';
if ($Title == '')
   $Title = T('All Discussions');
      
$Bookmarked = T('My Bookmarks');
$MyDiscussions = T('My Discussions');
$MyDrafts = T('My Drafts');
$CountBookmarks = 0;
$CountDiscussions = 0;
$CountDrafts = 0;

if ($Session->IsValid()) {
   $CountBookmarks = $Session->User->CountBookmarks;
   $CountDiscussions = $Session->User->CountDiscussions;
   $CountDrafts = $Session->User->CountDrafts;
}

if (!function_exists('FilterCountString')) {
   function FilterCountString($Count, $Url = '') {
      $Count = CountString($Count, $Url);
      return $Count != '' ? '<span class="Aside">'.$Count.'</span>' : '';
   }
}
if (C('Vanilla.Discussions.ShowCounts', TRUE)) {
   $Bookmarked .= FilterCountString($CountBookmarks, Url('/discussions/UserBookmarkCount'));
   $MyDiscussions .= FilterCountString($CountDiscussions);
   $MyDrafts .= FilterCountString($CountDrafts);
}
?>
<div class="BoxFilter BoxDiscussionFilter">
   <ul class="FilterMenu">
      <?php
      $Controller->FireEvent('BeforeDiscussionFilters');     
//      if (C('Vanilla.Categories.ShowTabs')) {
      ?>
      <?php if ($CountBookmarks > 0 || $Controller->RequestMethod == 'bookmarked') { ?>
      <li class="MyBookmarks<?php echo $Controller->RequestMethod == 'bookmarked' ? ' Active' : ''; ?>"><?php echo Anchor(Sprite('SpBookmarks').' '.$Bookmarked, '/discussions/bookmarked'); ?></li>
      <?php
      }
      if (($CountDiscussions > 0 || $Controller->RequestMethod == 'mine') && C('Vanilla.Discussions.ShowMineTab', TRUE)) {
      ?>
      <li class="MyDiscussions<?php echo $Controller->RequestMethod == 'mine' ? ' Active' : ''; ?>"><?php echo Anchor(Sprite('SpMyDiscussions').' '.$MyDiscussions, '/discussions/mine'); ?></li>
      <?php
      }
      if ($CountDrafts > 0 || $Controller->ControllerName == 'draftscontroller') {
      ?>
      <li class="MyDrafts<?php echo $Controller->ControllerName == 'draftscontroller' ? ' Active' : ''; ?>"><?php echo Anchor(Sprite('SpMyDrafts').' '.$MyDrafts, '/drafts'); ?></li>
      <?php
      }
      $Controller->FireEvent('AfterDiscussionFilters');
      ?>
   </ul>
</div>
