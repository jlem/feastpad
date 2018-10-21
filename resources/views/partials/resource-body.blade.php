@if ($collection->count() === 0)
    <div class="resource-page__list resource-page__list-empty">
        <h3>It looks like you haven't added any {{ strtolower($resourceName) }} yet.</h3>
    </div>
    <a class="button button--primary d-block" href="{{ route($resourceRoute.'.create') }}">
        <i class="fas fa-plus"></i> Add New {{ str_singular($resourceName) }}
    </a>
@endif
@if ($collection->count() > 0)
    <a class="button button--primary d-block" href="{{ route($resourceRoute.'.create') }}">
        <i class="fas fa-plus"></i> Add New {{ str_singular($resourceName) }}
    </a>
    <div class="resource-page__list list-group">
        {{ $slot }}
    </div>
@endif
