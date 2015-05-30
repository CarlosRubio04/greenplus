<?php session_start(); ?>
<?php require_once('includes/conn.php'); ?>
<?php require_once('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once('blocks/head.php'); ?>
	<body>
		<div class="loader"><img src="img/ajax-loader.gif" /></div>
		<div class="container">
			<?php require_once('blocks/header.php'); ?>
			<?php if(!isset($_REQUEST['content'])){
				require_once('blocks/home.php');
			}elseif($_REQUEST['content']=='ofertas-laborales'){
				require_once('blocks/ofertas-laborales.php');
			}elseif($_REQUEST['content']=='mi-cuenta'){
				require_once('blocks/mi-cuenta.php');
			}elseif($_REQUEST['content']=='contacto'){
				require_once('blocks/contacto.php');
			}elseif($_REQUEST['content']=='aliados'){
				require_once('blocks/aliados.php');
			}elseif($_REQUEST['content']=='nosotros'){
				require_once('blocks/nosotros.php');
			}elseif($_REQUEST['content']=='donaciones'){
				require_once('blocks/donaciones.php');
			}else{
				require_once('blocks/home.php');
			} ?>
			<?php require_once('blocks/footer.php'); ?>
			<?php require_once('blocks/modal.php'); ?>
		</div>
	</body>
	<script src="js/main.js"></script>
	<script type="text/javascript">
    var map;
                        
        $(document).ready(function(){
            map = new GMaps({
            el: '#map',
            lat: 4.7043414,
            lng:-74.04807779999999,
        });
        map.addMarker({
            lat: 4.7043414,
            lng:-74.04807779999999,
            title: 'trs',
            infoWindow: {
                content: '<p>trs</p>'
             }
        });
    });
    </script>
</html>
