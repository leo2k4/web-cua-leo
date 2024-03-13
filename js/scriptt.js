const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btn-login');
const iconClose = document.querySelector('.icon-close');


registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
});


iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
});

const checkEmail = (email) => {
    if (!email) {
        return ("*Hãy nhập email!");
    } else if (!isValidEmail(email)) {
        return ("*Vui lòng nhập địa chỉ email hợp lệ!");
    }
    else return true;
}

const checkPassword = (password) => {
    if (!password) {
        return ("*Hãy nhập password!");
    } else if (password == "") {
        return ("*Vui lòng nhập password!");
    } else return true;
}
const isValidEmail = (email) => {
    // Biểu thức chính quy kiểm tra địa chỉ email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return emailRegex.test(email);
};

const showError = (element, message) => {
    element.style.display = "block";
    element.innerHTML = message;
    element.className = "mess_errorEmail";
}

const hideError = (element) => {
    element.style.display = "none";
}

const validation = (form) => {
    const email = form.email.value;
    const password = form.password.value;
    const errorEmail = document.getElementById('errorEmail');
    const errorPass = document.getElementById('errorPassword');


    let messErrorEmail = checkEmail(email);
    if (typeof messErrorEmail === "string") {
        showError(errorEmail, messErrorEmail);
    } else {
        hideError(errorEmail);
    }

    let messErrorPassword = checkPassword(password);
    if (typeof messErrorPassword === "string") {
        showError(errorPass, messErrorPassword);
    } else {
        hideError(errorPass);
    }


    if (typeof messErrorEmail === "string" || typeof messErrorPassword === "string") {
        return false;
    } else {
        return true;
    }
};


const checkEmail1 = (email) => {
    if (!email) {
        return ("*Hãy nhập email!");
    } else if (!isValidEmail(email)) {
        return ("*Vui lòng nhập địa chỉ email hợp lệ!");
    }
    else return true;
}

const checkPassword1 = (password) => {
    if (!password) {
        return ("*Hãy nhập password!");
    } else if (password == "") {
        return ("*Vui lòng nhập password!");
    } else return true;
}

const checkUsername1 = (username) => {
    if (!username) {
        return "*Hãy nhập username!";
    } else if (username.length < 5 || username.length > 16) {
        return "*Username phải > 5 hoặc < 16 kí tự!";
    } else if (!isValidUsername(username)) {
        return "*Username không được chứa kí tự đặc biệt!";
    } else {
        return true;
    }
}

const isValidUsername = (username) => {
    // Biểu thức chính quy kiểm tra xem username có chứa kí tự đặc biệt hay không
    const usernameRegex = /^[a-zA-Z0-9_]+$/;

    return usernameRegex.test(username);
};




const isValidEmail1 = (email) => {
    // Biểu thức chính quy kiểm tra địa chỉ email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return emailRegex.test(email);
};

const showError1 = (element, message) => {
    element.style.display = "block";
    element.innerHTML = message;
    element.className = "mess_errorEmail";
}

const hideError1 = (element) => {
    element.style.display = "none";
}

const validationn = (form) => {
    const email = form.email.value;
    const password = form.password.value;
    const username = form.username.value;
    const errorEmail1 = document.getElementById('errorEmail1');
    const errorPass1 = document.getElementById('errorPassword1');
    const errorUsername1 = document.getElementById('errorUsername1');

    let messErrorEmail1 = checkEmail(email);
    if (typeof messErrorEmail1 === "string") {
        showError(errorEmail1, messErrorEmail1);
    } else {
        hideError(errorEmail1);
    }

    let messErrorPassword1 = checkPassword(password);
    if (typeof messErrorPassword1 === "string") {
        showError(errorPass1, messErrorPassword1);
    } else {
        hideError(errorPass1);
    }

    let messErrorUsername1 = checkUsername1(username);
    if (typeof messErrorUsername1 === "string") {
        showError(errorUsername1, messErrorUsername1);
    } else {
        hideError(errorUsername1);
    }


    if (typeof messErrorEmail1 === "string" || typeof messErrorPassword1 === "string" || typeof messErrorUsername1 === "string") {
        return false;
    } else {
        return true;
    }
};



