/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/dropdown.js ***!
  \**********************************/
var dropdownBtn = document.getElementById('dropdown-btn');
var dropdownNav = document.getElementById('dropdown-nav');
var dropdownIconUp = document.getElementById('dropdown-icon-up');
var dropdownIconDown = document.getElementById('dropdown-icon-down');

var mainDropdown = function mainDropdown() {
  if (!dropdownBtn || !dropdownNav || !dropdownIconUp || !dropdownIconDown) return;

  dropdownBtn.onclick = function (_) {
    dropdownNav.classList.toggle('hidden');
    dropdownIconUp.classList.toggle('hidden');
    dropdownIconDown.classList.toggle('hidden');
  };
};

mainDropdown();
/******/ })()
;