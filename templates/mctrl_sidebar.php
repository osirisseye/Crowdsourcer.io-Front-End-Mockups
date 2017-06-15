    <ul class="nav menu">
        <li><p class="nvmarg voffset-sm mission_control_nav_text">
            <span class="fa fa-terminal fa-lg" aria-hidden="true"></span><strong style="vertical-align:middle;">&nbsp; Mission Control</strong></p></li>
        <li role="presentation" class="divider"></li>
        <li role="presentation" <?php echo (($page == "dashboard") ? "class=\"active\"" : "") ;?>><a href=""><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
         <li role="presentation" <?php echo (($page == "tasks") ? "class=\"active\"" : "") ;?>><a href=""><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Tasks</a></li>
        <li role="presentation" <?php echo (($page == "contributors") ? "class=\"active\"" : "") ;?>><a href=""><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Contributors</a></li>

        <li role="presentation" <?php echo (($page == "chat") ? "class=\"active\"" : "") ;?>><a href=""><span class="fa fa-comments" aria-hidden="true"></span> Chat</a></li>

        <? if ($is_creator) : ?>

        <li role="presentation" <?php echo (($page == "positions") ? "class=\"active\"" : "") ;?>><a href=""><span class="fa fa-address-book" aria-hidden="true"></span> Positions</a></li>

        <li role="presentation" <?php echo (($page == "applications") ? "class=\"active\"" : "") ;?>><a href=""><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Applications</a></li>

        <li role="presentation" <?php echo (($page == "update-project") ? "class=\"active\"" : "") ;?>><a href=""><span class="fa fa-rocket" aria-hidden="true"></span> Project</a></li>

        <li role="presentation" <?php echo (($page == "settings") ? "class=\"active\"" : "") ;?>><a href=""><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Settings</a></li>
        <? endif; ?>
    </ul>
