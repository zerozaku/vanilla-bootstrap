<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

function WriteModuleDiscussion($Discussion, $Px = 'Bookmark') {
?>
<li id="<?php echo "{$Px}_{$Discussion->DiscussionID}"; ?>" class="<?php echo CssClass($Discussion); ?>">
   <span class="Options">
      <?php
//      echo OptionsList($Discussion);
      echo BookmarkButton($Discussion);
      ?>
   </span>
   <div class="Title"><?php
      echo Anchor(Gdn_Format::Text($Discussion->Name, FALSE), DiscussionUrl($Discussion).($Discussion->CountCommentWatch > 0 ? '#Item_'.$Discussion->CountCommentWatch : ''), 'DiscussionLink');
   ?></div>
   <div class="Meta">
      <?php   
         $Last = new stdClass();
         $Last->UserID = $Discussion->LastUserID;
         $Last->Name = $Discussion->LastName;
         
         echo NewComments($Discussion);
         
         echo '<span class="MItem">'.Gdn_Format::Date($Discussion->LastDate, 'html').UserAnchor($Last).'</span>';         
      ?>
   </div>
</li>
<?php
}

function WritePromotedContent($Content, $Sender) {
   static $UserPhotoFirst = NULL;
   if ($UserPhotoFirst === NULL)
      $UserPhotoFirst = C('Vanilla.Comment.UserPhotoFirst', TRUE);
   
   $ContentType = GetValue('ItemType', $Content);
   $ContentID = GetValue("{$ContentType}ID", $Content);
   $Author = GetValue('Author', $Content);
   
   switch (strtolower($ContentType)) {
      case 'comment':
         $ContentURL = CommentUrl($Content);
         break;
      case 'discussion':
         $ContentURL = DiscussionUrl($Content);
         break;
   }
?>
   <div id="<?php echo "Promoted_{$ContentType}_{$ContentID}"; ?>" class="<?php echo CssClass($Content); ?>">
      <div class="AuthorWrap">
         <span class="Author">
            <?php
            if ($UserPhotoFirst) {
               echo UserPhoto($Author);
               echo UserAnchor($Author, 'Username');
            } else {
               echo UserAnchor($Author, 'Username');
               echo UserPhoto($Author);
            }
            $Sender->FireEvent('AuthorPhoto'); 
            ?>
         </span>
         <span class="AuthorInfo">
            <?php
            echo ' '.WrapIf(htmlspecialchars(GetValue('Title', $Author)), 'span', array('class' => 'MItem AuthorTitle'));
            echo ' '.WrapIf(htmlspecialchars(GetValue('Location', $Author)), 'span', array('class' => 'MItem AuthorLocation'));
            $Sender->FireEvent('AuthorInfo'); 
            ?>
         </span>   
      </div>
      <div class="Meta CommentMeta CommentInfo">
         <span class="MItem DateCreated">
            <?php echo Anchor(Gdn_Format::Date($Content['DateInserted'], 'html'), $Permalink, 'Permalink', array('rel' => 'nofollow')); ?>
         </span>
         <?php
         // Include source if one was set
         if ($Source = GetValue('Source', $Content))
            echo Wrap(sprintf(T('via %s'), T($Source.' Source', $Source)), 'span', array('class' => 'MItem Source'));

         $Sender->FireEvent('ContentInfo');
         ?>
      </div>
      <div class="Title"><?php echo Anchor(Gdn_Format::Text($Content['Name'], FALSE), $ContentURL, 'DiscussionLink'); ?></div>
      <div class="Body"><?php echo Anchor(strip_tags(Gdn_Format::To($Content['Body'], $Content['Format'])), $ContentURL, 'BodyLink'); ?></div>
   </div>
<?php   
}
