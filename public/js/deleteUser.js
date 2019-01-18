$(document).ready(function(){
    $('.delete').on('click',function(){
        let id=$(this).data('id');
        let token=$('#token').val();
        $.ajax({
             url: '/user/'+id,
            type : 'DELETE',
            data: {
                "_token":token,
            },
            success: function(res){
                if(res.success){
                    alert(res.msg);
                    location.reload();
                }
            },
            error: function(err) {
				console.log('ERROR');
}

        });

    });

});