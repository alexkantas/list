var offset = 0;
var notificationData = [];

$(document).ready(function () {

    var loadmorebtn = $('#loadmore');
    var addbtn = $('#addBtn');
    var delbtn = $('#delBtn');
    var deleteButton = $('#deleteButton');
    var currentId;
    
    $.ajax({
        dataType: "json",
        url: "/add/list/data",
        success: loadData,
        error: loadError
    });

    function loadData(data) {
        var notifications = [];
        var notificationDataOffset = notificationData.length;
        notificationData.push(...data);
        $.each(data, function (index, notification) {
            console.log(index + " has id " + notification.id + " and name " + notification.name);
            var notificationItem = '<li><button notificationIndex="' + (notificationDataOffset+index) + '" notificationId="' + (notification.id) + '" class="ui basic blue button notification">' + notification.name + '</button></li>';
            notifications.push(notificationItem);
        })
        $('#notifications').append(notifications);
        addListeners();
        if (notifications.length > 7) {
            lastelement = $('#notifications').children().last();
            lastelement.hide();
            loadmorebtn.removeClass('loading');
            loadmorebtn.off('click');
            loadmorebtn.on('click', loadmoreAction);
            offset += notifications.length;
            return;
        }
        loadmorebtn.css({ "display": "none" });

    }

    function loadError() {
        loadmorebtn.css({ "display": "none" });
        $('#errorBtn').css({ "display": "inline-block" });;
    }

    function loadmoreAction() {
        lastelement.show();
        loadmorebtn.addClass('loading');
        loadmore();
    }

    function reloadAction(){
        offset = 0;
        $('#notifications').empty();
    }

    addbtn.click(function(){
        $.ajax({
            dataType: "json",
            url: "/info/add/now",
            method: "POST",
            data: { "id": currentId }
        }).done(function(){
            console.log("Cool");
            reloadAction();
            loadmore();
            loadmorebtn.css({ "display": "inline-block" });
        })
    });

    deleteButton.click(function(){
        console.log("Super clikx")
        $.ajax({
            dataType: "json",
            url: "/info/delete/now",
            method: "POST",
            data: { "id": currentId }
        }).done(function(){
            console.log("Cool");
            reloadAction();
            loadmore();
            loadmorebtn.css({ "display": "inline-block" });
        })
    });

    delbtn.click(function(){
        $('#notifNam').text($('#notification-title').text());
        $('#deleteModal').modal('show');
    });

    loadmore = function () {
        console.log("LP");
        $.ajax({
            dataType: "json",
            url: "/add/list/data",
            method: "POST",
            data: { "offset": offset },
            success: loadData,
            error: loadError
        });
    }

    var addListeners = function () {
        $('#notifications .notification').off('click');
        $('#notifications .notification').on('click', function () {
            var index = Number($(this).attr('notificationIndex'));
            currentId = Number($(this).attr('notificationId'));
            $('#notification-title').text(notificationData[index].name);
            $('#notification-description').text(notificationData[index].description || "");
            console.log('run?');
            $('#infoModal').modal('show');
        });
    }


});

