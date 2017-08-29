<?php

require_once 'template/includes/bootstrap.inc.php';
require_once 'template/includes/header.inc.php';

$sections = $kss->getTopLevelSections();

foreach ($sections as $topLevelSection) {
    $reference = $topLevelSection->getReference();
    $topSection = $kss->getSection($reference);
    $children = $kss->getSectionChildren($reference);

    echo '<span class="styleguide-anchor" id="' . $reference . '"></span>';
    echo '<h1>' . $topSection->getTitle() . '</h1>';

    foreach ($children as $section) {
        require 'template/includes/block.inc.php';
    }
}

require_once 'template/includes/footer.inc.php';
