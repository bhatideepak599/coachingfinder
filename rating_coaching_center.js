
$(document).ready(function(){

    $('#coachingName').keyup(function(){
        var data=$(this).val();
        if(data!=''){
             $.ajax({
                url:"search.php",
                method:"POST",
                data:{data:data},
                success:function(data){
                 $('#coachingList').fadeIn();
                 $('#coachingList').html(data);
                }
             });
        }else{
            $('#coachingList').fadeOut();
            $('#coachingList').html("");
        }
    });
   $(document).on('click','li',function(){
   $('#coachingName').val($(this).text());
   $('#coachingList').fadeOut();
   });
});