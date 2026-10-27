document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('button.eye').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = btn.parentElement.querySelector('input');
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });
});
