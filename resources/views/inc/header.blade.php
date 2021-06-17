<header>
    <div class="sp_menu_button d-flex justify-content-end d-md-none">
        <button type="button" class="btn btn-link">
            <i class="fas fa-bars text-white d-flex align-items-center justify-content-center" style="font-size:20px;"></i>
        </button>
    </div>

    <div class="menu_items d-none d-md-flex justify-content-center justify-content-md-end">
        <div class="item">
            <a class="text-right" href="{{ url('/#about_me') }}">About me</a>
        </div>
        <div class="item">
            <a class="text-right" href="{{ url('/#blog') }}">Blog</a>
        </div>
        <div class="item">
            <a class="text-right" href="{{ url('/#works') }}">Works</a>
        </div>
        <div class="item">
            <a class="text-right" href="{{ url('/#contact') }}">Contact</a>
        </div>
    </div>
</header>

<script>
    // スマホメニューボタン操作
    $(function(){
        let spMenuButton = $('header .sp_menu_button');
        let menuItems = $('header .menu_items');

        spMenuButton.on('click', function(){
            menuItems.toggleClass('d-none');
        });
    });
</script>