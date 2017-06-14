<?
    $hide_footer = false;
    $show_minimal_footer = false;
    $is_mission_control = false;
?>

<div class="clearboth"></div>

</div>
    <!-- /.container -->
<? if (!isset($hide_footer) || (isset($hide_footer) && $hide_footer === false)) :?>
    <? 
        $copyright = 'Copyright &copy; Crowdsourcer.io ' . date('Y');
        $footer_navigation_links = '<a href="/">Home</a><strong> · </strong><a href="/about">About</a><strong> · </strong><a href="/nucleus">Nucleus</a><strong> · </strong><a href="/contact-us">Contact</a> · </strong><a href="/terms">Terms</a><strong> · </strong><a href="/attribution">Attribution</a><strong> · </strong><a target="_blank" href="http://feedback.userreport.com/665eef05-0ed3-4ee4-b275-65b8e522eb3f">Request a Feature</a>';
     ?>

    <? if ((isset($show_minimal_footer) && $show_minimal_footer === true)||(isset($is_mission_control) && $is_mission_control === true)) : ?>
        <footer class="small_footer footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="<? echo($is_mission_control == true ? 'col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2' : 'col-lg-12'); ?> text-center">
                        <p class="links nvmarg voffset"><?=$footer_navigation_links?></p>
                        <p class="nvoffset nvmarg"><?=$copyright?></p>                        
                    </div>
                </div>
            </div>
        </footer>
    <? else : ?>
    <footer class="main_footer">
        <div class="row vmarg-sm voffset-md">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <!--<h3><span class="icon-logo"></span></h3>-->
                <img class="vmarg" src="assets/images/logo.svg">
                <p class="links"><?=$footer_navigation_links?></p>
            </div>
            <div class="col-md-4 col-sm-6 footer-contacts">
                <div><span class="fa fa-question footer-contacts-icon"> </span>
                    <p><span class="new-line-span">Need some help?</span><a href="">Check out the Nucleus</a></p>
                </div>
                <div><i class="fa fa-info footer-contacts-icon"></i>
                    <p class="footer-center-info email text-left"><a href="">What is Crowdsourcer.io?</a></p>
                </div>
                <div><i class="fa fa-envelope footer-contacts-icon"></i>
                    <p><a href="" target="_blank">Drop us a line</a></p>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-4 footer-about">
                <h4>About this site</h4>
                <p>Crowdsourcer.io is an alternative crowd sourcing platform created to enable developers to form teams, build and then distribute their software. But there's so much more to it, and certainly too much for this little text area so <a href="/what-is-crowdsourcer">check out this page for more info.</a></p>
                <div class="social-links social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                <p class="company-name voffset"><?=$copyright?></p>
            </div>
        </div>
    </footer>
    <?endif;?>

<? endif; ?>
            <script src="assets/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                $(function () {
                    $('[data-toggle="popover"]').popover()
                })
            </script>
        </body>
</html>
