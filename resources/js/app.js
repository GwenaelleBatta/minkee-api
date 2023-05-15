import './bootstrap';
function handlePassword() {
    let inputs = document.getElementsByClassName('password');
    let btns = document.getElementsByClassName('show-password');
    let show = document.getElementsByClassName('show');
    let hide = document.getElementsByClassName('hide');

    // @ts-ignore
    Array.from(btns).forEach((btn, index) => {
        btn.addEventListener('click', () => {
            let input = inputs[index];
            (input.type === 'password') ? input.type = 'text' : input.type = 'password';
            show[index].classList.toggle('hidden');
            hide[index].classList.toggle('hidden');
        });
    });
}
handlePassword();
