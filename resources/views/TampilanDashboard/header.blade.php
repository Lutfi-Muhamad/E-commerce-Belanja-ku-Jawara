<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<style>
    body {
        margin: 0;
    }

    #badge {
        position: absolute;
        background-color: rgb(255, 30, 0);
        color: white;
        border-radius: 50%;
        padding: 5px 8px;
        font-size: 14px;
        top: 10px;
        right: 158px;
    }

    #container {
        background-color: #410bdb;
        margin: auto;
        text-align: center;
        width: 100%;
        display: grid;
        grid-gap: 10px;
        grid-template-columns: 1.5fr 1.5fr 5fr 1fr;
        font-family: 'Lato', sans-serif;
        z-index: 1;
        justify-content: space-between;
        align-items: center;
        padding: 15px 40px;
        box-sizing: border-box;
        position: fixed;
        box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.302), 0 2px 6px 2px rgba(60, 64, 67, 0.149);
    }

    #shopName {
        font-size: 40px;
        font-family: 'Lato', sans-serif;
    }

    #shopName a {
        text-decoration: none;
        color: rgb(255, 255, 255);
    }

    #shopName>b {
        font-weight: 900;
        font: rgb(255, 255, 255);
    }

    #collection {
        font-weight: bold;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    #collection a {
        text-decoration: none;
        color: rgb(255, 255, 255);
    }

    .search {
        padding: 14px;
        /* color: gray; */
        color: rgb(29, 29, 29);
        min-width: 25px;
        text-align: center;
        position: absolute;
    }

    .addedToCart {
        font-size: 1.5em;
        margin-right: 25px;
    }

    #user {
        display: flex;
        /* float: right; */
        align-items: center;
    }

    .userIcon {
        font-size: 45px;
    }

    #input {
        width: 35em;
        height: 3em;
        padding: 2px 50px;
        background-color: rgb(241, 241, 241);
        border: none;
        border-radius: 5px;
    }

    #input::placeholder {
        font-weight: bold;
    }

    #input:focus {
        outline: none;
    }

    #user a {
        color: rgb(255, 255, 255)
    }

    /* ----------------------------- MEDIA QUERY --------------------------- */

    @media(max-width: 1300px) {
        #collection {
            font-size: 13px;
        }

        #input {
            width: 25em;
        }
    }

    @media(max-width: 1212px) {
        #collection {
            font-size: 13px;
        }

        #input {
            width: 20em;
        }

        .addedToCart {
            font-size: 1.5em;
            margin: 10px 20px;
        }
    }

    @media(max-width: 1090px) {
        #container {
            display: grid;
            grid-template-columns: 1fr 2fr 0.5fr;
        }

        #search {
            display: none;
        }
    }

    @media(max-width: 750px) {
        #shopName {
            font-size: 28px;
        }

        #collection {
            font-size: 12px;
        }

        .userIcon {
            font-size: 35px;
        }

        .addedToCart {
            font-size: 1.2em;
            margin: 10px 20px;
        }
    }

    @media(max-width: 650px) {
        #shopName {
            font-size: 24px;
        }

        #collection {
            font-size: 10px;
        }

        .userIcon {
            font-size: 30px;
        }
    }

    @media(max-width: 550px) {
        #container {
            padding: 20px 25px;
        }
    }

    /* badge media */

    @media(max-width: 1480px) {
        #badge {
            right: 150px;
        }
    }

    @media(max-width: 1426px) {
        #badge {
            right: 142px;
        }
    }

    @media(max-width: 1360px) {
        #badge {
            right: 136px;
        }
    }

    @media(max-width: 1320px) {
        #badge {
            right: 129px;
        }
    }

    @media(max-width: 1259px) {
        #badge {
            right: 119px;
        }
    }

    @media(max-width: 1212px) {
        #badge {
            right: 96px;
        }
    }

    @media(max-width: 1155px) {
        #badge {
            right: 87px;
        }
    }

    @media(max-width: 1090px) {
        #badge {
            right: 119px;
        }
    }

    @media(max-width: 1030px) {
        #badge {
            right: 109px;
        }
    }

    @media(max-width: 970px) {
        #badge {
            right: 100px;
        }
    }

    @media(max-width: 910px) {
        #badge {
            right: 94px;
        }
    }

    @media(max-width: 850px) {
        #badge {
            right: 87px;
        }
    }

    @media(max-width: 750px) {
        #badge {
            right: 87px;
            padding: 3px 6px;
            font-size: 12px;
            top: 12px;
        }
    }

    @media(max-width: 650px) {
        #badge {
            right: 78px;
        }
    }

    @media(max-width: 550px) {
        #badge {
            right: 62px;
            top: 18px;
        }
    }

    #collection {
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: center;
    }

    #collection a {
        font-size: 30px;
        /* Ukuran ikon */
        color: #ffffff;
        /* Warna ikon */
        text-decoration: none;
        transition: color 0.3s ease-in-out;
        padding: 20px
    }

    #collection a:hover {
        color: #5995fd;
        /* Warna saat hover */
    }

    #collection i {
        cursor: pointer;
        /* Menambahkan ikon pointer */
    }
</style>

<header>
    <section>
        <!-- MAIN CONTAINER -->
        <div id="container">
            <!-- SHOP NAME -->
            <div id="shopName">
                <a href="{{ url('/produk') }}">
                    <img src="images/belanjaku_logo.png" alt="" style="width: 40%; margin-left: -200px;">

                </a>
            </div>
            <!-- COLLECTIONS ON WEBSITE -->
            <div id="collection">
                <div id="clothing">
                    <a href="{{ url('/produk') }}">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </div>
                <div id="accessories">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart"></i> <!-- Ikon Keranjang -->
                    </a>
                </div>
            </div>

            <!-- SEARCH SECTION -->
            <div id="search">
                <i class="fas fa-search search"></i>
                <input type="text" id="input" name="searchBox" placeholder="Search for Clothing and Accessories">
            </div>
            <!-- USER SECTION (CART AND USER ICON) -->
            <div id="collection">
                <div id="clothing">
                    <a href="{{ url('/clothing') }}"> </a>
                </div>
                <div id="accessories">

                    <a href="{{ route('logout') }}">
                        <i class="fa-solid fa-right-from-bracket"></i> <!-- Log Out Icon -->
                    </a>

                </div>
            </div>

        </div>
    </section>
</header>
