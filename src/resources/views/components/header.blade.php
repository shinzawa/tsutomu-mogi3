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
    @if( !in_array(Route::currentRouteName(), ['register', 'login', 'verification.notice']) )
    <form class="header_search" action="/" method="get">
        @csrf
        <select name="area" class="header_search--select">
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
        <select name="genre" class="header_search--select">
            <option value="">ジャンル</option>
            <option value="寿司">寿司</option>
            <option value="居酒屋">居酒屋</option>
            <option value="焼肉">焼肉</option>
            <option value="ラーメン">ラーメン</option>
            <option value="イタリアン">イタリアン</option>
            <option value="中華">中華</option>
        </select>

        <input id="inputElement" class="header_search--input" type="text" name="search" placeholder="なにをお探しですか？">
        <button id="buttonElement" class="header_search--button">
            <img src="{{ asset('img/search_icon.jpeg') }}" alt="検索アイコン" style="height:100%;">
        </button>
    </form>
    @endif


</header>
