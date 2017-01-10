<?php
if(!defined('_IS_VALID_'))
{
	echo 'Erreur chargement';
	exit();
}
?>
<!DOCTYPE HTML>
<html lang="fr">

<head>
<meta charset="utf-8" />
<meta name="robots" content="noindex, nofollow">

<meta name="viewport" content="width=device-width, initial-scale=1" />

<base href="<?php echo _SITE_URL_; ?>">

<title>Administration</title>
<meta name="description" content="">

<link rel="icon" type="image/png" href="<?php echo _MEDIAS_URL_; ?>favicon.png" />
<link rel="shortcut icon" type="image/png" href="<?php echo _MEDIAS_URL_; ?>favicon.png" />

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">    
<link href="<?php echo _SCRIPTS_URL_; ?>/html5imageupload/styles.css?v1.3" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    



<!-- JQUERY UI	-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<!-- APPS	-->
<script type="text/javascript">
	var baseUrl = '<?php echo _SITE_URL_; ?>';
	var appUrl = '<?php echo _SITE_URL_.'ajax'; ?>';
</script>
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>apps.js?v=2.0.5"></script>
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>admin.js"></script>

<!-- DATEPICKER	-->
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>datepicker/jquery.ui.datepicker-fr.js" mce_src="<?php echo _SCRIPTS_URL_; ?>datepicker/jquery.ui.datepicker-fr.js"></script>
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>datepicker/jquery-ui-timepicker-addon.js"></script>

<!-- CKEDITOR	-->
<script src="<?php echo _SCRIPTS_URL_; ?>ckeditor/ckeditor.js"></script>

<!-- SLIDER	-->
<script src="<?php echo _SCRIPTS_URL_; ?>caroufredsel/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="<?php echo _SCRIPTS_URL_; ?>_libs/jquery.easing.1.3.js"></script>

<!-- FANCYBOX -->
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>fancybox/minified__fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" href="<?php echo _SCRIPTS_URL_; ?>fancybox/minified__fancybox.css?v=2.1.4" type="text/css" media="screen" />

<!-- TOOLTIP	-->
<script type="text/javascript" src="<?php echo _SCRIPTS_URL_; ?>tooltips/jquery.tooltipster.min.js"></script>
<link rel="stylesheet" href="<?php echo _SCRIPTS_URL_ ; ?>tooltips/tooltipster.css" type="text/css" />
		

<!-- CSS GENERIQUES -->
<link href="<?php echo _WEBROOT_URL__TEMPLATE_ . 'common.css'; ?>" rel="stylesheet" media="all" />
<link href="<?php echo _WEBROOT_URL__TEMPLATE_ . '/default/desktop/articles.css'; ?>" rel="stylesheet" type="text/css" />

<!-- CSS ADMIN -->
<?php 
include_once(_TEMPLATES_ROOT_.'admin/__includes.php');
?>

</head>

<body>
	<div style="width:100%; overflow: hidden;">
		<?php
	    // MSGS + LOADER    
        include(_VIEWS_ROOT_.'admin/plugins/messages.php');
        include(_VIEWS_ROOT_.'admin/plugins/loaders.php');

	    ?>
		<div class="site-wrapper">
	        <div class="content">
	        	<div class="col-nav">
	            	<?php
					// MENU ADMIN
					include_once(_VIEWS_ROOT_.'admin/Menus/nav_main.php');			
					?>
				</div>
				<div class="col-content">

					<div class="top">
						<div class="top-inside">
							<?php
						    // charge le pathway
						    $navPathway = (isset($navPathway)) ? $navPathway : true;
						    if($navPathway == true)
						    {	
							    include(_VIEWS_ROOT_.'admin/plugins/pathway.php'); 
						    }
						    include(_VIEWS_ROOT_.'admin/plugins/logged.php'); 
							?>	
						</div>
					</div>

					<div class="content-page">
						<?php 
						    $navActive = isset($modelName) ? $modelName : \Core\Storage::getVar('page')['Pages.controller'];
						    // charge la config
						    include(_VIEWS_ROOT_.'admin/'.$navActive.'/_config/config.php');
						    // charge la nav de la page (catégories, shortcuts, current...)
						    include(_VIEWS_ROOT_.'admin/Menus/nav_page.php'); 

			                echo $content_for_layout;
			            ?>
		            </div>
			</div>
		</div>
	</div>	

	<script src="<?php echo _SCRIPTS_URL_; ?>/html5imageupload/html5imageupload.js?v1.4.3"></script>

	<script language="javascript">
		/*	  TOOLTIP	*/			
		$('.tooltip').tooltipster({
			animation: 'fade',
			delay: 200,
			touchDevices: false,
			trigger: 'hover',
		});

	    $(".fancybox").fancybox();

	    $('.dropzone').html5imageupload({
	        onAfterProcessImage: function() {
	            var $id = $(this.element).attr('id');
	            $("#picture-"+$id).slideUp();
	        },
	        onAfterCancel: function() {
	            var $id = $(this.element).attr('id');
	            $("#picture-"+$id).slideDown();
	        }
	    });

	    $(document).on('click', '.switchLangue', function(){
	        var $id = $(this).attr('id');
	        $('.langue-wrapper').slideUp();
	        $('.langue-'+$id).slideDown();
	    });
	</script>
	<script>
	/*
	    $(document).on('click', '.accordion-bt', function(){
	        var $id = $(this).attr('id');
	        $('.accordion-content').slideUp();
	        $('.accordion-content-'+$id).slideDown();
	    });
    */
	</script>
</body>
</html>
