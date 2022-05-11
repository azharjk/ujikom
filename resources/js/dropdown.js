const dropdownBtn = document.getElementById('dropdown-btn');
const dropdownNav = document.getElementById('dropdown-nav');
const dropdownIconUp = document.getElementById('dropdown-icon-up');
const dropdownIconDown = document.getElementById('dropdown-icon-down');

const mainDropdown = () => {
    if (!dropdownBtn || !dropdownNav || !dropdownIconUp || !dropdownIconDown) return;

    dropdownBtn.onclick = (_) => {
        dropdownNav.classList.toggle('hidden');
        dropdownIconUp.classList.toggle('hidden');
        dropdownIconDown.classList.toggle('hidden');
    }
}

mainDropdown();
