document.getElementById('expiryDate').addEventListener('input', function () {
    var value = this.value;

    if (value.length === 2 && !value.includes('/')) {
        this.value = value + '/';
    }
});

document.getElementById('cardNumber').addEventListener('input', function () {
    var value = this.value.split(' ').join('');
    var formattedValue = '';

    for (var i = 0; i < value.length; i += 4) {
        formattedValue += value.substr(i, 4) + ' ';
    }

    if (value.length >= 16) {
        formattedValue = formattedValue.substring(0, 19);
    }

    this.value = formattedValue.trim();
});

document.getElementById('cvv').addEventListener('input', function () {
    var value = this.value;

    if (value.length > 3) {
        this.value = value.substring(0, 3);
    }
});