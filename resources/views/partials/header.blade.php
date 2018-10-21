<div class="site__header justify-content-center d-flex">
    <div class="col-md-auto w-md-600">
        <div class="site__identity-bar d-flex justify-content-between">
            <a class="site__logo" href="/">
                {{ config('app.name') }}
            </a>
            <div class="site__user">
                <a href="/profile"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="site__nav d-flex">
            <a class="nav__item @if(Request::is('/')) nav__item-active @endif" href="/">
                <i class="fas fa-home"></i>
            </a>
            <a class="nav__item @if(Request::is('mealplans', 'mealplans/*')) nav__item-active @endif" href="/mealplans">
                <i class="fas fa-book d-none d-md-inline-block mr-md-1"></i> Meal Plans
            </a>
            <a class="nav__item @if(Request::is('recipes', 'recipes/*')) nav__item-active @endif" href="/recipes">
                <i class="fas fa-utensils d-none d-md-inline-block mr-md-1"></i> Recipes
            </a>
            <a class="nav__item @if(Request::is('ingredients', 'ingredients/*')) nav__item-active @endif" href="/ingredients">
                <i class="fas fa-bars d-none d-md-inline-block mr-md-1"></i> Ingredients
            </a>
            <a class="nav__item @if(Request::is('settings', 'settings/*')) nav__item-active @endif" href="/">
                <i class="fas fa-cog mr-md-1"></i> <span class="d-none d-md-inline">Settings</span>
            </a>
        </nav>
    </div>
</div>
