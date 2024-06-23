$(document).ready(function() {
    $("#chat-btn").on("click", function() {
        // Play beep sound
        var beepSound = new Audio('beep.mp3');
        beepSound.play();

        // Toggle chat container visibility
        $("#chat-container").toggle();
    });

    // Add CSS styles to position the button to the left
    $("#chat-btn").css({
        "position": "fixed",
        "bottom": "20px",
        "left": "20px",
        "z-index": "9999",
        "border-radius": "50%"
    });

    // Add CSS styles to make the button background transparent
    $("#chat-btn").addClass("transparent-button");

    // Close chat when clicked outside
    $(document).on("click", function(event) {
        if (!$(event.target).closest("#chat-container, #chat-btn").length) {
            $("#chat-container").hide();
        }
    });

    // Add image to the button
    $("#chat-btn").html('<img src="th.jpeg" alt="Chat" style="width: 50px; border-radius: 50%;">');

    // Rest of your code...
});