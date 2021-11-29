$(document).ready(function(){

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    $(document).on("change", ".select_color", function () 
    {
        var uuid = $(this).val();
        var color_code = $(this).children(":selected").attr("id");
        if(uuid == '' || color_code == '') 
        {
            alert('Please select color');
            return false;
        }
        window.location.href = url+"/get_all_users_colors/"+uuid+"/"+color_code;
    });

    $(document).on("click", ".delete_button", function () 
    {
        var con = confirm("Are you sure you want to remove this color?");
        var link = $(this).data('href');

        if(con == true)
        window.location.href = link;
    });
});