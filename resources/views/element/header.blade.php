<header>
    <section>
        <!-- MAIN CONTAINER -->
        <div id="container">
            <!-- SHOP NAME -->
            <div id="shopName">
                <a href="{{ url('/') }}"> <b>SHOP</b>LANE </a>
            </div>
            <!-- COLLECTIONS ON WEBSITE -->
            <div id="collection">
                <div id="clothing">
                    <a href="{{ url('/clothing') }}"> CLOTHING </a>
                </div>
                <div id="accessories">
                    <a href="{{ url('/accessories') }}"> ACCESSORIES </a>
                </div>
            </div>
            <!-- SEARCH SECTION -->
            <div id="search">
                <i class="fas fa-search search"></i>
                <input type="text" id="input" name="searchBox" placeholder="Search for Clothing and Accessories">
            </div>
            <!-- USER SECTION (CART AND USER ICON) -->
            <div id="user">
                <a href="{{ url('/cart') }}">
                    <i class="fas fa-shopping-cart addedToCart">
                        <div id="badge"> 0 </div>
                    </i>
                </a>
                <a href="#">
                    <i class="fas fa-user-circle userIcon"></i>
                </a>
            </div>
        </div>
    </section>
</header>
