

function sendAjax()
{
    $.ajax({
        url:'/api/api_ajax',
        data:
            {

            },
        dataType:"JSON",
        type:'POST',
        success:function(data)
        {
            $('.show').html(data.name);
        }
    })
}