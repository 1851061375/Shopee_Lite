
function Validator(options) {
    var selectorRules = {};
    //toi uu cau truc
    // function getParent(element, selector) {
    //     while (element.parentElement) {
    //         if (element.parentElement.matches(selector)) {
    //             return element.parentElement;
    //         }
    //         element = element.parentElement;
    //     }
    // }
    
    //Ham thuc hien validate
    function validate(inputElement, rule) {
        var errorMessage ;
        var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
        //toi uu
        // var errorElement = getParent(inputElement, '.auth-form__group').querySelector(options.errorSelector);
        //Lay ra cac rules cua selector
        var rules = selectorRules[rule.selector];

        for (var i = 0; i < rules.length; i++) {
            errorMessage = rules[i](inputElement.value);
            if(errorMessage) break;
        }

            if (errorMessage) {
                errorElement.innerText = errorMessage;
                inputElement.parentElement.classList.add('invalid');
            }
            else {
                errorElement.innerText = '';
                inputElement.parentElement.classList.remove('invalid');
            }
        return !errorMessage;
    }
        //chon form 
        var formElement = document.querySelector(options.form);
        if (formElement) {
            formElement.onsubmit = function(e) {
                e.preventDefault();
                var formValid = true;

                options.rules.forEach(function(rule) {
                    var inputElement = formElement.querySelector(rule.selector);
                    var isValid = validate(inputElement, rule);
                    
                    if (!isValid) {
                        formValid = false;
                    }
                    });

                if (formValid) {
                    //submit voi js
                    if (typeof options.onsubmit === 'function') {
                        var enableInputs = formElement.querySelectorAll('[name]:not([disable])');
                        var formValues = Array.from(enableInputs).reduce(function(value, input) {
                            value[input.name] = input.value;
                            return value;
                        }, {})
                        
                        console.log(formValues);
                     } else {
                         formElement.submit();
                     }
                }
            }

            //lang nghe su kien qua cac rule
            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);

                //Luu lai cac rules
                if (inputElement) {
                    if (Array.isArray(selectorRules[rule.selector])) {
                        selectorRules[rule.selector].push(rule.test);
                    } else {
                        selectorRules[rule.selector] = [rule.test];
                    }
                
                    //Xu ly truong hop  blur ra khoi input
                    inputElement.onblur = function() {
                        validate(inputElement, rule);
                    }

                    //Xu ly khi nhap du lieu
                    inputElement.oninput = function() {
                        var errorMessage = rule.test(inputElement.value);
                        var errorElement = inputElement.parentElement.querySelector(options.errorSelector);

                        errorElement.innerText = '';
                        inputElement.parentElement.classList.remove('invalid');
                    }
                }
            })
        }
    
}


Validator.isEmail = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regex.test(value) ? undefined : 'Vui lòng nhập Email';
        }
    }
}


Validator.minLength = function(selector, min) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : 'Nhập tối thiểu '+min+' ký tự';
        }
    }
}

Validator.isConfirm = function(selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}
