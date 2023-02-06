$(document).ready(function (){
    $('#select-all').click(function (){
        if(this.checked){
            $(':checkbox').each(function (){
                this.checked = true;
            });
        }else {
            $(':checkbox').each(function (){
                this.checked = false;
            });
        }
    });

    $('#user_image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showUserImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

});





