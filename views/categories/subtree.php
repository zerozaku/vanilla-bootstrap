<?php

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

$Category = $this->Data('Category');
if (!$Category)
   return;

$SubCategories = CategoryModel::MakeTree(CategoryModel::Categories(), $Category);

if (!$SubCategories)
   return;
   
require_once $this->FetchViewLocation('helper_functions', 'categories', 'vanilla');

?>
<h2 class="ChildCategories-Title Hidden"><?php echo T('Child Categories'); ?></h2>
<ul class="DataList ChildCategoryList">
   <?php
   foreach ($SubCategories as $Row):
      if (!$Row['PermsDiscussionsView'])
         continue;
      
      $Row['Depth'] = 1;
      ?>
      <li id="Category_<?php echo $Row['CategoryID']; ?>" class="Item Category">
         <div class="ItemContent Category">
            <h3 class="CategoryName TitleWrap"><?php 
               echo Anchor(htmlspecialchars($Row['Name']), $Row['Url'], 'Title');
               Gdn::Controller()->EventArguments['Category'] = $Row;
               Gdn::Controller()->FireEvent('AfterCategoryTitle'); 
            ?></h3>
            
            <?php if ($Row['Description']): ?>
            <div class="CategoryDescription">
               <?php echo $Row['Description']; ?>
            </div>
            <?php endif; ?>
            
            <div class="Meta Hidden">
               <span class="MItem MItem-Count DiscussionCount"><?php
                  echo Plural(
                     $Row['CountDiscussions'],
                     '%s discussion',
                     '%s discussions',
                     Gdn_Format::BigNumber($Row['CountDiscussions'], 'html'));
               ?></span>

               <span class="MItem MItem-Count CommentCount"><?php
                  echo Plural(
                     $Row['CountComments'],
                     '%s comment',
                     '%s comments',
                     Gdn_Format::BigNumber($Row['CountComments'], 'html'));
               ?></span>
            </div>
         </div>
      </li>
      <?php
   endforeach;
   ?>
</ul>
