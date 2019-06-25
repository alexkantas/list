var offset = 0;
var notificationData = [];

$(document).ready(function () {

    var loadmorebtn = $('#loadmore');
    var erasebtn = $('#eraseBtn');
    var addbtn = $('#addBtn');
    var addButton = $('#addButton');
    var currentId;
    
    $.ajax({
        dataType: "json",
        url: "/main/data",
        success: loadData,
        error: loadError
    });

    function loadData(data) {
        var notifications = [];
        var notificationDataOffset = notificationData.length;
        notificationData.push(...data);
        $.each(data, function (index, notification) {
            var notificationItem = '<li><button notificationIndex="' + (notificationDataOffset+index) + '" notificationId="' + (notification.id) + '"  class="ui basic green button notification">' + notification.name + '</button></li>';
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
        $('#errorBtn').css({ "display": "inline-block" });
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
    
    erasebtn.click(function(){
        $.ajax({
            dataType: "json",
            url: "/erase",
            method: "POST",
            data: { "id": currentId }
        }).done(function(){
            reloadAction();
            loadmore();
        })
    });

    addbtn.click(function(){
        $('#addModal').modal('show');
    });

    addButton.click(function(){
        $.ajax({
            dataType: "json",
            url: "/add/new",
            method: "POST",
            data: $("#addForm").serialize()
        }).done(function(){
            $("#addForm").trigger("reset");
            reloadAction();
            loadmore();
        })
    });

    loadmore = function () {

        $.ajax({
            dataType: "json",
            url: "/main/data",
            method: "POST",
            data: { "offset": offset },
            success: loadData,
            error: loadError
        });
    }

    var addListeners = function () {
        $('#notifications .notification').off('click');
        $('#notifications .notification').on('click', function () {
            var currentIndex = Number($(this).attr('notificationIndex'));
            currentId = Number($(this).attr('notificationId'));
            $('#notification-title').text(notificationData[currentIndex].name);
            $('#notification-description').text(notificationData[currentIndex].description || "");
            $('#infoModal').modal('show');
        });
    }


});

