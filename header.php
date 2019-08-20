<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Page\Asset;
$asset = Asset::getInstance();
CModule::IncludeModule('pull');
$arCurUser = STUser::GetByID();
$arLangMessage = \Bitrix\Main\Localization\Loc::loadLanguageFile(__FILE__, strtolower(SITE_LANG));
?>
<!DOCTYPE html>
<html lang="<?=SITE_LANG?>">
<head>
<?CJSCore::Init();?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Shipstores | <?=STTab::getMessage("MENU_PROFILE_MESS_13", null, $arLangMessage);?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- flag-icon-css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700&display=swap&subset=cyrillic" rel="stylesheet">
  <script src="<?=SITE_TEMPLATE_PATH?>/lang/<?=strtolower(SITE_LANG)?>/script.messages.js?2"></script>
  <?$APPLICATION->ShowHead();?>
</head>
<?$APPLICATION->ShowPanel();?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
    <!-- Left navbar links -->
    <?$APPLICATION->IncludeComponent(
      "bitrix:menu",
      "top_menu.lte",
      array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "top".strtolower(SITE_LANG),
        "COMPONENT_TEMPLATE" => "top",
        "DELAY" => "N",
        "MAX_LEVEL" => "1",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "top".strtolower(SITE_LANG),
        "USE_EXT" => "Y",
        "FLINK" => $_SERVER['REQUEST_URI']
      ),
      false
    );?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <?
        $CNTMessageNew = STMessage::getNotRead(CUser::GetID(),true);
        $CNTMessageAll = STMessage::getAll(CUser::GetID(),true);
        $CNTMessageViewed = $CNTMessageAll - $CNTMessageNew;
        ?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <? if($CNTMessageNew == 0) : ?>
          <span class="badge badge-danger navbar-badge"><? echo $CNTMessageAll;?></span>
          <? else : ?>
          <span class="badge badge-warning navbar-badge"><? echo $CNTMessageNew;?></span>
          <? endif; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><? echo $CNTMessageAll, STTab::getMessage("MENU_MESSAGE_1", null, $arLangMessage); ?></span>
          <div class="dropdown-divider"></div>
          <a href="/pro/messages/#new" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?echo $CNTMessageNew, STTab::getMessage("MENU_NOTE_2", null, $arLangMessage); ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/pro/messages/#viewed" class="dropdown-item">
            <i class="fas fa-envelope-open mr-2"></i> <? echo $CNTMessageViewed, STTab::getMessage("MENU_NOTE_3", null, $arLangMessage); ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/pro/messages/" class="dropdown-item dropdown-footer"><? echo STTab::getMessage("MENU_NOTE_4", null, $arLangMessage); ?></a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <?
      $CNTNotify = STNotify::getNotifyNotViewedCnt();
      $CNTNotifyViewed = STNotify::getNotifyViewedCnt();
      $CNTNotifyAll = STNotify::getNotifyCnt();
        ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <? if($CNTNotify['CNT'] == 0) : ?>
            <span class="badge badge-danger navbar-badge"><?=$CNTNotifyAll['CNT']?></span>
          <? else :?>
            <span class="badge badge-warning navbar-badge"><?=$CNTNotify['CNT']?></span>
          <? endif; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><? echo $CNTNotifyAll['CNT'], STTab::getMessage("MENU_NOTE_1", null, $arLangMessage); ?></span>
          <div class="dropdown-divider"></div>
          <a href="/pro/notify/#new" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?echo $CNTNotify['CNT'], STTab::getMessage("MENU_NOTE_2", null, $arLangMessage); ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/pro/notify/#viewed" class="dropdown-item">
            <i class="fas fa-envelope-open mr-2"></i> <? echo $CNTNotifyViewed['CNT'], STTab::getMessage("MENU_NOTE_3", null, $arLangMessage); ?>
           </a>
          <div class="dropdown-divider"></div>
          <a href="/pro/notify/" class="dropdown-item dropdown-footer"><? echo STTab::getMessage("MENU_NOTE_4", null, $arLangMessage); ?></a>
        </div>
      </li>
      <!-- Language Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <? if(SITE_LANG == 'EN'): ?>
            <i class="flag-icon flag-icon-us"></i>
          <? else: ?>
            <i class="flag-icon flag-icon-ru"></i>
          <? endif; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-0">
          <a href="<?=$APPLICATION->GetCurPage()?>?LANG=EN" class="dropdown-item <?if(SITE_LANG == 'EN'):?> active<?endif;?>">
            <i class="flag-icon flag-icon-us mr-2"></i> English
          </a>
          <a href="<?=$APPLICATION->GetCurPage()?>?LANG=RU" class="dropdown-item <?if(SITE_LANG == 'RU'):?> active<?endif;?>">
            <i class="flag-icon flag-icon-ru mr-2"></i> Русский
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-danger">
    <!-- Brand Logo -->
    <a href="<?=SITE_DIR?>" class="brand-link">
      <img src="<?=SITE_TEMPLATE_PATH?>/dist/img/logo-128.png" alt="shipstores.net" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bolder">shipstores.net</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <? if($arCurUser['PERSONAL_PHOTO_60']): ?>
        <div class="image">
          <img src="<?=$arCurUser['PERSONAL_PHOTO_60']['src']?>" class="img-circle elevation-2" alt="<?=$arCurUser['SHORT_NAME']?> Image">
        </div>
        <? endif; ?>
        <div class="info">
          <a href="#" class="d-block"><?=$arCurUser['SHORT_NAME']?></a>
        </div>
      </div>
      <?
      $url=$_SERVER['REQUEST_URI'];
      $urls=explode("/",$url);
      $curURL="/".$urls[1]."/".$urls[2]."/";
      if ($urls[1]=="pro"){
      }
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_8", null, $arLangMessage), "path" => "/profile/", "icons" => "<i class=\"nav-icon fas fa-info\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_1", null, $arLangMessage), "path" => "/profile/deals/", "icons" => "<i class=\"nav-icon fas fa-th\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_11", null, $arLangMessage), "path" => "/profile/store/", "icons" => "<i class=\"nav-icon fas fa-store-alt\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_14", null, $arLangMessage), "path" => "/profile/board/", "icons" => "<i class=\"nav-icon fas fa-file-invoice\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_15", null, $arLangMessage), "path" => "/profile/advertising/", "icons" => "<i class=\"nav-icon fas fa-ad\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_16", null, $arLangMessage), "path" => "/profile/services/email/", "icons" => "<i class=\"nav-icon fas fa-envelope\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_17", null, $arLangMessage), "path" => "/profile/news/", "icons" => "<i class=\"nav-icon fas fa-newspaper\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_7", null, $arLangMessage), "path" => "/profile/sphere/", "icons" => "<i class=\"nav-icon fas fa-cubes\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_13", null, $arLangMessage), "path" => "/pro/analytics/", "icons" => "<i class=\"nav-icon fas fa-chart-pie\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_18", null, $arLangMessage), "path" => "/pro/notify/", "icons" => "<i class=\"nav-icon fas fa-bell\"></i>"];
      $arMenu[] = ["name" => STTab::getMessage("MENU_PROFILE_MESS_19", null, $arLangMessage), "path" => "/pro/messages/", "icons" => "<i class=\"nav-icon fas fa-comments\"></i>"];
      ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <? foreach ($arMenu as $itemMenu): ?>
              <li class="nav-item">
                <a href="<?=$itemMenu['path'];?>" class="nav-link <? if ($curURL == $itemMenu['path']) echo ' active'; ?>">
                  <?=$itemMenu['icons'];?>
                  <p>
                    <?=$itemMenu['name'];?>
                  </p>
                </a>
              </li>
          <? endforeach; ?>
          <li class="nav-header"><hr></li>
          <li class="nav-item">
            <a href="?logout=yes" class="nav-link">
              <i class="nav-icon far fa-sign-out-alt text-danger"></i>
              <p class="text">STTab::getMessage("MENU_PROFILE_MESS_21", null, $arLangMessage)</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
