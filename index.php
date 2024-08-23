<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floating Reaction Emojis</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    margin: 0;
    overflow: hidden;
    background-color: #1a1a1a; /* Dark background */
}

.bubble {
    position: absolute;
    font-size: 50px;
    user-select: none; /* Prevent text selection */
}
h1{
    position: absolute;
    top:20%;
    left:20%;
    font-size:80px;
    color:white;
}

     </style>
</head>
<body>
    <h1>Welcome To ServiceSpin</h1>
    <div class="bubble" id="bubble1">😊</div>
    <div class="bubble" id="bubble2">😢</div>
    <div class="bubble" id="bubble3">😂</div>
    <div class="bubble" id="bubble4">😡</div>
    <div class="bubble" id="bubble5">😍</div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const bubbles = [
        {element: document.getElementById('bubble1'), x: Math.random() * window.innerWidth, y: Math.random() * window.innerHeight, dx: 2, dy: 2},
        {element: document.getElementById('bubble2'), x: Math.random() * window.innerWidth, y: Math.random() * window.innerHeight, dx: -2, dy: 2},
        {element: document.getElementById('bubble3'), x: Math.random() * window.innerWidth, y: Math.random() * window.innerHeight, dx: 2, dy: -2},
        {element: document.getElementById('bubble4'), x: Math.random() * window.innerWidth, y: Math.random() * window.innerHeight, dx: -2, dy: -2},
        {element: document.getElementById('bubble5'), x: Math.random() * window.innerWidth, y: Math.random() * window.innerHeight, dx: 1, dy: 1}
    ];

    function moveBubbles() {
        bubbles.forEach(bubble => {
            bubble.x += bubble.dx;
            bubble.y += bubble.dy;

            if (bubble.x <= 0 || bubble.x >= window.innerWidth - 50) { // Adjust for emoji size
                bubble.dx = -bubble.dx;
            }
            if (bubble.y <= 0 || bubble.y >= window.innerHeight - 50) { // Adjust for emoji size
                bubble.dy = -bubble.dy;
            }

            bubble.element.style.left = bubble.x + 'px';
            bubble.element.style.top = bubble.y + 'px';
        });

        requestAnimationFrame(moveBubbles);
    }

    moveBubbles();
});

    </script>
</body>
</html>
