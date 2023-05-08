@extends('tea-theme::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/filter'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/stage'] ?? '' ?>
    <?= $aiheader['catalog/session'] ?? '' ?>
    <?= $aiheader['catalog/lists'] ?? '' ?>
@stop

@section('aimeos_head_basket')
    <?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_head_nav')
    @if(!strpos($_SERVER['REQUEST_URI'], 'f_search'))
            <?= $aibody['catalog/tree'] ?? '' ?>
    @endif

@stop

@section('aimeos_head_locale')
    <?= $aibody['locale/select'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_body')
    <?= $aibody['catalog/stage'] ?? '' ?>
    @if(!strpos($_SERVER['REQUEST_URI'], 'f_search'))
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-3">
                <?= $aibody['catalog/filter'] ?? '' ?>
                <?= $aibody['catalog/session'] ?? '' ?>
            </aside>
            <div class="col-lg-9">
                <?= $aibody['catalog/lists'] ?>
            </div>
        </div>
    </div>
    @else
            <?= $aibody['catalog/lists'] ?>
    @endif
@stop
