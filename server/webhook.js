const axios = require("axios");

async function sendWebhook(msg){

    if(!msg.message) return;

    let text = "";

    if(msg.message.conversation){
        text = msg.message.conversation;
    }

    if(msg.message.extendedTextMessage){
        text = msg.message.extendedTextMessage.text;
    }

    const from = msg.key.remoteJid;

    await axios.post("https://wa.bdi.asia/webhook.php", {
        from: from,
        message: text
    });

}

module.exports = { sendWebhook };