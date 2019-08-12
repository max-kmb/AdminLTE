<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
  </li>
  <? if (!empty($arResult)): ?>
    <? foreach($arResult as $arItem): ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=$arItem["LINK"]?>" class="nav-link"><?=$arItem["TEXT"]?></a>
        <div class="b-menu__linkhover"></div>
      </li>
    <?endforeach;?>
  <?endif;?>
</ul>
