<!--header section start-->
<header id="header" class="header-main">
    <!--main header menu start-->
    <div id="logoAndNav" class="main-header-menu-wrap bg-transparent fixed-top">
        <div class="container">
            <nav class="js-mega-menu navbar navbar-expand-md header-nav">
                <!--logo start-->
                <a class="navbar-brand pt-0" href="index.html"><img
                        src="{{ asset('storage/images/' . getSetting('logo')) }}" width="19%" alt="logo"
                        class="img-fluid" /></a>
                <!--logo end-->
                <!--responsive toggle button start-->
                <button type="button" class="navbar-toggler btn" aria-expanded="false" aria-controls="navBar"
                    data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger">
                        <span class="ti-menu"></span>
                    </span>
                </button>
                <!--responsive toggle button end-->
                <!--main menu start-->
                <div id="navBar" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto main-navbar-nav">
                        @foreach (getMenu(1, 0) as $menuHeader)
                            @if ($menuHeader->is_parent == true)
                                <li class="nav-item hs-has-sub-menu custom-nav-item">
                                    <a id="pagesMegaMenu-{{ $menuHeader->hashid }}"
                                        class="nav-link custom-nav-link main-link-toggle"
                                        href="javascript:void(0);"
                                        aria-haspopup="true" aria-expanded="false"
                                        aria-labelledby="pagesSubMenu-{{ $menuHeader->hashid }}">
                                        {{ $menuHeader->name }}</a>
                                    <!-- Pages - Submenu -->
                                    <ul id="pagesSubMenu-{{ $menuHeader->hashid }}"
                                        class="hs-sub-menu main-sub-menu"
                                        aria-labelledby="pagesMegaMenu-{{ $menuHeader->hashid }}"
                                        style="min-width: 230px;">
                                        @foreach (getMenu(2, $menuHeader->id) as $menuHeader2)
                                            @if ($menuHeader2->is_parent == true)
                                                <li class="hs-has-sub-menu">
                                                    <a id="navLinkPagesPricing-{{ $menuHeader2->hashid }}"
                                                        class="nav-link sub-menu-nav-link sub-link-toggle"
                                                        href="javascript:void(0);" aria-haspopup="true"
                                                        aria-expanded="false"
                                                        aria-controls="navSubmenuPagesPricing-{{ $menuHeader2->
                                                        hashid }}">{{ $menuHeader2->name }}</a>
                                                    <ul id="navSubmenuPagesPricing-{{ $menuHeader2->hashid }}"
                                                        class="hs-sub-menu main-sub-menu"
                                                        aria-labelledby="navLinkPagesPricing-{{ $menuHeader2->
                                                        hashid }}"
                                                        style="min-width: 230px;">
                                                        @foreach (getMenu(3, $menuHeader2->id) as $menuHeader3)
                                                            <li>
                                                                <a class="nav-link sub-menu-nav-link"
                                                                    href="{{ $menuHeader3->link }}"
                                                                    {{ $menuHeader3->link_target != 'none' ?
                                                                    'target=_blank' : '' }}>{{ $menuHeader3->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="nav-item submenu-item">
                                                    <a class="nav-link sub-menu-nav-link"
                                                        href="{{ $menuHeader2->link }}"
                                                        {{ $menuHeader2->link_target != 'none' ?
                                                        'target=_blank' : '' }}>{{ $menuHeader2->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <!-- End Pages - Submenu -->
                                </li>
                            @else
                                <li class="nav-item custom-nav-item">
                                    <a class="nav-link custom-nav-link"
                                    href="{{ $menuHeader->link }}"
                                        {{ $menuHeader->link_target != 'none' ?
                                        'target=_blank' : '' }}>{{ $menuHeader->name }}</a>
                                </li>
                            @endif
                        @endforeach
                        <!--button start-->
                        <li class="nav-item header-nav-last-item d-flex align-items-center">
                            <a class="btn btn-brand-03 animated-btn"
                                href="https://whmcs.themetags.com/?systpl=kohost-professional" target="_blank">
                                <span class="fa fa-phone pr-2"></span> Kontak
                            </a>
                        </li>
                        <!--button end-->
                    </ul>
                </div>
                <!--main menu end-->
            </nav>
        </div>
    </div>
    <!--main header menu end-->
</header>
<!--header section end-->
