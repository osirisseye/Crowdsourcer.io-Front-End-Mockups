# Crowdsourcer.io-Front-End-Mockups
A small repo to allow mockups to be made for the Crowdsourcer.io website. It has a sample of all the current assets,  but only SCSS files should be changed as a migration to it from CSS is in the works.

If you would like to view this repo in it's current state, [click here](https://crowdsourcer-frontend-mockups.herokuapp.com/).

# How to use this repo
You can either Fork this repo (via button in top right), clone it, or you can request to become a contributor and make your own branch. I will add more detailed instructions on this at a later date. If you fork it, you are making your own copy of the repository. If you clone it you are just making a local branch, you may have to manually set up remotes. If you make a branch, you will have to merge it.

You have to have XAMPP/APACHE or some other PHP server to view this repo. If you need help, scroll down to the bottom of the README.

## Where to Start
Start by looking through the templates and pick a starting point. Copy the file to the correct directory and rename it according to the guidelines. Start with your username, and then add something detailed. (eg. 'shorty-contributions_list'). You can add version numbers if there is already a mockup of that type. (eg. 'shorty-contributions_list-v01).

## Find the right spot.
Make sure you put your files in the correct spot. Tasks you are currently working on should go in the '\_tasks' directory. Any other design not directly tied to a task should go in the '\_mockups' directory.

## Naming Things
Let's follow some basic naming conventions. Pay attention to "-" and "\_" Use underscores to separate different words 'eg. task\_detail'. Use dashes to separate different parts of a name. 'eg shorty-task\_detail'. Doing this will allow me to organize these via a script later :D.

| Type          | Directory   | How To Name                          | Second Header                                   |
| ------------- | ------------| ------------------------------------ | ----------------------------------------------- |
| Template:     | \_templates | {{template_name}}                    | Templates for a specific page type.             |
| Mockup:       | \_mockups   | {{user\_name}}-{{page\_name}}        | Random design to share ideas, start discussion. |
| Task:         | \_tasks     | {{user\_name}}-{{task-name}}-v{{##}} | Proposal for a task w/ version number.          |

_examples:
- _/\_template/basic\_page.php_
- _/\_mockups/shorty-contribution\_list.php_
- _/\_tasks/mikedaniel18-task\_viewer-v01.php_

# Setting up your environment.

[Help setting up XAMPP](docs/XAMPP.md)
