function registerValidation()
    {
    var name = document.forms["register-form"]["name"].value;
    var username = document.forms["register-form"]["username"].value;
    var email = document.forms["register-form"]["email"].value;
    var postal = document.forms["register-form"]["postal"].value;
    var address = document.forms["register-form"]["address"].value;
    var city = document.forms["register-form"]["city"].value;
    var pwd = document.forms["register-form"]["pwd"].value;
    var pwdRepeat = document.forms["register-form"]["pwd-repeat"].value;

    if(name=="" || username=="" || email=="" || postal=="" ||
       address=="" || city=="" || pwd=="" || pwdRepeat=="" ) 
    {
        document.getElementById("errorRegister").innerHTML= "*Niet alle velden zijn ingevuld";
        return false;
    }
    else
    {
        document.getElementById("errorRegister").innerHTML= "";
    }  
}

function loginValidation()
{
    var username = document.forms["login-form"]["username"].value;
    var pwd = document.forms["login-form"]["pwd"].value;

    if( username=="" ||  pwd=="") 
    {
        document.getElementById("errorLogin").innerHTML= "*Niet alle velden zijn ingevuld";
        return false;
    }
    else
    {
        document.getElementById("errorLogin").innerHTML= "";
    }  
}

function blogValidation()
{
    document.getElementById("errorBlog").innerHTML= "*Niet alle velden zijn ingevuld";
    var subject = document.forms["create-blog"]["subject"].value;
    var message = document.forms["create-blog"]["message"].value;

    if( subject=="" || message=="") 
    {
        document.getElementById("errorBlog").innerHTML= "*Niet alle verplichte velden zijn ingevuld";
        return false;
    }
    else
    {
        document.getElementById("errorBlog").innerHTML= "";
    }  
}

// Modal blog item
document.addEventListener('click', function (e) {
    e = e || window.event;
    var target = e.target || e.srcElement;

    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'modal') {
        if (target.hasAttribute('data-target')) {
            var m_ID = target.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('open');
            e.preventDefault();
        }
    }

    // Close modal window with 'data-dismiss' attribute or when the backdrop is clicked
    if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'modal') || target.classList.contains('modal')) {
        var modal = document.querySelector('[class="modal open"]');
        modal.classList.remove('open');
        e.preventDefault();
    }
}, false);