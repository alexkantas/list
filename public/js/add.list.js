 var offset = 0;
    
    $( document ).ready(function() {

    $.ajax({
        dataType:"json",
        url:"/add/list/data",
        success: loadData,
        error: loadError
        });

      function loadData(data){
            var notifications = [];
            $.each(data,function(index,notification){
                var notificationItem = '<li class="notifier-buttons">'+
                    '<button type="button" class="btn btn-primary"><?=$notification->name?></button>'+
                    '<form action="/add/list/add" method="post">'+
                 '<input type="hidden" name="id" value="<?=$notification->id?>">'+
                    '<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button>'+
                    '</form>'+
                    '<form action="/delete" method="post" onSubmit="return confirm(\'Do you really want to delte elemet $notification->name\');">'+
                    '<button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>'+
                   ' </form> </li>';
                   console.log(notificationItem);
                //notifications.push(notificationItem);
                })
            // $('#notifications').append(notifications); 
            // if(notifications.length > 7){
            //     lastelement = $('#notifications').children().last();
            //     lastelement.hide();
            //     loadmorebtn.css({"display":"block"});
            //     offset += notifications.length;
            // }
            
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

   