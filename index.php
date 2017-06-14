<? include("templates/header.php"); ?>

<h1>Hello World</h1>

<p>You can use these templates pages to build entirely new pages. More functionality will be coming so that you can integrate even better with the front end of the site.</p>

<p>I appreciate I've not given detailed instructions on setting this up, but there are only two components. Setting up the PHP and setting up the SCSS. For the PHP your simply downloading an application that can create a small virtual server on your computer (MAMP is great for Mac); and for SCSS you just need an app that can convert the SCSS to CSS and place it in the assets/css/ directory. Scout app is great for this.</p>

<p>Some tips:</p>
<ul>
   <li>Familiarise yourself with the existing classes. Look at other pages on the live site, inspect elements to see how things are currently laid out.</li> 
   <li>Absolutely try to avoid editing the raw CSS, instead only ever edit the SCSS files (Scout app is a good tool to auto generate CSS from SCSS).</li>
   <li>Some CSS classes aren't in the SCSS as I'm still mid migration, if you want to make changes to these, move everything related to that class over to the appropriate SCSS file (make a new one if necessary) and remove it from the CSS files. This will help me so much with migration.</li>
   <li>You can change some parameters to test out different functionality from the tops of the header and footer files.</li>
   <li>To create an entirely new page create a file such as "my-page.php" and include the header and footer in the index. Then simply navigate to it in your browser.</li>
</ul>

<? include("templates/footer.php"); ?>