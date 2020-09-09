<form  action="<?php echo home_url( '/' ) ?>" method="GET" id="searchform">
    <input class="search-input" type="text" placeholder="<? _e('Введите запрос', 'univer') ?>" value="<?php echo get_search_query() ?>" name="s" id="s">
    <button class="search-icon" id="searchsubmit" type="submit"><img src="<? echo get_template_directory_uri().'/images/'; ?>search.svg" /></button>
</form>