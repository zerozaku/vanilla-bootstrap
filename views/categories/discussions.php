<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

echo '<h1 class="H HomepageTitle">'.$this->Data('Title').'</h1>';
$ViewLocation = $this->FetchViewLocation('discussions', 'discussions');
?>
<div class="Categories">
   <?php foreach ($this->CategoryData->Result() as $Category) :
      if ($Category->CategoryID <= 0)
         continue;

      $this->Category = $Category;
      $this->DiscussionData = $this->CategoryDiscussionData[$Category->CategoryID];
      
      if ($this->DiscussionData->NumRows() > 0) : ?>
      
   <div class="CategoryBox Category-<?php echo $Category->UrlCode; ?>">      
      <h2 class="H"><?php
            echo Anchor(htmlspecialchars($Category->Name), CategoryUrl($Category));
            Gdn::Controller()->EventArguments['Category'] = $Category;
            Gdn::Controller()->FireEvent('AfterCategoryTitle'); 
      ?></h2>
      
      <ul class="DataList Discussions">
         <?php include($this->FetchViewLocation('discussions', 'discussions')); ?>
      </ul>
      
      <?php if ($this->DiscussionData->NumRows() == $this->DiscussionsPerCategory) : ?>
      <div class="MorePager">
         <?php echo Anchor(T('More Discussions'), '/categories/'.$Category->UrlCode); ?>
      </div>
      <?php endif; ?>
      
   </div>
   
      <?php endif; ?>
      
   <?php endforeach; ?>
</div>
