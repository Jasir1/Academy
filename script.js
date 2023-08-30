function changeView() {

    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}

var userErrorModal1;

function signUp() {
    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var confirmpassword = document.getElementById("confirmpassword");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("username", username.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("confirmpassword", confirmpassword.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                username.value = "";
                email.value = "";
                password.value = "";
                confirmpassword.value = "";
                mobile.value = "";
                gender.value = "";
                // document.getElementById("error-msg1").innerHTML = "";
                var m = document.getElementById("userErrorModal1");
                userErrorModal1 = new bootstrap.Modal(m);
                userErrorModal1.show();
                document.getElementById("modalStatus").className = "success_message";
                document.getElementById("error-msg1").innerHTML = "Account created successfully.";

                changeView();
            } else {
                var m = document.getElementById("userErrorModal1");
                userErrorModal1 = new bootstrap.Modal(m);
                userErrorModal1.show();

                document.getElementById("modalStatus").className = "warning_message";
                document.getElementById("error-msg1").innerHTML = text;
            }
        }

    };
    r.open("POST", "signUpProcess.php", true);
    r.send(form);
}

var userErrorModal2;

function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberMe = document.getElementById("rememberMe");

    var acc_value = "";
    if (document.getElementById('academic_officer').checked) {
        var acc_value = "academic_officer";
    } else if (document.getElementById('teacher').checked) {
        var acc_value = "teacher";
    } else if (document.getElementById('student').checked) {
        var acc_value = "student";
    }

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);
    form.append("acc_value", acc_value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                window.location = "home.php";
            } else {
                // document.getElementById("error-msg2").innerHTML = text;
                var m = document.getElementById("userErrorModal2");
                userErrorModal2 = new bootstrap.Modal(m);
                userErrorModal2.show();

                document.getElementById("error-msg2").innerHTML = text;
                // alert(text);
            }
        }
    }
    r.open("POST", "signInProcess.php", true);
    r.send(form);
}

var adminSigninResponseModal;

function adminSignIn() {
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var rememberMe = document.getElementById("rememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {

                window.location = "adminPanel.php";
            } else {
                var m = document.getElementById("adminSigninResponseModal");
                adminSigninResponseModal = new bootstrap.Modal(m);
                adminSigninResponseModal.show();

                document.getElementById("responseMessage").innerHTML = text;
            }
        }
    }
    r.open("POST", "AdminSignInProcess.php", true);
    r.send(form);
}

var passwordResetModal;
var forgotPasswordModal;

function forgotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                var modal1 = document.getElementById("forgotPasswordModal");
                forgotPasswordModal = new bootstrap.Modal(modal1);
                forgotPasswordModal.show();
                document.getElementById("responseMessages").innerHTML = "Verification Code Sent to Your Email.Please Check Your Email";

                var closeModal = document.getElementById("closeModal");
                closeModal.addEventListener("click", e => {
                    forgotPasswordModal.hide();
                    var modal2 = document.getElementById("passwordResetModal");
                    passwordResetModal = new bootstrap.Modal(modal2);
                    passwordResetModal.show();
                })

            } else {
                alert(text);
            }
        }
    };

    r.open("GET", "ForgotPasswordProcess.php?email=" + email.value, true);
    r.send();
}

function showbtn1() {

    var newPassword = document.getElementById("newPassword");
    var newPasswordShow = document.getElementById("newPasswordShow");

    if (newPasswordShow.innerHTML == "Show") {

        newPassword.type = "text";
        newPasswordShow.innerHTML = "Hide";

    } else {

        newPassword.type = "password";
        newPasswordShow.innerHTML = "Show";

    }
}

function showbtn2() {

    var confirmPassword = document.getElementById("confirmPassword");
    var confirmPasswordShow = document.getElementById("confirmPasswordShow");

    if (confirmPasswordShow.innerHTML == "Show") {

        confirmPassword.type = "text";
        confirmPasswordShow.innerHTML = "Hide";

    } else {

        confirmPassword.type = "password";
        confirmPasswordShow.innerHTML = "Show";

    }
}

function passwordReset() {
    var email = document.getElementById("email2");
    var newPassword = document.getElementById("newPassword");
    var confirmPassword = document.getElementById("confirmPassword");
    var code = document.getElementById("code");

    var form = new FormData();
    form.append("email", email.value);
    form.append("newPassword", newPassword.value);
    form.append("confirmPassword", confirmPassword.value);
    form.append("code", code.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                alert("Password reset success.");
                bootstrapModal.hide();
            }
        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(form);

}
var logOutConfirmationModal;

function logOutConfirmation() {
    var m = document.getElementById("logOutConfirmationModal");
    var logOutConfirmationModal = new bootstrap.Modal(m);
    logOutConfirmationModal.show();
}

function logOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                window.location = "index.php";
            }
        }
    }

    r.open("GET", "logOutProcess.php", true);
    r.send();
}

var adminLogOutConfirmationModal;

function adminLogOutConfirmation() {
    var m = document.getElementById("adminLogOutConfirmationModal");
    var adminLogOutConfirmationModal = new bootstrap.Modal(m);
    adminLogOutConfirmationModal.show();
}


function adminLogOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                window.location = "adminSignin.php";
            }
        }
    }

    r.open("GET", "adminLogOutProcess.php", true);
    r.send();
}

function changeImg() {
    var image = document.getElementById("profile_img");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);
        view.src = url;
    }
}

var updateProfileModal;

function updateProfile() {
    var firstName = document.getElementById("first_name");
    var lastName = document.getElementById("last_name");
    var address1 = document.getElementById("address1");
    var address2 = document.getElementById("address2");
    var city = document.getElementById("city");
    var postalCode = document.getElementById("postal_code");
    var image = document.getElementById("profile_img");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");


    var form = new FormData();
    form.append("fname", firstName.value);
    form.append("lname", lastName.value);
    form.append("add1", address1.value);
    form.append("add2", address2.value);
    form.append("city", city.value);
    form.append("pcode", postalCode.value);
    form.append("username", username.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("image", image.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                document.getElementById("modalStatus").className = "success_message";
                var m = document.getElementById("updateProfileModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

                document.getElementById("updateProfileModalMsg").innerHTML = "Profile updated successfully";

            } else {
                document.getElementById("modalStatus").className = "warning_message";
                var m = document.getElementById("updateProfileModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

                document.getElementById("updateProfileModalMsg").innerHTML = text;
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(form);

}


function updateAdminProfile() {
    var firstName = document.getElementById("first_name");
    var lastName = document.getElementById("last_name");
    var image = document.getElementById("profile_img");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");

    var form = new FormData();
    form.append("fname", firstName.value);
    form.append("lname", lastName.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("image", image.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            // var m = document.getElementById("updateProfileModal");
            // updateProfileModal = new bootstrap.Modal(m);
            // updateProfileModal.show();

            // document.getElementById("updateProfileModalMsg").innerHTML = text;
            // window.location = "adminProfile.php";

            //////////
            if (text == "success") {
                document.getElementById("modalStatus").className = "success_message";
                var m = document.getElementById("updateProfileModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

                document.getElementById("updateProfileModalMsg").innerHTML = "Profile updated successfully";

            } else {
                document.getElementById("modalStatus").className = "warning_message";
                var m = document.getElementById("updateProfileModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

                document.getElementById("updateProfileModalMsg").innerHTML = text;
            }
        }
    }

    r.open("POST", "adminUpdateProfileProcess.php", true);
    r.send(form);

}

var addStudentModal;

function addStudentWindow() {
    var m = document.getElementById("addStudentModal");
    var addStudentModal = new bootstrap.Modal(m);
    addStudentModal.show();
}

function addNewStudent() {

    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var confirmpassword = document.getElementById("confirmpassword");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("username", username.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("confirmpassword", confirmpassword.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var m = document.getElementById("newStudentAccountCreatedModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

            } else {
                document.getElementById("error-msg1").innerHTML = text;
            }
        }
    }

    r.open("POST", "addNewStudentProcess.php", true);
    r.send(form);
}

var addTeacherModal;

function addTeacherWindow() {
    var m = document.getElementById("addTeacherModal");
    var addTeacherModal = new bootstrap.Modal(m);
    addTeacherModal.show();
}

function addNewTeacher() {

    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var confirmpassword = document.getElementById("confirmpassword");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("username", username.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("confirmpassword", confirmpassword.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var m = document.getElementById("newTeacherAccountCreatedModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

            } else {
                document.getElementById("error-msg1").innerHTML = text;
            }
        }
    }

    r.open("POST", "addNewTeacherProcess.php", true);
    r.send(form);
}

var addAcademicOfficerModal;

function addAcademicOfficerWindow() {
    var m = document.getElementById("addAcademicOfficerModal");
    var addAcademicOfficerModal = new bootstrap.Modal(m);
    addAcademicOfficerModal.show();
}

function addNewAcademicOfficer() {

    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var confirmpassword = document.getElementById("confirmpassword");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("username", username.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("confirmpassword", confirmpassword.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var m = document.getElementById("newAcademicOfficerAccountCreatedModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

            } else {
                document.getElementById("error-msg1").innerHTML = text;
            }
        }
    }

    r.open("POST", "addNewAcademicOfficerProcess.php", true);
    r.send(form);
}

var addAssignmentModal;

function addAssignmentWindow() {
    var m = document.getElementById("addAssignmentModal");
    var addAssignmentModal = new bootstrap.Modal(m);
    addAssignmentModal.show();
}

function addNewAssignment() {

    var assignment_id = document.getElementById("assignment_id");
    var assignment_name = document.getElementById("assignment_name");
    var start_date = document.getElementById("start_date");
    var end_date = document.getElementById("end_date");
    var subject = document.getElementById("subject");

    var form = new FormData();
    form.append("assignment_id", assignment_id.value);
    form.append("assignment_name", assignment_name.value);
    form.append("start_date", start_date.value);
    form.append("end_date", end_date.value);
    form.append("subject", subject.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var m = document.getElementById("newAssignmentCreatedModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

            } else {
                document.getElementById("error-msg1").innerHTML = text;
            }
        }
    }

    r.open("POST", "addNewAssignmentProcess.php", true);
    r.send(form);
}

var addLessionModal;

function addLessionWindow() {
    var m = document.getElementById("addLessionModal");
    var addLessionModal = new bootstrap.Modal(m);
    addLessionModal.show();
}

function addNewLession() {

    var lession_id = document.getElementById("lession_id");
    var lession_name = document.getElementById("lession_name");
    var subject = document.getElementById("subject");

    var form = new FormData();
    form.append("lession_id", lession_id.value);
    form.append("lession_name", lession_name.value);
    form.append("subject", subject.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var m = document.getElementById("newLessionCreatedModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

            } else {
                document.getElementById("error-msg1").innerHTML = text;
            }
        }
    }

    r.open("POST", "addNewLessionProcess.php", true);
    r.send(form);
}


var addAnswerSheetModal;

function addAnswerSheetWindow() {
    var m = document.getElementById("addAnswerSheetModal");
    var addAnswerSheetModal = new bootstrap.Modal(m);
    addAnswerSheetModal.show();
}

function addNewAnswerSheet() {

    var assignment_id = document.getElementById("assignment_id");

    var form = new FormData();
    form.append("assignment_id", assignment_id.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var m = document.getElementById("newAnswerSheetCreatedModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

            } else {
                document.getElementById("error-msg1").innerHTML = text;
            }
        }
    }

    r.open("POST", "addNewAnswerSheetProcess.php", true);
    r.send(form);
}

var addMarkModal;

function addMarkWindow() {
    var m = document.getElementById("addMarkModal");
    var addMarkModal = new bootstrap.Modal(m);
    addMarkModal.show();
}

function addNewMark() {

    var assignment_id = document.getElementById("assignment_id");
    var student_email = document.getElementById("student_email");
    var mark = document.getElementById("mark");

    var form = new FormData();
    form.append("assignment_id", assignment_id.value);
    form.append("student_email", student_email.value);
    form.append("mark", mark.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {

                var m = document.getElementById("newMarkCreatedModal");
                updateProfileModal = new bootstrap.Modal(m);
                updateProfileModal.show();

            } else {
                document.getElementById("error-msg1").innerHTML = text;
            }
        }
    }

    r.open("POST", "addNewMarkProcess.php", true);
    r.send(form);
}

function pswd_addon() {

    var show_text = document.getElementById("password");
    var img_show = document.getElementById("img_show");
    var img_hide = document.getElementById("img_hide");

    var show = img_show.classList.toggle("d-none");
    var hide = img_hide.classList.toggle("d-none");

    if (hide == false) {

        show_text.type = "text";
        img_hide.className = "bi-eye-slash-fill";

    } else {

        show_text.type = "password";
        img_show.className = "bi-eye-fill";

    }
}

function changePdf() {
    var pdf = document.getElementById("pdfUploader");
    var view = document.getElementById("pdfPrev");

    pdf.onchange = function() {
        var allowedExtension = /(\.pdf)$/i;
        if (allowedExtension.exec(pdf.value)) {
            view.src = "resources/acrobat_reader.png";
        } else {
            var file = this.files[0];
            var url = window.URL.createObjectURL(file);
            view.src = url;
        }
    }
}


var updateBookModal;

function updateBook() {
    var title = document.getElementById("title");
    var author = document.getElementById("author");
    var publisher = document.getElementById("publisher");
    var publishedDate = document.getElementById("publishedDate");
    var isbn = document.getElementById("isbn");
    // var language = document.getElementById("language");
    var qty = document.getElementById("qty");
    var pageCount = document.getElementById("pageCount");
    var price = document.getElementById("price");
    var dwc = document.getElementById("dwc");
    var doc = document.getElementById("doc");
    var description = document.getElementById("description");
    var overview = document.getElementById("overview");
    var image = document.getElementById("imageUploader");
    var pdf = document.getElementById("pdfUploader");

    var form = new FormData();
    form.append("title", title.value);
    form.append("author", author.value);
    form.append("publisher", publisher.value);
    form.append("publishedDate", publishedDate.value);
    form.append("isbn", isbn.value);
    // form.append("language", language.value);
    form.append("qty", qty.value);
    form.append("pageCount", pageCount.value);
    form.append("price", price.value);
    form.append("dwc", dwc.value);
    form.append("doc", doc.value);
    form.append("description", description.value);
    form.append("overview", overview.value);
    form.append("image", image.files[0]);
    form.append("pdf", pdf.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {
                var m = document.getElementById("updateBookModal");
                addBookModal = new bootstrap.Modal(m);
                addBookModal.show();

                window.history.back();
                // window.location.reload();

            } else {
                var m = document.getElementById("errorMsgModal");
                addBookModal = new bootstrap.Modal(m);
                addBookModal.show();

                document.getElementById("errorMessages").innerHTML = text;
            }
        }
    };
    r.open("POST", "updateBookProcess.php", true);
    r.send(form);

}




function advancedSearchButton() {
    var advancedDiv = document.getElementById("advancedDiv");
    var homeContent = document.getElementById("homeContent");
    var advanceShow = document.getElementById("advanceShow");

    advancedDiv.classList.toggle("d-none");
    homeContent.classList.toggle("d-none");
    advanceShow.classList.toggle("d-none");
}

function advancedSearch(x) {

    var searchTitle = document.getElementById("searchTitle");
    var searchAuthor = document.getElementById("searchAuthor");
    var selectCategory = document.getElementById("selectCategory");
    var selectGenre = document.getElementById("selectGenre");
    var selectLanguage = document.getElementById("selectLanguage");
    var priceFrom = document.getElementById("priceFrom");
    var priceTo = document.getElementById("priceTo");
    var pageFrom = document.getElementById("pageFrom");
    var pageTo = document.getElementById("pageTo");

    var form = new FormData();
    form.append("page", x);
    form.append("st", searchTitle.value);
    form.append("sa", searchAuthor.value);
    form.append("sc", selectCategory.value);
    form.append("sg", selectGenre.value);
    form.append("sl", selectLanguage.value);
    form.append("pf", priceFrom.value);
    form.append("pt", priceTo.value);
    form.append("pgf", pageFrom.value);
    form.append("pgt", pageTo.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            // alert(text);
            document.getElementById("advanceShow").innerHTML = text;
        }
    };
    r.open("POST", "advancedSearchProcess.php", true);
    r.send(form);

}

function basicSearch(x) {
    var basicSearch = document.getElementById("basic_search");
    var basicSelect = document.getElementById("basic_select");

    var form = new FormData();
    form.append("page", x);
    form.append("sr", basicSearch.value);
    form.append("sl", basicSelect.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("homeContent").innerHTML = text;
            // alert(text);
        }
    };
    r.open("POST", "basicSearchProcess.php", true);
    r.send(form);
}

function clearSearch() {

    window.location = "home.php";

    // document.getElementById("searchTitle").innerHTML = "";

    // document.getElementById("advancedDiv").classList.toggle("d-none");
    // document.getElementById("homeContent").classList.toggle("d-none");
    // document.getElementById("advanceShow").classList.toggle("d-none");

    // document.getElementById("advanceShow").classList.toggle("d-none");
}


function adminSignin() {
    window.location = "adminSignin.php";
}

function customerLogin() {
    window.location = "index.php";
}


function studentBlock(email) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location.reload();
        }
    };
    r.open("GET", "studentBlockProcess.php?email=" + email, true);
    r.send();
}

function teacherBlock(email) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location.reload();
        }
    };
    r.open("GET", "teacherBlockProcess.php?email=" + email, true);
    r.send();
}

function academicOfficerBlock(email) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location.reload();
        }
    };
    r.open("GET", "academicOfficerBlockProcess.php?email=" + email, true);
    r.send();
}


function buynow(id) {

    var book_id = id;
    var book_qty = document.getElementById("qtyinput");

    var f = new FormData();
    f.append("bid", book_id);
    f.append("bqty", book_qty.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            window.location = "invoice.php?order_id=" + t;
            alert(t);
        }
    }
    r.open("POST", "buyNowProcess.php", true);
    r.send(f);

}

function printInvoice() {

    var restorePage = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorePage;
}

function check_qty(qty) {
    var book_qty = qty;
    var input = document.getElementById("qtyinput");
    if (input.value >= book_qty) {
        alert("Maximum quantity has achieved.");
        document.getElementById("qtyinput").innerHTML = book_qty;
        stop();
    }
    // alert("ok");
}

function seeAllBooks(id) {
    var cid = id;
    window.location = "seeAllBooks.php?cid=" + cid;
}

function feedbackSend(id) {
    var book_id = id;
    window.location = "singleProductView.php?id=" + book_id;
}

var saveFeedbackModal;
var feedbackErrorModal;

function saveFeed(id) {

    var type;

    if (document.getElementById("r1").checked) {
        type = 1;
    } else if (document.getElementById("r2").checked) {
        type = 2;
    } else if (document.getElementById("r3").checked) {
        type = 3;
    }

    var feedback = document.getElementById("f").value;
    var bookid = id;

    var f = new FormData();
    f.append("t", type);
    f.append("f", feedback);
    f.append("i", bookid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                var m = document.getElementById("saveFeedbackModal");
                saveFeedbackModal = new bootstrap.Modal(m);
                saveFeedbackModal.show();

                window.location = "singleProductView.php?id=" + bookid;

            } else {
                var m = document.getElementById("feedbackErrorModal");
                feedbackErrorModal = new bootstrap.Modal(m);
                feedbackErrorModal.show();

                document.getElementById("feedbackErrorMsg").innerHTML = t;
            }
        }
    }
    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);
}

function viewRecent() {

    var msgbox = document.getElementById("message_box");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // msgbox.innerHTML = t;
        }
    }
    setInterval(viewMessages(email), 500);

    r.open("GET", "viewRecentMsgProcess.php", true);
    r.send();
}

function viewAdminRecent() {

    var msgbox = document.getElementById("message_box");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // msgbox.innerHTML = t;
        }
    }
    setInterval(viewMessages(email), 500);

    r.open("GET", "viewAdminRecentMsgProcess.php", true);
    r.send();
}

function viewMessages(email) {
    alert("ok");
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("chat_box").innerHTML = t;
        }
    }
    r.open("GET", "viewMessagesProcess.php?email=" + email, true);
    r.send();
}

function viewAdminMessages(email) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("chat_box").innerHTML = t;
        }
    }
    r.open("GET", "viewAdminMessagesProcess.php?email=" + email, true);
    r.send();
}

function sendMsg() {
    var recever_mail = document.getElementById("rmail");
    var msg_txt = document.getElementById("msgTxt");

    var f = new FormData();
    f.append("r", recever_mail.innerHTML);
    f.append("m", msg_txt.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }
    r.open("POST", "sendMsgProcess.php", true);
    r.send(f);
}

function navigationStatus() {
    var btn = document.getElementById('dashboard');
    btn.style.backgroundColor = 'red';
}