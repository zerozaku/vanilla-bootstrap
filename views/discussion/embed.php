<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

$Discussion = $this->Data('Discussion');
$ForeignSource = $this->Data('ForeignSource');
$SortComments = $this->Data('SortComments');
$Comments = $this->Data('Comments', FALSE);
$HasCommentData = $Comments !== FALSE;
$Session = Gdn::Session();
if (!function_exists('WriteComment'))
   include($this->FetchViewLocation('helper_functions', 'discussion'));

?>
<div class="Embed">
<?php
echo '<span class="BeforeCommentHeading">';
$this->FireEvent('CommentHeading');
echo '</span>';

if ($SortComments == 'desc')
   WriteEmbedCommentForm();
else if ($HasCommentData && $Comments->NumRows() > 0)
   echo Wrap(T('Comments'), 'h2');
?>
<ul class="DataList MessageList Comments">
   <?php
   if ($HasCommentData) {
      $this->FireEvent('BeforeCommentsRender');
      $CurrentOffset = $this->Offset;
      foreach ($Comments as $Comment) {
         ++$CurrentOffset;
         $this->CurrentComment = $Comment;
         WriteComment($Comment, $this, $Session, $CurrentOffset);
      }
   }
   ?>
</ul>
<?php
if ($HasCommentData) {
   if ($this->Pager->LastPage()) {
      $LastCommentID = $this->AddDefinition('LastCommentID');
      if(!$LastCommentID || $this->Data['Discussion']->LastCommentID > $LastCommentID)
         $this->AddDefinition('LastCommentID', (int)$this->Data['Discussion']->LastCommentID);
      $this->AddDefinition('Vanilla_Comments_AutoRefresh', Gdn::Config('Vanilla.Comments.AutoRefresh', 0));
   }
   
   // Send the user to the discussion in the forum when paging
   if (C('Garden.Embed.PageToForum') && $this->Pager->HasMorePages()) {
      $DiscussionUrl = DiscussionUrl($Discussion).'#latest';
      echo '<div class="PageToForum Foot">';
      echo Anchor(T('More Comments'), $DiscussionUrl);
      echo '</div>';
   } else 
      echo $this->Pager->ToString('more');
}

if ($SortComments != 'desc')
   WriteEmbedCommentForm();

?>
</div>
