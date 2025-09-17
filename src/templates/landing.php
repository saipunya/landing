<?php
function renderLandingPage() {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo SITE_TITLE; ?></title>
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1><?php echo SITE_TITLE; ?></h1>
        <p><?php echo SITE_DESCRIPTION; ?></p>
    </body>
    </html>
    <?php
}
?>