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