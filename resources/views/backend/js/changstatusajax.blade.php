<script type="text/javascript">
$(document).ready(function() {
    $('.department_status_btn').click(function(){
        var status = $(this).data('status');
        var id = $(this).data('id');
        var route = $(this).data('route');
        $.ajax({
            url:"{{route('".+route+."')}}",
            method:"POST",
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                status:status,
                id:id,
            },
            success:function(data){
                location.reload();
            }
        });
    }); 
});
</script>