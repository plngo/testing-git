@extends('tea-theme::base')
{{--@section('aimeos_body')
    <?= $aibody['catalog/home'] ?? '' ?>
@endsection--}}
@section('aimeos_body')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row mb-lg-5 align-items-center">
            <div class="col-md-6 my-3">
                <p class="h5 my-3 fw-normal">
                    Fresh from Our coffee Plantations to Your Cup Al-Kbous coffee comes
                    from the finest natural coffee plantations around the world. Yemen
                    is among the first countries that have planted and exported coffee.
                    The world famous “Mokha Coffee” is named after the Yemeni port of
                    Mokha.
                </p>
                <p class="h5 my-3 fw-normal">
                    Fresh from Our coffee Plantations to Your Cup Al-Kbous coffee comes
                    from the finest natural coffee plantations around the world. Yemen
                    is among the first countries that have planted and exported coffee.
                    The world famous “Mokha Coffee” is named after the Yemeni port of
                    Mokha.
                </p>
            </div>
            <div class="col-md-6">
                <img
                    src="/assets/img//tea-recipe.png"
                    class="img-fluid mx-auto d-block my-3"
                    alt=""
                />
            </div>
        </div>
    </div>
    <h2 class="text-center text-darkblue my-5">Recipes</h2>

    <!--  -->

    <div class="container">
        <div class="newslider owl-carousel owl-theme position-relative">
            <div class="recipe-card mx-auto my-3">
                <img src="/assets/img/recipe1.png" class="img-fluid" alt="" />
            </div>
            <div class="recipe-card mx-auto my-3">
                <img src="/assets/img/recipe2.png" class="img-fluid" alt="" />
            </div>
            <div class="recipe-card mx-auto my-3">
                <img src="/assets/img/recipe3.png" class="img-fluid" alt="" />
            </div>
            <div class="recipe-card mx-auto my-3">
                <img src="/assets/img/recipe1.png" class="img-fluid" alt="" />
            </div>
            <div class="recipe-card mx-auto my-3">
                <img src="/assets/img/recipe2.png" class="img-fluid" alt="" />
            </div>
            <div class="recipe-card mx-auto my-3">
                <img src="/assets/img/recipe3.png" class="img-fluid" alt="" />
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
@stop
@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
@stop

@section('aimeos_head_basket')
    <?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_head_nav')
@stop

@section('aimeos_head_locale')
    <?= $aibody['locale/select'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop



