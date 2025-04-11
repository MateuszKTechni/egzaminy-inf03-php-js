function createMessage(message, classNm, imageSource, altText){
    const messageBlock = document.createElement("div");
    messageBlock.classList.add("message", classNm);

    messageBlock.innerHTML = `
        <img src="${imageSource}" alt="${altText}">
        <p>${message}</p>
    `;

    document.querySelector("#chat").appendChild(messageBlock);
    messageBlock.scrollIntoView();
}

function sendMessage() {
    createMessage(document.querySelector("#messageInput").value,"jolanta","Jolka.jpg","Jolka alt");
}
function generateRandomReplay(){
    const replies = [
        "Świetnie!",
        "Kto gra główną rolę?",
        "Lubisz filmy tego reżysera?",
        "Będę 10 minut wcześniej",
        "Może kupimy sobie popcorn?",
        "Ja wolę Colę",
        "Zaproszę jeszcze Grześka",
        "Tydzień temu też byłem w kinie na Diunie",
        "Ja funduję bilety"
    ];

    const randomNumber = Math.floor(Math.random() * replies.length);
    createMessage(replies[randomNumber], "krzysztof", "Krzysiek.jpg", "Krzysiek alt");
}
