<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <nav>
        <div class="b-menu-main">
            <?
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <div class='b-menu-main__link'>
                    <? if($arItem["SELECTED"]): ?>
                        <span class="selected"><?=$arItem["TEXT"]; ?></span>
                    <? else:?>
                        <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]; ?></a>
                    <? endif; ?>
                </div>
            <? endforeach; ?>

        </div>
    </nav>
<? endif; ?>
<ul>
  <li class="b-menu-main__link">
    <a href="/about/">О портале</a>
  </li>
  <li class="b-menu-main__link">
    <a href="/contacts/">Контакты</a>
  </li>
</ul>
