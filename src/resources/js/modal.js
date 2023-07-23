const amountField = document.getElementById('amountInput');
const plusBtn = document.getElementById('plusButton');
const minusBtn = document.getElementById('minusButton');

plusBtn.addEventListener('click', function (event) {
    if (parseFloat(amountField.value) >= 1000) {
        const confirmMessage = "Are you sure you want to perform this action?";
        if (!window.confirm(confirmMessage)) {
            event.preventDefault();
        }
    }
});

minusBtn.addEventListener('click', function (event) {
    if (parseFloat(amountField.value) >= 1000) {
        const confirmMessage = "Are you sure you want to perform this action?";
        if (!window.confirm(confirmMessage)) {
            event.preventDefault();
        }
    }
});
