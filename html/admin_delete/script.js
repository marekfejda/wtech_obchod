document.getElementById("confirmDeleteBtn").addEventListener("click", function () {
    // Blur any currently focused element to avoid aria-hidden conflict
    if (document.activeElement) {
        document.activeElement.blur();
    }

    // Create and show notification
    const container = document.getElementById("notificationContainer");
    const message = document.createElement("div");
    message.className = "alert alert-success shadow position-absolute start-50 translate-middle-x";
    message.style.top = `${container.childElementCount * 20}px`;
    message.classList.add("toast-message");
    message.textContent = "Produkt bol úspešne odstránený.";
    container.appendChild(message);

    setTimeout(() => {
        message.remove();
        const notifs = container.children;
        for (let i = 0; i < notifs.length; i++) {
            notifs[i].style.top = `${i * 20}px`;
        }
    }, 3000);

    // Hide modal after blur
    const modal = bootstrap.Modal.getInstance(document.getElementById("confirmDeleteModal"));
    modal.hide();
});
