<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex, nofollow" />
    <title><?php echo $kss->options->title; ?> | <?php echo $package->name; ?></title>

    <link rel="stylesheet" href="template/assets/css/styleguide.css" />
    <?php if (!empty($kss->options->css)): ?>
        <?php foreach ($kss->options->css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>" />
        <?php endforeach; ?>
    <?php endif; ?>

    <script src="template/assets/js/styleguide.js"></script>
    <?php if (!empty($kss->options->js)): ?>
        <?php foreach ($kss->options->js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <header class="styleguide--header">
        <div class="styleguide--header-inner">
            <span class="styleguide--header-title"><?php echo $kss->options->title; ?></span>

            <div class="styleguide--header-infos">
                <?php $infos = array('name', 'version', 'author'); ?>
                <?php foreach ($infos as $info): ?>
                    <?php if (!empty($package->{$info})): ?>
                        <span class="styleguide--header-info">
                            <?php if ($info === 'version'): ?>
                                <?php echo $package->version; ?>

                                <?php if (!empty($package->date)): ?>
                                    (<?php echo $package->date; ?>)
                                <?php endif; ?>
                            <?php else: ?>
                                <?php echo htmlspecialchars($package->{$info}); ?>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </header>

    <div class="styleguide--wrapper">
        <?php require 'template/includes/menu.inc.php'; ?>