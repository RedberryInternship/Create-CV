import "./bootstrap";

const copyButton = document.querySelector("#copy-button");
const tokenDiv = document.querySelector("#token");
const copyText = document.querySelector("#copy-text");
const copiedText = document.querySelector("#copied-text");

function fallbackCopyTextToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;

    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
        document.execCommand("copy");
    } catch (err) {}
    document.body.removeChild(textArea);
}

export const copyToClipboard = async (text) => {
    if (!navigator.clipboard) {
        fallbackCopyTextToClipboard(text);
        return;
    }
    try {
        await navigator.clipboard.writeText(text);
    } catch (error) {}
};

copyButton.addEventListener("click", async () => {
    if (tokenDiv.textContent) {
        await copyToClipboard(tokenDiv.textContent);
        copyButton.style.backgroundColor = "rgb(34 197 94)";
        copyText.style.opacity = "0";
        copiedText.style.opacity = "100";
        copyButton.style.color = "white";
        setTimeout(() => {
            copyButton.style.backgroundColor = "";
            copyText.style.opacity = "100";
            copiedText.style.opacity = "0";
            copyButton.style.color = "";
        }, 1000);
    } else {
        alert("error happened try reloading");
    }
});
