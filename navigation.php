<nav>
    <ul class="globalmenu">
        <li>
            <a <?php if ($current=="about") echo " class=\"current\""; ?> href="/about/index" >
                About me
            </a>
        </li>

        <li >
            <a <?php if ($current=="portfolio") echo " class=\"current\""; ?> href="/portfolio/index">
                Portfolio
            </a>
        </li>

        <li>
            <a <?php if ($current=="thoughts") echo " class=\"current\""; ?> href="/thoughts/index">
                Thoughts
            </a>
        </li>
    </ul>
    
    <hr class="desktophidden" />
    
    <!--    .localmenu :-->
    <?php include("localmenu.php"); ?>
</nav>