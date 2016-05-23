<!-- SEARCHFORM -->
<form method="get" id="search" action="<?php bloginfo('url'); ?>/">
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Rechercher sur le blog"/>
</form>
