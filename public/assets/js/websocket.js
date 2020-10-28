const socket = new WebSocket("ws://localhost:3001");

socket.addEventListener("open", function () {
    console.log("CONNECTED");
});

function addMessage(name, message)
{
    validate=validateForm(message)
    if (validate===true) {
        const messageHTML = "<div class='message'><strong>" + name + ":</strong> " + message + "</div>";
        document.getElementById("chat").innerHTML += messageHTML
    }
}

socket.addEventListener("message", function (e) {
    console.log(e.data);
    try {
        const message = JSON.parse(e.data);
        addMessage(message.name, message.message);
    } catch (e) {
        // Catch any errors
    }
});


document.getElementById("sendBtn").addEventListener("click", function () {
    event.preventDefault()
    const message = {
        name: document.getElementById("message_author").textContent,
        message: document.getElementById("message_content").value
    };
    socket.send(JSON.stringify(message));
    addMessage(message.name, message.message);
});

function validateForm(message)
{

    if (message == "") {
        alert("Content canot be empty");
        return false;
    }
    if (message.length>255) {
        alert("Content must have less thn 255 characters");
        return false;
    }
}