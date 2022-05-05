<script src="../public/js/search.js"></script>
<header class="site-header">
    <div class="site-header__top">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <ul class="">
                    <li class=""><a href="#">About</a></li>
                    <li class=""><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="site-header__middle">
                <a href="/" class="brand">LMM</a>
            </div>
            <div class="site-header__end top">
                <?php if (isset($_SESSION['user'])) {
                    ?>
                    <a href="/dashboard/authentification?action=logout" class="button">Logout</a>
                <?php } else { ?>
                    <a href="/dashboard/authentification" class="button">Login / Register</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="site-header__bottom">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <nav class="nav">
                    <a class="nav__toggle" aria-expanded="false" type="button">
                        <i class="fa-solid fa-bars"></i> Menu   
                    </a>
                    <ul class="nav__wrapper">
                        <li class="nav__item"><a href="http://manga/" style="color: white;">Home</a></li>
                        <li class="nav__item"><a href="presentation" style="color: white;">A propos</a></li>
                        <li class="nav__item"><a href="#" style="color: white;">Services</a></li>
                        <li class="nav__item"><a href="#" style="color: white;">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="site-header__end bottom">
                <div class="search">
                    <div class="search__toggle active" aria-label="Open search">
                        Search
                    </div>
                    <form class="search__form" action="">
                        <label class="sr-only" for="search">Search</label>
                        <input
                                class="search_bar"
                                type="search"
                                name=""
                                id="search"
                                placeholder="Rechercher un manga"
                                autocomplete="off"
                        />
                        <ul class="matches"></ul>
                    </form>
                </div>
                <a href="#" id="cart">
                    <svg
                            version="1.1"
                            viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <g>
                            <title>Cart</title>
                            <path
                                    d="m95.398 23.699c-1.8008-2.3008-4.6016-3.6992-7.5-3.6992h-60.898l-1.8984-7.3984c-1.1016-4.3008-4.8984-7.3008-9.3008-7.3008h-10.199c-1.6992 0-3.1016 1.3984-3.1016 3.1016 0 1.6992 1.3984 3.1016 3.1016 3.1016h10.199c1.5 0 2.8008 1 3.1992 2.5l12.199 48.602c1.1016 4.3008 4.8984 7.3008 9.3008 7.3008h39.898c4.3984 0 8.3008-3 9.3008-7.3008l7.5-30.801c0.69922-2.8047 0.10156-5.8047-1.8008-8.1055zm-4.2969 6.6992-7.5 30.801c-0.39844 1.5-1.6992 2.5-3.1992 2.5h-39.902c-1.5 0-2.8008-1-3.1992-2.5l-8.6992-34.898h59.301c1 0 2 0.5 2.6016 1.3008 0.59766 0.79688 0.89453 1.7969 0.59766 2.7969z"
                            />
                            <path
                                    d="m42.602 73.898c-5.6992 0-10.398 4.6992-10.398 10.398s4.6992 10.398 10.398 10.398c5.6992 0.003907 10.398-4.6953 10.398-10.395s-4.6992-10.402-10.398-10.402zm0 14.5c-2.3008 0-4.1016-1.8008-4.1016-4.1016s1.8008-4.1016 4.1016-4.1016c2.3008 0 4.1016 1.8008 4.1016 4.1016-0.003906 2.2031-1.9023 4.1016-4.1016 4.1016z"
                            />
                            <path
                                    d="m77 73.898c-5.6992 0-10.398 4.6992-10.398 10.398s4.6992 10.398 10.398 10.398 10.398-4.6992 10.398-10.398c-0.097657-5.6953-4.6992-10.398-10.398-10.398zm0 14.5c-2.3008 0-4.1016-1.8008-4.1016-4.1016s1.8008-4.1016 4.1016-4.1016 4.1016 1.8008 4.1016 4.1016c0 2.2031-1.9023 4.1016-4.1016 4.1016z"
                            />
                        </g>
                    </svg>
                </a>
                <a href="/dashboard/profile">
                    <svg
                            version="1.1"
                            viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <title>Profile</title>
                        <path
                                d="m65.57 52.5c6.9336-4.5078 11.574-11.797 12.723-19.988 1.1484-8.1875-1.3047-16.473-6.7344-22.715-5.4258-6.2422-13.289-9.8242-21.559-9.8242s-16.133 3.582-21.559 9.8242c-5.4297 6.2422-7.8828 14.527-6.7344 22.715 1.1484 8.1914 5.7891 15.48 12.723 19.988-10.012 3.2812-18.73 9.6406-24.914 18.172-6.1836 8.5273-9.5117 18.793-9.5156 29.328h7.1445c0-15.312 8.168-29.461 21.426-37.117 13.262-7.6523 29.598-7.6523 42.859 0 13.258 7.6562 21.426 21.805 21.426 37.117h7.1445c-0.003906-10.535-3.332-20.801-9.5156-29.328-6.1836-8.5312-14.902-14.891-24.914-18.172zm-37-23.93c0-5.6836 2.2578-11.133 6.2773-15.152 4.0195-4.0156 9.4688-6.2734 15.152-6.2734s11.133 2.2578 15.152 6.2734c4.0195 4.0195 6.2773 9.4688 6.2773 15.152 0 5.6836-2.2578 11.137-6.2773 15.152-4.0195 4.0195-9.4688 6.2773-15.152 6.2773s-11.133-2.2578-15.152-6.2773c-4.0195-4.0156-6.2773-9.4688-6.2773-15.152z"
                        />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!--<img class="bois" src="/media/bois.png">-->
</header>
<script type="text/javascript" src="/public/js/header.js"></script>
<div class="container">
  <div class="shopping-cart" style="display: none;">
    <div class="shopping-cart-header">
    <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
      <span class="shopping-cart-total" style="float: right;">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">10 € ta race</span>
        </span>
    </div> <!--end shopping-cart-header -->

    <ul class="shopping-cart-items">
        <?php
        $mangamania = $auth->getAllManga();
        if (count($mangamania) > 0) {

        foreach ($mangamania as $manga) {
        ?>
            <hr style="height: 2px; background: grey;" />
      <li class="clearfix">
          <img src="<?= $manga->getImage(); ?>" alt="<?= $manga->getTitre(); ?>" width="50" height="75" />
          <span class="item-name"><?= $manga->getTitre(); ?></span>
          <span class="item-price" style="font-weight: bold;"><?= $manga->getPrix(); ?>€</span>
          <div class="item-quantity">Quantity: 01</div>
      </li>
        <?php } } ?>
    </ul>
    <br />
    <br />
    <a href="/panier" class="button">Checkout</a>
  </div> <!--end shopping-cart -->
</div> <!--end container -->
<!--

-->