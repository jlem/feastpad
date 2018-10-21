<div class="d-flex justify-content-center">
    <div class="col-md-auto w-md-600">
        @if( $latestMealPlan)
            @include('page-partials.mealplan-details', ['title' => 'Current Meal Plan', 'mealplan' => $latestMealPlan])
        @else
            <div class="text-center">
                <h2>It looks like you don't have any meal plans yet. <a href="{{ route('mealplans.create') }}">Create one now</a></h2>
            </div>
        @endif
    </div>
</div>
