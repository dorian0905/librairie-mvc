// Creation Pop-Up
function validateDelete(controller, id) {
    const bgWindow = document.createElement('div');
    bgWindow.setAttribute("id", "bgWindow");
    bgWindow.setAttribute("onclick", "hidePopup()");
    const nameArray = document.getElementsByClassName(`element${id}`);
    let displayedName = nameArray[0].innerText;
    for(let i=1; i<nameArray.length; i++) {
        displayedName += ' - ' + nameArray[i].innerText;
    }
    const popup = document.createElement('div');
    popup.classList.add('popup');
    popup.setAttribute("id", "popup");
    popup.innerHTML = `
    <p class="popup__question">Voulez-vous supprimer ${displayedName} ?</p>
    <div class="popup__buttons">
        <button onclick="hidePopup()">Annuler</button>
        <button onclick="redirectDelete('${controller}', ${id})">Valider</button>
    </div>`;
    bgWindow.appendChild(popup);
    document.body.appendChild(bgWindow);
}

// Redirection to action to delete
function redirectDelete(controller, id) {
    window.location.href = `http://localhost/?controller=${controller}&action=supprimer_${controller}&id=${id}`;
}

// Hide Pop-Up
function hidePopup() {
    const bgWindow = document.getElementById("bgWindow");
    document.body.removeChild(bgWindow);
}