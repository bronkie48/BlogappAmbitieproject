<html>
    <head>
        <title>Bloggereader</title>
        <link rel="stylesheet" href="/Blogapp/BlogappAmbitieproject/CSS/style.css">
        <script src="/Blogapp/BlogappAmbitieproject/JS/main.js"></script>
    </head>
    <body>
    
        <header>
            <div class="header-left-block">
                <div id="app-name">
                    <h1>Bloggereader</h1>
                </div>
            </div>
            <div class="header-right-block"></div>
        </header>

        <section class="form-section">
            <div class="form-grid">
                <div class="register-form-grid">
                    <h1>Aanmeldformulier</h1>
                    <form method="POST" action="/Blogapp/BlogappAmbitieproject/PHP/register.php" name="register-form" onsubmit="return registerValidation()">
                        <div class="form-line">
                            <label for="name"><b>Voor- achternaam*</b></label>
                            <input type="text" name="name" minlength="4" title="minimaal 4 karakters" id="name" placeholder="" required>
                        </div>   
                        <div class="form-line">
                            <label for="username"><b>Gebruikersnaam*</b></label>
                            <input type="text" name="username" minlength="6" maxlength="16" title="6 tot 16 karakters" placeholder="" required>
                        </div>   
                        <div class="form-line">
                            <label for="email"><b>Email*</b></label>
                            <input type="text" name="email" id="email" placeholder=""required>
                        </div>   
                        <div class="form-line">
                            <label for="postal"><b>Postcode & Adres*</b></label>
                            <input type="text" name="postal" id="postal" placeholder="" required>
                            <input type="text" name="address" id="address" placeholder="" required>
                        </div>   
                        <div class="form-line">
                            <label for="city"><b>Woonplaats*</b></label>
                            <input type="text" name="city" id="city" placeholder="" required>
                        </div>   
                        <div class="form-line">
                            <label for="pwd"><b>Wachtwoord*</b></label>
                            <input type="password" minlength="8" maxlength="16" title="minimaal 8 karakters" name="pwd" placeholder="" required>
                        </div>   
                        <div class="form-line">
                            <label for="pwd-repeat"><b>Herhaal wachtwoord*</b></label>
                            <input type="password" minlength="8" maxlength="16" title="minimaal 8 karakters" name="pwd-repeat" id="pwd-repeat" placeholder="" required>
                        </div>
                        <div class="button-right">
                            <input type="submit" runat="server" onclick="return registerValidation()" name="register_user" value="Aanmelden"  class="green-btn">        
                        </div>
                        <div id="errorRegister"></div>
                    </form>
                </div>
                <div class="login-form">
                    <div class="login-form-grid">
                        <h1>Inloggen</h1>
                        <form method="POST" action="/Blogapp/BlogappAmbitieproject/PHP/login.php" name="login-form" id="login-form">
                            <div class="form-line">
                                <label for="username"><b>Gebruikersnaam</b></label>
                                <input type="text" name="username" id="username" placeholder="" >
                            </div>
                            <div class="form-line">
                                <label for="pwd"><b>Wachtwoord</b></label>
                                <input type="password" name="pwd" id="pwd" placeholder="" >
                            </div> 
                            <div class="button-right">
                                <input type="submit" onclick="return loginValidation()" name="login_user" value="Inloggen" name="login_user" class="green-btn">     
                            </div>
                            <div id="errorLogin"></div>
                        </form>    
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="middle-footer">
                <p class="footer-text">
                    Made by Brian Bronkhorst 
                </p>
                <img src="/Blogapp/BlogappAmbitieproject/IMG/aventus-logo.png" alt="aventus logo" height="100" width="100">
            </div>
        </footer>
    </body>
</html>

