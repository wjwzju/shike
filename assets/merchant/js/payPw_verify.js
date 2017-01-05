/**
 * 模拟支付宝的密码输入形式
 */
(function (window, document) {
    var active = 0,
        inputBtn = document.getElementsByClassName('pw');

    for (var i = 0; i <= inputBtn.length; i++) {
        inputBtn[i].addEventListener('click', function () {
            inputBtn[active].focus();
        }, false);
        inputBtn[i].addEventListener('focus', function () {
            this.addEventListener('keyup', listenKeyUp, false);
        }, false);
        inputBtn[i].addEventListener('blur', function () {
            this.removeEventListener('keyup', listenKeyUp, false);
        }, false);
    }

    /**
     * 监听键盘的敲击事件
     */
    function listenKeyUp() {
        var beginBtn = document.querySelector('#beginBtn');
        if (!isNaN(this.value) && this.value.length != 0) {
            if (active < 5) {
                active += 1;
            }
            inputBtn[active].focus();
        } else if (this.value.length == 0) {
            if (active > 0) {
                active -= 1;
            }
            inputBtn[active].focus();
        }
        if (active >= 5) {
            var _value = inputBtn[active].value;
            if (beginBtn.className == 'begin-no' && !isNaN(_value) && _value.length != 0) {
                beginBtn.className = 'begin';
                beginBtn.addEventListener('click', function () {
                    calculate.begin();
                }, false);
            }
        } else {
            if (beginBtn.className == 'begin') {
                beginBtn.className = 'begin-no';
            }
        }
    }
})(window, document);