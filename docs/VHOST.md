# Setting up a Virtual Host

_*Note:* This is not mandatory, but you if you wan't to use PHP and Apache like a pro outside of Crowdsourcer.io, you will want to learn about setting up Virtual Hosts. We are attempting to make all urls relatively linked, so this should not be necessary. Use this at your own risk :D._

*Save a backup of any files you modify.*

A Virtual Host is basically creating a custom domain, that only works on your machine (eg. dev.example.com). By setting up a Virtual Host, you can have your browser serve content within a specified directory (eg. C:/XAMPP/htdocs/myProject).

A virtual host will allow you to use custom PHP variables such as '$_SERVER["DOCUMENT_ROOT"] to correctly require files, as well as allow you to link js and css absolutely (eg. using '/css/style.css' instead of something like '../css/style.css). This is how your environment would act on a live server. It is also vital when you want to manage more than 1 project.

1. Make sure you have XAMPP installed (We use XAMPP w/ PHP version 7.1.4, you should do the same.)
2. Find your hosts file, (C:/Windows/System32/Drivers/etc/hosts).
3. Open up the hosts file, *you will need to save a copy outside of the hosts directory, and then overwrite the old hosts file when your done*.
4. Uncomment the lines at the bottom referencing 'localhost' by removing the hashtags.
```
# localhost name resolution is handled within DNS itself.

#127.0.0.1       localhost    /* This line */
#::1             localhost    /* This line */
```

5. Add a new line, you can use any name you want for the domain. This is basically saying, "Whenever your browser sees 'dev.example.com', redirect"
```
# localhost name resolution is handled within DNS itself.

127.0.0.1       localhost
127.0.0.1       dev.example.com     /* This is url in browser */
::1             localhost
```
6. Save the hosts file, and overwrite the old one. (You need administrator permissions, and to follow instructions in #5)

7. Navigate to Apache's httpd-vhosts.conf file, either in the XAMPP dashboard, or manually (Default is C:/XAMPP/Apache/conf/extra/httpd-vhosts.conf).

8. *Only do this step once, ever :D*. Add the following code at the bottom of the document. This is basically saying, "Whenever someone goes to localhost on this machine, serve the contents in 'C:\XAMPP\htdocs". This should be the XAMPP dashboard. *Make sure to change the directories to match your environment, and mind where there are and are not quotation marks.*
```
NameVirtualHost 127.0.0.1
<VirtualHost 127.0.0.1>
  DocumentRoot "C:\XAMPP\htdocs"
  ServerName 127.0.0.1
</VirtualHost>
```
9. Below that, add the code for your custom vhost, once again replacing all directories with those of your project, and all domains with the domain you set in your hosts file. (Directory would be something like 'C:/XAMPP/htdocs/myProject', it can also be located outside of htdocs folder)
```
NameVirtualHost dev.example.com
<VirtualHost dev.example.com>
  DocumentRoot "C:\XAMPP\htdocs\myProject"
  ServerName dev.example.com
  ServerAlias dev.example.com
  <Directory C:\XAMPP\htdocs\myProject>
      Options Indexes FollowSymLinks MultiViews
      AllowOverride All
      Order Deny,Allow
      Allow from all
      Require all granted
  </Directory>
</VirtualHost>
```
10. Restart apache and navigate to 'http://localhost' as well as your custom vhost (eg http://dev.example.com). You should see the XAMPP Dashboard for localhost, and then the contents of your project with the custom vhost.