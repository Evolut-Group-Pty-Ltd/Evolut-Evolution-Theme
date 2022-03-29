<?php
$tabs = __( $args['tabs'] );
$tab_orientation = __( $args['tab_orientation'] );
$tab_colours = __( $args['tab_colours'] );
$block_id = __( $args['block_id'] );
$content_width = "0p";
if($tab_orientation=='col') {
    $content_width = "75%";
} elseif ($tab_orientation=='row') {
    $content_width = "100%";
}
?>

<div class="tabs__container tabs__container-<?php echo $block_id ?> container w3-container" <?php if($tab_orientation=='col') : ?> style="flex-direction: row;"<?php endif; ?>>
<?php if($tabs): 
    $i = 0;
    ?>
    <div class="tabs"<?php if($tab_orientation=='col') : ?> style="flex-direction: column; width: 25%; margin-bottom: 5px"<?php endif; ?>>
    <?php foreach( $tabs as $tab ): 
        $i++;
        ?>
         <a class="tab__a" href="javascript:void(0)" onclick="<?php echo $block_id ?>_OpenTab(event, 'tab-<?php echo $block_id ?>-<?php echo $i; ?>')">
          <div class="tab__link tab__link-<?php echo $block_id ?><?php if($i==1) : ?> active<?php endif; ?>"<?php if($tab_orientation=='col') : ?> style="margin-bottom: 5px"<?php endif; ?>><?php echo $tab['title']; ?></div>
        </a>
    <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if($tabs): 
    $i = 0;
    ?>
    <?php foreach( $tabs as $tab ): 
        $i++;
        ?>
        <div class="tab__content tab__content-<?php echo $block_id ?>" id="tab-<?php echo $block_id ?>-<?php echo $i; ?>" style="<?php if($i!=1) : ?> display:none; <?php endif; ?><?php if($i==1) : ?>width:<?php echo $content_width ?>; <?php endif; ?>">
        <?php if($tab['image']) : ?><img class="tab__image" src="<?php echo $tab['image']; ?>"><?php endif; ?>
        <div<?php if($tab_colours['content_colour']) : ?> style="color:<?php echo $tab_colours['content_colour'] ?>"<?php endif; ?>><?php echo $tab['content']; ?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>

<script>
function <?php echo $block_id ?>_OpenTab(evt, tabName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("tab__content-<?php echo $block_id ?>");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
    x[i].style.width = "<?php echo $content_width ?>";
  }
  tablinks = document.getElementsByClassName("tab__link-<?php echo $block_id ?>");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " active";
}
</script>
 