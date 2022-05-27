<header class="header">
        <nav class="header-nav hidden-items">
            <div class="icon-menu"> <i class="fas fa-bars"></i></div>
            <ul class="nav mb-2  mb-md-0">
                <li><a href="jeux" class="nav-link px-2 ">Gaming</a></li>
                <li><a href="/mini-cours" class="nav-link px-2 ">Essaies</a></li>
                <li><a href="/forums" class="nav-link px-2 ">Forums</a></li>
                <li><a href="projects" class="nav-link px-2 ">Projets</a></li>
                <li><a href="nous-contacter" class="nav-link px-2 ">Contact</a></li>
            </ul>
        </nav>
        <div class="nav-secondary">
            <form class="header-search">
                <input type="search" class="form-control " placeholder="Recherche..." aria-label="Search">
            </form>
            <ul class="nav-profils">
                <li class="<?= isset($_SESSION["user"])&&count($_SESSION["user"]) ? "hidden" : null ?> "><a href="/" class="nav-link px-2  profils-items">se connecter</a></li>
                <li class="<?= isset($_SESSION["user"])&&count($_SESSION["user"]) ? null : "hidden" ?> ">
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle profils-items " id="dropdownUser1" data-bs-toggle="dropdown">
                            <img src="<?=isset($_SESSION["user"])&&$_SESSION["user"]["image"]?"/".$_SESSION["user"]["image"]:"/img/logo.jpg"?>" alt="<?= $_SESSION["user"]["username"] ?? "null" ?>" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="/membres/<?= $_SESSION["user"]["username"]?? null?>/projets">Projets</a></li>
                            <li><a class="dropdown-item" href="/membres/<?= $_SESSION["user"]["username"]?? null?>/parametres">Paramètres</a></li>
                            <li><a class="dropdown-item" href="/membres/@<?= $_SESSION["user"]["username"]?? null?>">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/deconnection">Déconnexion</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>