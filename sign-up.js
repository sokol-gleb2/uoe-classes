



function create() {
    const name = document.getElementById('nameInput').value;
    const username = document.getElementById('usernameInput').value;
    const password = document.getElementById('passwordInput').value;
    const repeated_password = document.getElementById('passwordInputRepeat').value;
    const email = document.getElementById('emailInput').value;

    if (name == "" || username == "" || password == "" || email == "") {
        // error
        document.querySelector('.username_taken').setAttribute('problem', 'username_taken');
        document.querySelector('.username_taken').innerHTML = "Please Fill in all the Fields";
    }
    else if (repeated_password != password) {
        // error
        document.querySelector('.username_taken').setAttribute('problem', 'username_taken');
        document.querySelector('.username_taken').innerHTML = "Passwords don't match - try it again";

    }else {
        document.getElementById('create_username_field').innerHTML = username;
        document.getElementById('create_password_field').innerHTML = password;
        document.getElementById('create_email_field').innerHTML = email;
        document.getElementById('create_name_field').innerHTML = name;

        document.getElementById('hiddenSubmitButton').click();
    }


}