/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
window.confimDelete = function (formId, msg) {
  var form = document.getElementById(formId);
  var confirmacao = confirm(msg);

  if (confirmacao) {
    form.submit();
  }
};
/******/ })()
;