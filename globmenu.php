<div class="side">
    <h1>Claus Bertels</h1>
    <!--    Beter met lists dan divs?-->
    <div class="chap" <?php if ($current=="CV") echo " id=\"current\""; ?>>
        <a href="/CV">About me</a>
    </div>
    
    <div class="chap" <?php if ($current=="portfolio") echo " id=\"current\""; ?>>
        <a href="/portfolio">Portfolio</a>
    </div> 
    
    <div class="chap" <?php if ($current=="thoughts") echo " id=\"current\""; ?>>
        <a href="/thoughts">Thoughts</a>
    </div>
</div>