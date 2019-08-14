
<script src="<?php echo $adminlte ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo $adminlte ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $adminlte ?>/dist/js/adminlte.min.js"></script>
<script src="<?php echo $adminlte ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=z3qrbn82jvuqr9727jayyaywqeq57qc2tzvidct7bzzrnt6t"></script>
<script> tinymce.init({ selector:'.mytextarea' }); </script>
<script> document.getElementById("return").addEventListener("click", function(){document.location.href='/www/home';})</script>

<?php

if(isset($_SESSION["info"]) && $_SESSION["info"] != ''){

    echo '<script>alert("'.$_SESSION["info"].'")</script>';

    $_SESSION["info"] = '';
}



?>
<script>

function showMenu(){
    if(document.getElementById("main_sidebar").style.transform == 'translate(0px, 0px)'){

        document.getElementById("main_sidebar").style.transform = 'translate(-100%, 0px)';

    } else {
        document.getElementById("main_sidebar").style.width = '100%';
        document.getElementById("main_sidebar").style.transform = 'translate(0px, 0px)';
    }

};

document.getElementById("show-menu").addEventListener('click', function(){ showMenu(); });

</script>
<?php
