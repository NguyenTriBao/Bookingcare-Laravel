<!-- Chat Icon -->
<div id="chat-icon"
    style="position: fixed; bottom: 100px; right: 45px; background-color: #3c8dbc; color: white; padding: 15px; border-radius: 50% !important; cursor: pointer; z-index: 9999; width: 48px; height: 48px; display: flex; align-items: center;">
    <i class="fas fa-comment"></i>
</div>

<!-- Chat Box -->
<div id="chat-widget"
    style="position: fixed; bottom: 0px; right: 0px; width: 300px; height: 400px; background: #fff; border: 1px solid #ccc; z-index: 9998; display: none; flex-direction: column;">
    <div style="background: #3c8dbc; color: white; padding: 10px; display: flex; justify-content: space-between;">
        <span>Hỗ trợ</span>
        <span style="cursor: pointer;" id="chat-close">✖</span>
    </div>
    <div id="chat-messages" style="flex: 1; padding: 10px; overflow-y: auto;"></div>
    <div style="padding: 10px;">
        <input type="text" id="chat-input" placeholder="Nhập tin nhắn..." style="width: 100%; padding: 5px;" />
    </div>
</div>




<script>
    const chatIcon = document.getElementById("chat-icon");
    const chatWidget = document.getElementById("chat-widget");
    const chatClose = document.getElementById("chat-close");
    const chatMessages = document.getElementById("chat-messages");
    const chatInput = document.getElementById("chat-input");

    const senderId = "guest_" + Math.random().toString(36).substring(7);

    chatIcon.addEventListener("click", () => {
        chatWidget.style.display = "flex";
        chatIcon.style.display = "none";
    });

    chatClose.addEventListener("click", () => {
        chatWidget.style.display = "none";
        chatIcon.style.display = "flex";
    });

    chatInput.addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            sendMessage(this.value);
            this.value = "";
        }
    });

    function sendMessage(message) {
        if (!message.trim()) return;

        chatMessages.innerHTML += `<div><strong>Bạn:</strong> ${message}</div>`;

        fetch("http://localhost:5005/webhooks/rest/webhook", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                sender: senderId,
                message: message
            })
        })
        .then(res => res.json())
        .then(data => {
            data.forEach(d => {
                if (d.text) {
                    chatMessages.innerHTML += `<div><strong>Bot:</strong> ${d.text}</div>`;
                }

                if (d.buttons) {
                    d.buttons.forEach(btn => {
                        const button = document.createElement("button");
                        button.innerText = btn.title;
                        button.style.margin = "5px 3px";
                        button.style.padding = "5px 10px";
                        button.style.border = "1px solid #3c8dbc";
                        button.style.background = "#f7f7f7";
                        button.style.cursor = "pointer";
                        button.onclick = () => {
                            chatMessages.innerHTML += `<div><strong>Bạn:</strong> ${btn.title}</div>`;
                            sendMessage(btn.payload);
                        };
                        chatMessages.appendChild(button);
                    });
                }

                chatMessages.scrollTop = chatMessages.scrollHeight;
            });
        });
    }
</script>