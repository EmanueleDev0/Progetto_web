const captchaTextBox = document.getElementById("captchaCanvas");
const refreshButton = document.querySelector(".refresh_button");
let captchaText = null;

const generateCaptcha = () => {
    const randomString = Math.random().toString(36).substring(2, 7);
    const randomStringArray = randomString.split("");
    const changeString = randomStringArray.map((char) => (Math.random() > 0.5 ? char : char.toUpperCase()));
    captchaText = changeString.join(" ");
};

const drawStringOnCanvas = (text) => {
    const context = captchaTextBox.getContext("2d");

    // Pulisci il canvas
    context.clearRect(0, 0, captchaTextBox.width, captchaTextBox.height);

    // Imposta le opzioni di stile
    context.font = "20px Arial";
    context.fillStyle = "#000";

    // Disegna ogni carattere con uno spostamento verticale casuale
    for (let i = 0; i < text.length; i++) {
        const yOffset = Math.random() * 10 - 5; // Spostamento verticale casuale
        context.fillText(text[i], 20 * i, 20 + yOffset);
    }
};

const refreshBtnClick = () => {
    generateCaptcha();
    drawStringOnCanvas(captchaText);
    captchaInputBox.value = "";
    captchaKeyUpValidate();
};

refreshButton.addEventListener("click", refreshBtnClick);

document.addEventListener("DOMContentLoaded", function () {
    generateCaptcha();
    drawStringOnCanvas(captchaText);

    const captchaInput = document.querySelector(".captch_input");
    const loginForm = document.querySelector("form");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        if (captchaInput.value.trim() === captchaText.replace(/\s/g, "")) {
            this.submit();
        } else {
            alert("Captcha non corretto. Riprova.");
            refreshBtnClick();
        }
    });
});
