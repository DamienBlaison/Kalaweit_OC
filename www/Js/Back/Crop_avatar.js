$(document).ready(function(){

    $image_crop = $('#image_demo').croppie({
        enableExif:true,
        viewport:{
            width:200,
            height: 200,
            type:'circle'
        },
        boundary:{
            width:300,
            height:300
        }
    });

});

$('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function(event){
        $image_crop.croppie('bind',{
            url:event.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);

});

var user_id = window.location.search;

console.log(user_id);

console.log('/www/Kalaweit/Ajax_get/upload_avatar'+user_id,);


$('#updload_cropped_image').click(function(event){

    $image_crop.croppie('result',{
        type:'base64',
        size: 'viewport'
    }).then(function(response){
        $.ajax({

            url: '/www/Kalaweit/Ajax_get/upload_avatar'+user_id,
            method:'POST',
            data:{
                "image": response,
            },
            success:function(data)
            {
                 window.location.href = "/www/Kalaweit/users/update"+user_id;
            }

        });
    })
});
