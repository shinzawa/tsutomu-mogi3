<header class="header">
    <div class="header__logo">
        <a href="/">
            <div class="header__inner">
                <div class=icon-rese>
                    <div class=icon-rese__topline>
                    </div>
                    <div class=icon_rese__midline>
                    </div>
                    <div class=icon_rese__bottomline>
                    </div>
                </div>
                <a class="header__logo-name" href="/">
                    Rese
                </a>
            </div>
        </a>
    </div>
    @if( !in_array(Route::currentRouteName(), ['register', 'login', 'verification.notice', 'shop.detail']) )
    <div class="header-search__wrapper">
        <form class="header-search" action="/" method="get">
            @csrf
            <div class="select-wrapper">
                <select name="area" class="header-search__select">
                    <option value="">All area</option>
                    <option value="北海道">北海道</option>
                    <option value="東北">東北</option>
                    <option value="関東">関東</option>
                    <option value="中部">中部</option>
                    <option value="近畿">近畿</option>
                    <option value="中国">中国</option>
                    <option value="四国">四国</option>
                    <option value="九州・沖縄">九州・沖縄</option>
                </select>

            </div>
            <div class="line-wrapper">
                <div class="line">
                </div>
            </div>
            <div class="select-wrapper">
                <select name="genre" class="header-search__select">
                    <option value="">All genre</option>
                    <option value="寿司">寿司</option>
                    <option value="居酒屋">居酒屋</option>
                    <option value="焼肉">焼肉</option>
                    <option value="ラーメン">ラーメン</option>
                    <option value="イタリアン">イタリアン</option>
                    <option value="中華">中華</option>
                </select>

            </div>
            <div class="line-wrapper">
                <div class="line">
                </div>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i> <!-- Font Awesomeの検索アイコン -->
                <input id="inputElement" class="header-search--input" type="text" name="search" placeholder="Search...">
            </div>
            <button id="buttonElement" class="header-search--button">
                <img src="{{ asset('img/search_icon.jpeg') }}" alt="検索アイコン" style="height:100%;">
            </button>
        </form>
    </div>
    @endif


</header>
