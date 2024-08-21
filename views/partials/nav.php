<nav>
    <?php
        //Make the current page bold, check with urlIs.
        echo urlIs('/') ? '<p><b>Boodschappen Overzicht</b></p>': '<a href="/">Boodschappen Overzicht</a>';
        echo urlIs('/create') ? '<p><b>Boodschappen Toevoegen</b></p>': '<a href="/create">Boodschappen Toevoegen</a>';
    ?>
</nav>