<?php if (!defined('APPLICATION')) exit();

/*
Copyright (C) 2009-2014 Vanilla Forums, Inc

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

The source code can be found [here](https://github.com/vanilla/vanilla), and the full text of the license [here](http://opensource.org/licenses/gpl-3.0.html)
*/

// An individual discussion record for all panel modules to use when rendering a discussion list.
if (!isset($this->Prefix)) {
   $this->Prefix = 'Bookmark';
}

if (!function_exists('WriteModuleDiscussion')) {
   $DiscussionsModule = new DiscussionsModule();
   require_once $DiscussionsModule->FetchViewLocation('helper_functions');
   require_once Gdn::Controller()->FetchViewLocation('helper_functions', 'Discussions', 'Vanilla');
}

WriteModuleDiscussion($Discussion, $this->Prefix);
