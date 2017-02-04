<div class="side">
    <h1>Claus Bertels</h1>

    <ul class="globalmenu">
        <li>
            <a class="chap" <?php if ($current=="CV") echo " id=\"current\""; ?> href="/CV" >About me</a>
        </li>
        
        <li>
            <a class="chap" <?php if ($current=="portfolio") echo " id=\"current\""; ?> href="/portfolio">Portfolio</a>
        </li>
        
        <li>
            <a class="chap" <?php if ($current=="thoughts") echo " id=\"current\""; ?> href="/thoughts">Thoughts</a>
        </li>
    </ul>
    
<!--
    <div class="chap" <?php if ($current=="CV") echo " id=\"current\""; ?>>
        <a href="/CV">About me</a>
    </div>
    
    <div class="chap" <?php if ($current=="portfolio") echo " id=\"current\""; ?>>
        <a href="/portfolio">Portfolio</a>
    </div> 
    
    <div class="chap" <?php if ($current=="thoughts") echo " id=\"current\""; ?>>
        <a href="/thoughts">Thoughts</a>
    </div>
-->
    
    <?php include("menu.php"); ?>
</div>