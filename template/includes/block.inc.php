<div class="styleguide" id="r<?php echo $section->getReference(); ?>">
    <h3 class="styleguide__header styleguide-clearfix">
        <span class="styleguide__title"><?php echo $section->getTitle(); ?></span>
        <span class="styleguide__filename"><?php echo $section->getFilename(); ?></span>
    </h3>

    <div class="styleguide__description">
        <p><?php echo nl2br($section->getDescription()); ?></p>

        <?php if (!empty($section->getModifiers())): ?>
            <ul class="styleguide__modifiers">
                <?php foreach ($section->getModifiers() as $modifier) { ?>
                    <li>
                        <span class="styleguide__modifier-name<?php echo ($modifier->isExtender()) ? ' styleguide__modifier-name--extender' : ''; ?>">
                            <?php echo $modifier->getName(); ?>
                        </span>
                            <?php if ($modifier->isExtender()) { ?>
                                @extend
                                <span class="styleguide__modifier-name"><?php echo $modifier->getExtendedClass(); ?></span>
                            <?php } ?>
                        <?php if ($modifier->getDescription()) { ?>
                            - <?php echo $modifier->getDescription(); ?>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        <?php endif; ?>

        <?php if (!empty($section->getParameters())): ?>
            <ul class="styleguide__parameters">
                <?php foreach ($section->getParameters() as $parameter) { ?>
                    <li>
                        <span class="styleguide__parameter-name">
                            <?php echo $parameter->getName(); ?>
                        </span>
                        <?php if ($parameter->getDescription()) { ?>
                            - <?php echo $parameter->getDescription(); ?>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        <?php endif; ?>

        <?php if ($section->getCompatibility()): ?>
            <p class="styleguide__compatibility"><?php echo nl2br($section->getCompatibility()); ?></p>
        <?php endif; ?>
    </div>

    <?php if ($section->hasMarkup()): ?>
        <?php
            $kss->markup = new \Kss\Markup($section, $config->kss->kssphpmarkup);

            // Flushcache?
            if (isset($_GET['flushcache'])) {
                $kss->markup->flushcache();
            }
        ?>
        <div class="styleguide__elements">
            <div class="styleguide__element">
                <?php echo $kss->markup->getNormal(); ?>
            </div>
            <?php foreach ($section->getModifiers() as $modifier): ?>
                <div class="styleguide__element styleguide__element--modifier<?php ($modifier->isExtender()) ? ' styleguide__element--extender' : ''; ?>">
                    <span class="styleguide__element__modifier-label<?php echo ($modifier->isExtender()) ? ' styleguide__element__modifier-label--extender' : ''; ?>"><?php echo $modifier->getName(); ?></span>
                    <?php echo $modifier->getExampleHtml(); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="styleguide__html is-open">
            <button class="styleguide__code-toggle">Markup</button>
            <pre class="styleguide__code"><code><?php echo htmlentities($kss->markup->getNormal('{class}')); ?></code></pre>
        </div>
    <?php endif; ?>
</div>