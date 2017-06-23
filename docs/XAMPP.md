# XAMPP/APACHE setup for Windows
If you asking 'why do I have to do it' then the simple answer is to setup your local server and view PHP files (yes we are working on those).

## Downloading XAMPP
1. Download from here: https://www.apachefriends.org/pl/index.html.
2. Unpack, install (pay attention where you install it).

### For Junior PHP users
3. In the installation directory you will find folder 'htdocs'.
4. Clone/download 'Crowdsourcer.io-Front-End-Mockups' repository.
5. Copy the repo folder into 'htdocs' directory of XAMPP (default is C:\XAMPP if you just clicked your way through installation).

### For Advance PHP users
In order to correctly set up your 'document root', set up a [Virtual Host](VHOST.md)

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
2. Type 'http://localhost/{{folder-name}}', where {{folder-name}} is the name of the folder you pasted the repository into.
   (I pasted 'Crowdsourcer.io-Front-End-Mockups' repository into a new folder 'crowd' in 'htdocs' so for me it is
   'http://localhost/crowd/' )
3. You should now see a big Hello World in h1 and instructions on how to use the downloaded repo.
4. Get busy reading... and welcome.