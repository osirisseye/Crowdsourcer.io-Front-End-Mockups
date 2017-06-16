# Crowdsourcer.io-Front-End-Mockups
A small repo to allow mockups to be made for the Crowdsourcer.io website. It has a sample of all the current assets,  but only SCSS files should be changed as a migration to it from CSS is in the works.

If you would like to view this repo in it's current state, [click here](https://crowdsourcer-frontend-mockups.herokuapp.com/).

# How to use this repo
You can either Fork this repo (via button in top right), clone it, or you can request to become a contributor and make your own branch. I will add more detailed instructions on this at a later date. If you fork it, you are making your own copy of the repository. If you clone it you are just making a local branch, you may have to manually set up remotes. If you make a branch, you will have to merge it.

You have to have XAMPP/APACHE or some other PHP server to view this repo. If you need help, scroll down to the bottom of the README.

## Where to Start
Start by looking through the pages and pick a starting point. Copy and rename the file to something detailed. (eg. 'conributions-list-mockup'). And add numbers if there is already a mockup of that type.

## Naming Things
Let's follow some basic naming conventions. Pay attention to '-' and '_'. Use underscores to separate different words 'eg. task-detail'. Use dashes to separate different parts of a name. 'eg template-task_detail'. Doing this will allow me to organize these via a script later :D.

| Type          | How To Name                | Second Header                                   |
| ------------- | -------------------------- | ----------------------------------------------- |
| Mockup:       | mockup-{{page_name}}       | Random design to share ideas, start discussion. |
| Template:     | template-{{page_type}}     | Templates for a specific page type.             |
| Task:         | task-{{task-name}}-v{{##}} | Proposal for a task w/ version number.          |

# XAMPP/APACHE setup for Windows
If you asking 'why do I have to do it' then the simple answer is to setup your local server and view PHP files (yes we are working on those).

## Downloading XAMPP
1. Download from here: https://www.apachefriends.org/pl/index.html.
2. Unpack, install (pay attention where you install it).

### For Junior PHP users
3. In the installation directory you will find folder 'htdocs'.
4. Clone/download 'Crowdsourcer.io-Front-End-Mockups' repository.
5. Copy the repo folder into 'htdocs' directory of Xampp (default is C:\XAMPP if you just clicked your way through installation).

### For Advance PHP users
3. Tutorial on setting up virtual hosts to come soon.

Now you should have all the documents in the right place - we will start XAMPP.

## Setting up XAMPP
1. In search bar (Windows Start) type "XAMPP control panel" and click it.
2. You will see a window with listed items on the left - we are concerned about only two: Apache, MySQL.
3. Click 'start' for both Apache and MySQL.
  * Note: If you are on windows, Disable UAC restrictions in the control panel. And also, run the control panel in Administrator Mode. In admin mode, you can install both MySQL and Apache as a service, meaning you no longer have to start them.
4. Start your web browser and type in the address bar "http://localhost".
5. If you see official website of XAMPP - you're good to go.

Let's view our repo.

## Viewing the repo.
1. To see a php file you have to navigate to it - using address bar of your browser.
2. Type 'http://localhost/*/', where * is the name of the folder you pasted the repository into.
   (I pasted 'Crowdsourcer.io-Front-End-Mockups' repository into a new folder 'crowd' in 'htdocs' so for me it is
   'http://localhost/crowd/' )
3. You should now see a big Hello World in h1 and instructions on how to use the downloaded repo.
4. Get busy reading... and welcome.

