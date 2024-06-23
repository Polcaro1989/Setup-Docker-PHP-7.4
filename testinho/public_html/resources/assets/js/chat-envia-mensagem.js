$(document).ready(function() {
    $("#send-btn").on("click", function() {
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');

        // start ajax code
        $.ajax({
            url: 'message.php',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
                if (result === "Message received. A response will be provided soon.") {
                    // This is the confirmation message, so we'll treat it differently
                    $replay = '<div class="bot-inbox inbox"><div class="icon"></div><div class="msg-header"><p>' + result + '</p></div></div>';
                } else {
                    // This is a normal bot response
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                }
                $(".form").append($replay);
                // when chat goes down the scroll bar automatically comes to the bottom
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});

$(document).ready(function() {
    // Function to fetch messages
    function fetchMessages() {
        $.ajax({
            url: 'fetch_messages.php',
            type: 'GET',
            success: function(result) {
                var messages = JSON.parse(result);
                $(".form").empty(); // Clear the chat
                for (var i = 0; i < messages.length; i++) {
                    var msg = messages[i];
                    var $msg = $('<div class="user-inbox inbox"><div class="msg-header"><p>' + msg.user_message + '</p></div></div>');
                    $(".form").append($msg);
                    if (msg.bot_response) {
                        var $replay = $('<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + msg.bot_response + '</p></div></div>');
                        $(".form").append($replay);
                    }
                }
                // Scroll to the bottom of the chat
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    }

    // Fetch messages every 5 seconds
    setInterval(fetchMessages, 5000);

    // Rest of your code here
    $("#send-btn").on("click", function() {
        // ...
    });
});