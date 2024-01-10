const arrow = document.getElementById("arrow");
const close = document.getElementById("close-icon");
const profile = document.getElementById("profile");

arrow.addEventListener("click", () => {
    profile.classList.remove("-translate-x-full");
});

close.addEventListener("click", () => {
    profile.classList.add("-translate-x-full");
});

const modalBtn = document.querySelector('#edit');
if (modalBtn) {
    const modal = document.querySelector('[aria-modal="true"]');
    const inputHidden = document.querySelector('input[name="id"]');
    modalBtn.addEventListener('click', function (e) {
        modal.classList.toggle('hidden');
        inputHidden.value = this.dataset.id;
    });

    const backdrop = document.querySelector('#backdrop');
    backdrop.addEventListener('click', function () {
        modal.classList.toggle('hidden');
    });
}
