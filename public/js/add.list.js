 var offset = 0;
    
    $( document ).ready(function() {

    $.ajax({
        dataType:"json",
        url:"/add/list/data",
        success: loadData,
        error: loadError
        });

      function loadData(data){
            
        }

        function loadError(){
            $('#notifications').append('<button onClick="location.reload()" class="btn btn-danger">Error, please try again!</button>');
        }

        loadmore = function(){
        lastelement.show();
        loadmorebtn.css({"display":"none"});
            
        $.ajax({
            dataType:"json",
            url:"/main/data",
            method:"POST",
            data:{"offset":offset},
            success: loadData,
            error: loadError
            });
        }

    });

   