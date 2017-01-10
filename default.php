<!DOCTYPE HTML>
<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="robots" content="<?php echo __getVar('page')['Pages.seo']['meta_robots']; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
<meta name="google-site-verification" content="" />

<base href="<?php echo _SITE_URL_; ?>">

<title><?php echo __getVar('page')['Pages.seo']['meta_title']; ?></title>
<meta name="description" content="<?php echo __getVar('page')['Pages.seo']['meta_description']; ?>">

<link rel="icon" type="image/png" href="<?php echo _MEDIAS_URL_; ?>favicon.png" />
<link rel="shortcut icon" type="image/png" href="<?php echo _MEDIAS_URL_; ?>favicon.png" />

<?php 
if(!empty(__getVar('page')['Pages.seo']['meta_canonical']))
{
    ?>
    <link rel="canonical" href="<?php echo __getVar('page')['Pages.seo']['meta_canonical']; ?>" />
    <?php
}
?>

<?php
/*
    CSS
 */

// charges les styles CSS
include_once(_TEMPLATES_ROOT_.__getVar('page')['Pages.template'].'/__includes.php');
// changement de fond
include_once(_VIEWS_ROOT_.'public/plugins/skin.php');


/*
    FONTS

    <link href='http://fonts.googleapis.com/css?family=Roboto:500,400italic,300,700,500italic,400' rel='stylesheet' type='text/css'>
 */
?>
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    


<?php 
/*
    JS
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<!-- FANCYBOX -->
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>fancybox/minified__fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" href="<?php echo _SCRIPTS_URL_; ?>fancybox/minified__fancybox.css?v=2.1.4" type="text/css" media="screen" />

<!-- MASONRY -->
<script src="http://masonry.desandro.com/masonry.pkgd.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>

<!-- APPS && FUNCTIONS JS	-->
<script type="text/javascript">
    var baseUrl = '<?php echo _SITE_URL_; ?>';
    var appUrl = '<?php echo _SITE_URL_.'ajax'; ?>';
</script>
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>apps.js?v=2.0.5"></script>
<?php 
    include(_SCRIPTS_ROOT_.'functions.php');
?>

</head>

<body>
    <?php 
    // MENU MOBILE
    include_once(_VIEWS_ROOT_.'public/menus/nav_mobile.php');
    // ARROW UP
    include_once(_VIEWS_ROOT_.'public/plugins/button_up.php');
    ?>
    <div class="theme-wrapper <?php echo __getVar('univers')['Univers.css_name'] ?>" style="width:100%; overflow: hidden;">
    	<div id="site-container">
            <?php
                include_once(_VIEWS_ROOT_.'public/menus/nav_top.php');
            ?>
                
            <div class="content-wrapper min-height"> 
                <?php
                  //  include_once(_VIEWS_ROOT_.'public/plugins/pathway.php');

                    echo $content_for_layout;
                ?>
            </div>
        </div>

       <div id="fb-root"></div>
        <script>
            apps.initFacebook();
    		apps.initTab();
       </script>
    	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        <?php
            // MSG + LOADER    
            include_once(_VIEWS_ROOT_.'public/plugins/messages.php');
            include_once(_VIEWS_ROOT_.'public/plugins/loaders.php');
    		include_once(_APP_ROOT_.'appAnalytics.php');
    	?>
    </div>

</body>
</html>
