jQuery(function(){

// Change favorite Status
$(document).on("click",".makeFavorite",function(){
    var status = $(this).children("i").attr("status");
    var favorite_id = $(this).attr("favorite_id");
    $.ajax({
      type:'post',
      url: '/contact/change-favorite-status',
      data:{status:status, favorite_id:favorite_id},
      success:function(resp){
         if(resp['status']==0){
             $('#favorite-'+favorite_id).html("<i status='No' class='fa fa-star-o'></i>");
         }else if(resp['status']==1){
            $('#favorite-'+favorite_id).html("<i status='Yes' class='fa fa-star'></i>");
        }
      },error:function () {
        alert("Error");
       }
    });
  });
  // Change favorite Status

});


// Form Repeater 

// Phone field Repeater 

var maxMobile = 3;
    var maxEmail = 3;
    var addPhone = $('.add_phone');
    var addEmail = $('.add_email');
    var wrapperPhone = $('.field_phone');
    var wrapperEmail = $('.field_email');

    var fieldPhone = '<div style="margin-top:10px;"><input type="number" name="phone[]" placeholder="Mobile Number"> <a href="javascript:void(0);" class="btn remove_phone">Delete</a></div>';

    var fieldEmail = '<div style="margin-top:10px;"><input type="email" name="email[]" placeholder="New Email"> <a href="javascript:void(0);" class="btn remove_email">Delete</a></div>';

    var x = 1; 
    var y = 1; 

    $(addPhone).click(function(){
        if(x < maxMobile){
            x++; 
            $(wrapperPhone).append(fieldPhone);
        }
    });

    $(wrapperPhone).on('click', '.remove_phone', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
        x--; 
    });

    $(addEmail).click(function(){
        if(y < maxEmail){
            y++; 
            $(wrapperEmail).append(fieldEmail);
        }
    });

    $(wrapperEmail).on('click', '.remove_email', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
        x--; 
    });