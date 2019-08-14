$(document).ready(function(){

    $image_crop = $('#image_demo').croppie({
        enableExif:true,
        viewport:{
            width:320,
            height: 250,
            type:'square'
        },
        boundary:{
            width:500,
            height:400
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

var cau_id = window.location.search;

console.log(cau_id);

var cau_id_return = cau_id.split('&');

console.log(cau_id_return);
console.log(cau_id_return[1]);

var num_picture = cau_id_return[1].split('=');

console.log(num_picture);

console.log('/www/Kalaweit/Ajax_get/upload_photo'+num_picture[1]+cau_id);


$('#updload_cropped_image').click(function(event){

    $image_crop.croppie('result',{
        type:'base64',
        size: 'viewport'
    }).then(function(response){

        $.ajax({
            url: '/www/Kalaweit/Ajax_get/upload_photo'+num_picture[1]+cau_id,
            method:'POST',
            data: { "image" :response },

            success:function()
            {
                window.location.href = "/www/Kalaweit/asso_cause/get"+cau_id_return[0];
            }

        })
        ;
    })
});
