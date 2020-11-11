<html>
    <head>
        <title>Blogoverzicht</title>
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <header>
            <div class="header-left-block">
                <div class="menu-container">
                    <ul class="menu">
                        <li class="menu-item-red"><a href="dashboard.php">Dashboard</a></li>
                        <li class="menu-item-purple"><a href="blogoverview.php">Blogs</a></li>
                        <li class="menu-item-green"><a href="blogform.php">Blog maken</a></li>
                        <li class="menu-item-orange"><a href="persondata.php">Gegevens</a></li>
                    </ul>
                </div>
            </div>
            <div class="header-right-block">
                <div class="login-details">
                    <ul class="user-login">
                        <li><img src="../IMG/user.png" width="25" height="25" alt="user icon">User123</li>
                    </ul>
                    <div class="login-details-buttons">
                        <input type="button" class="detail-btn" value="Uitloggen">
                        <input type="button" class="detail-btn" value="Mijn gegevens">
                    </div>
                </div>
            </div>
        </header>

        <section class="metro-style-blog-overview">
            <div class="filter-blog-red">
                <h1>Filter</h1>
                <form action="" name="filterBlog">
                    <div class="filter-radio">
                        <input type = "radio" value="Populair" id="populair" name="filter">
                        <label for="Populair">Populair</label>
                    </div>
                    <div class="filter-radio">
                        <input type = "radio" value="oldest" id="oldest" name="filter">
                        <label for="oldest">Oud - Nieuw</label>
                    </div>
                    <div class="filter-radio">
                        <input type = "radio" value="newest" id="newest" name="filter">
                        <label for="newest">Nieuw - Oud</label>
                    </div>
                    <input type = "submit" value="Reset" id="reset">
                </form>
            </div>
            <div class="metro-style-blocks-grid">
                <div class="metro-block-purple">
                    <h1>Titel blog</h1>
                    <div class="blog-image">
                        <img src="../IMG/blog.jpg" alt="blog">
                        <p>Dit is een testbericht. Hier staat de omschrijving van de blog bericht</p>
                        <p>23-9-2020</p>
                        <input type="button" class="blog-btn" value="Lees meer">
                    </div>
                </div>
                <div class="metro-block-purple">
                    <h1>Titel blog</h1>
                    <div class="blog-image">
                        <img src="../IMG/blog.jpg" alt="blog">
                        <p>Dit is een testbericht. Hier staat de omschrijving van de blog bericht</p>
                        <p>23-9-2020</p>
                        <input type="button" class="blog-btn" value="Lees meer">
                    </div>
                </div>
                <div class="metro-block-purple">
                    <h1>Titel blog</h1>
                    <div class="blog-image">
                        <img src="../IMG/blog.jpg" alt="blog">
                        <p>Dit is een testbericht. Hier staat de omschrijving van de blog bericht</p>
                        <p>23-9-2020</p>
                        <input type="button" class="blog-btn" value="Lees meer">
                    </div>
                </div>
                <div class="metro-block-purple">
                    <h1>Titel blog</h1>
                    <div class="blog-image">
                        <img src="../IMG/blog.jpg" alt="blog">
                        <p>Dit is een testbericht. Hier staat de omschrijving van de blog bericht</p>
                        <p>23-9-2020</p>
                        <input type="button" class="blog-btn" value="Lees meer">
                    </div>
                </div>
            </div>
        </section>

        <footer>

        </footer>
        </body>
    </body>
</html>