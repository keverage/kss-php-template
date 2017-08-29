<nav id="nav-main" class="styleguide--nav-main">
    <ul>
        <?php foreach ($kss->getTopLevelSections() as $topLevelSection): ?>
            <li>
                <a href="#<?php echo $topLevelSection->getReference(); ?>">
                    <?php echo $topLevelSection->getTitle(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>