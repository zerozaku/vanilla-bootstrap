<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://www.opensource.org/licenses/gpl-2.0.php)
*/

require_once $this->FetchViewLocation('helper_functions');

?>
<div class="Box BoxPromoted">
   <h4><?php echo T('Promoted Content'); ?></h4>
   <div class="PanelInfo DataList">
      <?php
      $Content = $this->Data('Content');
      $ContentItems = sizeof($Content);
      
      if ($Content):
         
         if ($this->Group):
            $Content = array_chunk($Content, $this->Group);
         endif;

         foreach ($Content as $ContentChunk):
            if ($this->Group):
               echo '<div class="PromotedGroup">';
               foreach ($ContentChunk as $ContentItem):
                  WritePromotedContent($ContentItem, $this);
               endforeach;
               echo '</div>';
            else:
               WritePromotedContent($ContentChunk, $this);
            endif;
         endforeach;
         
      endif;
      ?>
   </div>
</div>
