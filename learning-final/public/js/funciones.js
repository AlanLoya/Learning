$("#instituciones_id").change(function(){
    id = $("#instituciones_id").val();
    $.ajax({
        dataType: 'JSON',
        data:{'id':id},
        url: '{{ url("register/campus") }}',
        type: 'GET',
        success:function(data){
           console.log();
           alert();

        },
        error:function(err){
            console.log(err);
        }

     });
});
