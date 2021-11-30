function LogInForm(event) {
    var valid = true;

    var elements = event.currentTarget;
    var email = elements[0].value; //Email
    var pswd = elements[1].value; //Password

    var regex_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var regex_pswd  = /^(\S*)?\d+(\S*)?$/;

    var msg_email = document.getElementById("msg_email");
    var msg_pswd = document.getElementById("msg_pswd");

    msg_email.innerHTML  = "";
    msg_pswd.innerHTML = "";

    //Variables for DOM Manipulation commands
    var textNode;
    var htmlNode;

    if (email == null || email === "") {
        textNode = document.createTextNode("Email address is empty.");
        msg_email.appendChild(textNode);
        valid = false;
    }
    else if (regex_email.test(email) === false) {
        valid = false;
    }

    if (pswd == null || pswd === "") {
        textNode = document.createTextNode("Password is empty.");
        msg_pswd.appendChild(textNode);
        valid = false;
    }
    else if (regex_pswd.test(pswd) === false) {
        valid = false;
    }
    else if (pswd.length < 8) {
        textNode = document.createTextNode("Password length must 8 characters or longer.");
        msg_pswd.appendChild(textNode);
        valid = false;
    }

    var display_info = document.getElementById("display_info");
    display_info.innerHTML = "";
    if (valid === true) {

        display_info.style.color = "green";

        textNode = document.createTextNode("Login Successful");
        display_info.appendChild(textNode);

        document.getElementById("SignUp").reset();

    }
    else {
        event.preventDefault();

        textNode = document.createTextNode("Invalid Data Entered. Please try again.");
        display_info.appendChild(textNode);
        htmlNode = document.createElement("br");
        display_info.appendChild(htmlNode);
    }
}

function SignUpForm(event) {

    var valid = true;

    var elements = event.currentTarget;
    var uname = elements[0].value; //Last name
    var email = elements[1].value; //Email
    var pswd = elements[2].value; //Password
    var pswdr = elements[3].value; //Confirm password

    var regex_name = /^[a-zA-Z0-9_-]+$/;
    var regex_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
    var regex_pswd  = /^(\S*)?\d+(\S*)?$/;

    var msg_uname = document.getElementById("msg_uname");
    var msg_email = document.getElementById("msg_email");
    var msg_pswd = document.getElementById("msg_pswd");
    var msg_pswdr = document.getElementById("msg_pswdr");

    msg_uname.innerHTML = "";
    msg_email.innerHTML  = "";
    msg_pswd.innerHTML = "";
    msg_pswdr.innerHTML = "";

    //Variables for DOM Manipulation commands
    var textNode;
    var htmlNode;

    if (uname == null || uname == "") {
        textNode = document.createTextNode("Username is empty.");
        msg_uname.appendChild(textNode);
        valid = false;
    }
    else if (regex_name.test(uname) == false) {
        textNode = document.createTextNode("Invalid username.");
        msg_uname.appendChild(textNode);
        valid = false;
    }

    if (email == null || email === "") {
        textNode = document.createTextNode("Email address is empty.");
        msg_email.appendChild(textNode);
        valid = false;
    }
    else if (regex_email.test(email) === false) {
        textNode = document.createTextNode("Invalid email address. Email addresss should be: example@example.com");
        msg_email.appendChild(textNode);
        valid = false;
    }

    if (pswd == null || pswd === "") {
        textNode = document.createTextNode("Password is empty.");
        msg_pswd.appendChild(textNode);
        valid = false;
    }
    else if (regex_pswd.test(pswd) === false) {
        textNode = document.createTextNode("Invalid password. It must have at least non-letter character.");
        msg_pswd.appendChild(textNode);
        valid = false;
    }
    else if (pswd.length < 8) {
        textNode = document.createTextNode("Password length must 8 characters or longer.");
        msg_pswd.appendChild(textNode);
        valid = false;
    }

    if (pswdr == null || pswdr === "") {
        textNode = document.createTextNode("Confirmation Password is empty.");
        msg_pswdr.appendChild(textNode);
        valid = false;
    }
    else if (pswd !== pswdr) {
        textNode = document.createTextNode("Password and Confirmation Password do not match.");
        msg_pswdr.appendChild(textNode);
        valid = false;
    }

    var display_info = document.getElementById("display_info");
    display_info.innerHTML = "";
    if (valid === true) {

        display_info.style.color = "green";

        textNode = document.createTextNode("Sign Up Successful");
        display_info.appendChild(textNode);

        document.getElementById("SignUp").reset();

    }
    else {
        event.preventDefault();

        textNode = document.createTextNode("Invalid Data Entered. Please try again.");
        display_info.appendChild(textNode);
        htmlNode = document.createElement("br");
        display_info.appendChild(htmlNode);
    }
}

function CreateEventForm(event) {
    var valid = true;

    var elements = event.currentTarget;
    var title = elements[0].value; //Title
    var course = elements[1].value; //Course name
    var duedate = elements[3].value; //Due date
    var duetime = elements[4].value; //Due time
    var description = elements[5].value; //Description
    var upload = elements[6].value; //Upload files

    var msg_title = document.getElementById("msg_title");
    var msg_course = document.getElementById("msg_course");
    var msg_duedate = document.getElementById("msg_duedate");
    var msg_duetime = document.getElementById("msg_duetime");
    var msg_description = document.getElementById("msg_description");
    var msg_upload = document.getElementById("msg_upload");

    msg_title.innerHTML = "";
    msg_course.innerHTML = "";
    msg_duedate.innerHTML = "";
    msg_duetime.innerHTML = "";
    msg_description.innerHTML = "";
    // msg_upload.innerHTML = "";


    //Variables for DOM Manipulation commands
    var textNode;
    var htmlNode;

    if (title == null || title === "") {
        textNode = document.createTextNode("Title cannot be empty.");
        msg_title.appendChild(textNode);
        valid = false;
    }

    if (course == null || course === "") {
        textNode = document.createTextNode("Course name cannot be empty.");
        msg_course.appendChild(textNode);
        valid = false;
    }

    if (duedate == null || duedate === "") {
        textNode = document.createTextNode("Due date cannot be empty.");
        msg_duedate.appendChild(textNode);
        valid = false;
    }

    if (duetime == null || duetime === "") {
        textNode = document.createTextNode("Due time cannot be empty.");
        msg_duetime.appendChild(textNode);
        valid = false;
    }

    // if (description == null || description === "") {
    //     textNode = document.createTextNode("Description cannot be empty.");
    //     msg_description.appendChild(textNode);
    //     valid = false;
    // }

    // if (upload == null || upload === "") {
    //     textNode = document.createTextNode("Due date cannot be empty.");
    //     msg_upload.appendChild(textNode);
    //     valid = false;
    // }


    var display_info = document.getElementById("display_info");
    display_info.innerHTML = "";
    if (valid ===  true) {

        display_info.style.color = "green";

        textNode = document.createTextNode("Sign Up Successful");
        display_info.appendChild(textNode);

        document.getElementById("SignUp").reset();

    }
    else {
        event.preventDefault();

        textNode = document.createTextNode("Invalid Data Entered. Please try again.");
        display_info.appendChild(textNode);
        htmlNode = document.createElement("br");
        display_info.appendChild(htmlNode);
    }
}