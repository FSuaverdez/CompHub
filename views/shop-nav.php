<!-- Shop Navigation Bar -->

<ul class="nav nav-tabs mb-4 mr-auto w-100">
    <!-- All -->
    <li class="nav-item">
        <a class="nav-item shop-nav-item nav-link active" id="shopAll-tab" data-toggle="tab" href="#shopAll" role="tab" aria-controls="nav-genre-action-tab" aria-selected="false">All</a>
    </li>
    <!-- Computers/Laptops -->
    <li class="nav-item">
        <a class="nav-item shop-nav-item nav-link" id="shopComputer-tab" data-toggle="tab" href="#shopComputer" role="tab" aria-controls="shopComputer-tab" aria-selected="false">Computers</a>
    </li>
    <!-- Monitors -->
    <li class="nav-item">
        <a class="nav-item shop-nav-item nav-link" id="shopMonitor-tab" data-toggle="tab" href="#shopMonitor" role="tab" aria-controls="shopMonitor-tab" aria-selected="false">Monitors</a>
    </li>
    <!-- Audio - Earphones/Headphones -->
    <li class="nav-item">
        <a class="nav-item shop-nav-item nav-link" id="shopAudio-tab" data-toggle="tab" href="#shopAudio" role="tab" aria-controls="shopAudio-tab" aria-selected="false">Audio</a>
    </li>
    <!-- Storage Devices -->
    <li class="nav-item">
        <a class="nav-item shop-nav-item nav-link" id="shopStorage-tab" data-toggle="tab" href="#shopStorage" role="tab" aria-controls="shopStorage-tab" aria-selected="false">Storage</a>
    </li>
    <!-- Accessories - Keyboards, Mouse... -->
    <li class="nav-item">
        <a class="nav-item shop-nav-item nav-link" id="shopPeripherals-tab" data-toggle="tab" href="#shopPeripherals" role="tab" aria-controls="shopPeripherals-tab" aria-selected="false">Peripherals</a>
    </li>
    <!-- Others - Installers, Graphic Tablets, Components -->
    <li class="nav-item">
        <a class="nav-item shop-nav-item nav-link" id="shopOthers-tab" data-toggle="tab" href="#shopOthers" role="tab" aria-controls="shopOthers-tab" aria-selected="false">Others</a>
    </li>
    
    <!-- Search form -->
    <div class="ml-auto">
        <div class="row ml-auto">
            <ul class="row navbar-nav ml-md-auto mr-sm-auto">
                <li class="nav-item"><a class="nav-link mx-1 px-3 py-2" href="cart.php" id="cart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> CART</a></li>
            </ul>
            <form class="row form-inline form-search-custom ml-auto" method="post">
                <input name="valueToSearch" id="search_text" class="col form-control search-custom" type="text" placeholder="Search Bar..." autocomplete="off" aria-label="Search">
                <button type="submit" class="btn col p-0" name="search_button" id="search_button">
                    <i class="fa fa-search text-black ml-3 d-lg-inline d-none" aria-hidden="true"></i>
                </button>
                <div class="search-result" id="result"></div>
            </form>
        </div>
    </div>
    
</ul>
