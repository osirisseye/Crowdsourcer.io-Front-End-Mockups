Task Viewer legend:  

There are 3 additional options vs original.
Always make sure you include required files in index.php

ORIGINAL: Progress Bar + Title Card
Files: _mockup-task_viewer_title_card-1.php
-------------------------------------------3-PART VIEW--------------------------------------

First, in index.php include by uncommenting "_mockup-task_viewer_contributor_card-1.php" and .container2 styling. 

3-PART VIEW = i. progress bar, ii. task card, iii. contributors card.
Files:	mockup-task_viewer_title_card-1 + _mockup-task_viewer_contributor_card-1.php
Delta:  Added contributors card with avatar + @handle + position + gradient style approval rating
		Resizing of task card to fit Contributors card on the same level.

3-PART VIEW + TABS inside task card.
Files: mockup-task_viewer_title_card-2 + _mockup-task_viewer_contributor_card-2.php
Delta: Added nav tabs for Description/Completion Notes/Approval

------------------------------------------2-PART VIEW--------------------------------------
Disable (add comment tags around) "_mockup-task_viewer_contributor_card-1.php" and .container2 styling.

2-PART VIEW + TABS inside task card.
Files: mockup-task_viewer_title_card-3 
Delta: Added nav tabs for Description/Completion Notes/Approval/Contibutors



Separate files description:
_mockup-task_viewer_contributor_card-1.php 	   = avatar, @handle, position, bg=gradient'd approval rating
_mockup-task_viewer_contributor_card-2.php 	   = no gradient;
_mockup-task_viewer_title_card-2 		   = tabs for description components
_mockup-task_viewer_title_card-3 		   = 100% width, Contributors as a tab
