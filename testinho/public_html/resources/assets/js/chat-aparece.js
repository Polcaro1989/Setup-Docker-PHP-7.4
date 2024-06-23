$(document).ready(function() {
    $("#chat-btn").on("click", function() {
        // Play beep sound
        var beepSound = new Audio('beep.mp3');
        beepSound.play();

        // Toggle chat container visibility
        $("#chat-container").toggle();
        
        // Esconde o botão quando clicado
        $(this).hide();
    });

    // Add CSS styles to position the button in the left side of footer and rotate it
    $("#chat-btn").css({
        "position": "fixed",
        "bottom": "20px", // Posicionamento 20 pixels acima do rodapé da página
        "left": "0", // Colado na lateral esquerda do rodapé
        "width": "40px", // Largura menor do botão
        "height": "20vh", // Altura do botão ajustada para ocupar 20% da altura da viewport
        "z-index": "9999",
        "border-top-left-radius": "15px", // Raio superior esquerdo
        "border-bottom-left-radius": "15px", // Raio inferior esquerdo
        "transform": "rotate(180deg)" // Rotaciona o botão em 180 graus
    });

    // Add CSS styles to make the button background transparent
    $("#chat-btn").addClass("bg-line"); // Adiciona a classe bg-line ao botão

    // Rotate the text back to horizontal
    $("#chat-btn").html('<span style="transform: rotate(-180deg); display: inline-block;">Chat</span>'); // Rotaciona o texto em -180 graus para compensar a rotação do botão

    // Close chat when clicked outside
    $(document).on("click", function(event) {
        if (!$(event.target).closest("#chat-container, #chat-btn").length) {
            $("#chat-container").hide();
            // Mostra o botão quando clicado fora do chat container
            $("#chat-btn").show();
        }
    });

    // Rest of your code...
});
