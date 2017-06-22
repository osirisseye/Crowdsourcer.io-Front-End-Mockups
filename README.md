# Crowdsourcer.io-Front-End-Mockups
A small repo to allow mockups to be made for the Crowdsourcer.io website. It has a sample of all the current assets,  but only SCSS files should be changed as a migration to it from CSS is in the works.

If you would like to view this repo in it's current state, [click here](https://crowdsourcer-frontend-mockups.herokuapp.com/).

# How to use this repo
You can either Fork this repo (via button in top right), clone it, or you can request to become a contributor and make your own branch. I will add more detailed instructions on this at a later date. If you fork it, you are making your own copy of the repository. If you clone it you are just making a local branch, you may have to manually set up remotes. If you make a branch, you will have to merge it.

You have to have XAMPP/APACHE or some other PHP server to view this repo. If you need help, scroll down to the bottom of the README.

## Where to Start
Start by looking through the pages and pick a starting point. Copy and rename the file to something detailed. (eg. 'conributions-list-mockup'). And add numbers if there is already a mockup of that type.

## Naming Things
Let's follow some basic naming conventions. Pay attention to "-" and "\_" Use underscores to separate different words 'eg. task\_detail'. Use dashes to separate different parts of a name. 'eg template-task_detail'. Doing this will allow me to organize these via a script later :D.

| Type          | How To Name                | Second Header                                   |
| ------------- | -------------------------- | ----------------------------------------------- |
| Mockup:       | mockup-{{page\_name}}      | Random design to share ideas, start discussion. |
| Template:     | template-{{page\_type}}    | Templates for a specific page type.             |
| Task:         | task-{{task-name}}-v{{##}} | Proposal for a task w/ version number.          |

# Setting up your environment.

[Help setting up XAMPP](docs/XAMPP.md)
[Setting up a Virtual Host](docs/VHOST.md) *This is optional*