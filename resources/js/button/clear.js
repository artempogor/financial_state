const button_clear = document.querySelector('#clear');
button_clear.addEventListener('click', () => {
    hot.clear();
    infoConsole.innerText = 'Отчёт очищена'
});