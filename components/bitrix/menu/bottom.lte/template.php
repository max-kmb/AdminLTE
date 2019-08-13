<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
  <ul class="navbar-nav">
  <? foreach($arResult as $arItem): ?>
    <li class="nav-item">
      <a class="nav-link" href="<?=$arItem["LINK"];?>"><?=$arItem["TEXT"];?></a>
    </li>
  <? endforeach; ?>
  </ul>
<? endif; ?>
