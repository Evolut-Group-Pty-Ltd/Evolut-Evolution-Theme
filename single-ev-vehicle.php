<?php get_template_part('partials/header/header'); ?>
<?php get_template_part('partials/ev-item-header/ev-item-header'); ?>

<?php
$plug_types = get_the_terms(get_the_ID(), 'plug_type');
$plug_types = array_map(function($type) {
  return $type->name;
}, $plug_types);

$car_types = get_the_terms(get_the_ID(), 'car_type');
$car_types = array_map(function($type) {
  return $type->description !== '' ? $type->description : $type->name;
}, $car_types);

$characteristics = get_field('characteristics');
//var_dump($plug_types);
?>
<section class="ev-vehicle__stats">
  <div class="container">
    <div class="ev-vehicle__prime-stats">
      <div class="ev-vehicle-prime-stat">
        <h2 class="ev-vehicle-prome-stat__title"><?php the_field('electric_range') ?></h2>
        Electric Range
      </div>
      <div class="ev-vehicle-prime-stat">
      <h2 class="ev-vehicle-prome-stat__title"><?php the_field('battery_capacity') ?></h2>
        Battery Capacity
      </div>
      <div class="ev-vehicle-prime-stat">
      <h2 class="ev-vehicle-prome-stat__title"><?php echo implode(' + ', $plug_types) ?></h2>
        Plug Standard
      </div>
    </div>
    <table class="ev-vehicle__table-stats">
      <tr>
        <td>Type:</td> <td><?php echo implode(' + ', $car_types); ?></td>
      </tr>
      <tr>
        <td>Onboard charger:</td> <td><?php echo $characteristics['onboard_charger']; ?></td>
      </tr>
      <tr>
        <td>Time to full charge (peak AC):</td> <td><?php echo $characteristics['time_to_full_charge']; ?></td>
      </tr>
      <?php if($characteristics['required_adapter']): ?>
      <tr>
        <td>Required Adapter:</td> <td><?php echo $characteristics['required_adapter']; ?></td>
      </tr>
      <?php endif; ?>
    </table>
  </div>
</section>

<?php the_content() ?>

<?php
$charging_options = get_field('charging_options');
get_template_part('blocks/text-with-image/partial', null, array(
  'title' => '',
  'text_content' => array(
    'size' => 3,
    'sub_title' => 'Charging Options',
    'text' => $charging_options['text'],
    'text_columns' => 1,

    'button_text' => $charging_options['button'] !== '' ? $charging_options['button']['title'] : '',
    'button_link' => $charging_options['button'] !== '' ? $charging_options['button']['url'] : '#',
  ),
  'gap_size' => 1,
  'image_content' => array(
    'size' => 8,
    'image' => $charging_options['photo']
  ),
  'reverse_order' => false
));
?>

<?php
$regular_electricity_outlet = get_field('regular_electricity_outlet');
$dc_charging = get_field('dc_charging');
$dc_available = $dc_charging['capacity'] !== '';
$level2_charging = get_field('level_2_charging');
//var_dump($level2_charging);
$level2_labels = array(
  'single_phase_16a' => 'Single Phase, 16A',
  'single_phase_32a' => 'Single Phase, 32A',
  '3phase_16a' => '3-Phase, 16A',
  '3phase_32a' => '3-Phase, 32A'
);
$preferable_idx = 0;
foreach(array_values($level2_charging) as $idx => $option) {
  if($option['preferable_way']) {
    $preferable_idx = $idx;
    break;
  }
}
?>
<section class="ev-vehicle__levels section">
  <div class="ev-vehicle__levels-container container">
    <div class="grid">
      <div class="ev-vehicle__level-container grid__col--span4">
        <div class="ev-vehicle__level">
          <div class="ev-vehicle__level-label">Level 1</div>
          <h5 class="ev-vehicle__level-title">Regular Electricity Outlet</h5>
          <div class="ev-vehicle__level-text">This charging method is suitable for travel and emergencies</div>
          <div class="ev-vehicle__level-stat">
            <h2 class="ev-vehicle__level-stat-value"><?php echo $regular_electricity_outlet['capacity'] ?></h2>
            Capacity
          </div>
          <div class="ev-vehicle__level-stat">
            <h2 class="ev-vehicle__level-stat-value"><?php echo $regular_electricity_outlet['time_to_charge'] ?></h2>
            Time to charge
          </div>
        </div>
      </div>

      <div class="ev-vehicle__level-container grid__col--span4 slider slider--relative" data-slide="<?php echo $preferable_idx + 1 ?>">
        <div class="slider__items">
          <?php 
          $idx = 0;
          foreach($level2_charging as $key => $option): ?> 
          <div class="ev-vehicle__level slider__item <?php echo $option['preferable_way'] ? 'ev-vehicle__level--preferable' : '' ?>">
            <div class="ev-vehicle__level-label">Level 2</div>
            <h5 class="ev-vehicle__level-title"><?php echo $level2_labels[$key] ?></h5>
            <div class="ev-vehicle__level-text">
              <?php if($idx === $preferable_idx): ?>
              This charging method is the best fit for this car
              <?php elseif($idx < $preferable_idx): ?>
              This charging capacity is lower than your car can handle
              <?php else: ?>
              This charging capacity is higher than your car can handle 
              <?php endif; ?>
            </div>
            <div class="ev-vehicle__level-stat">
              <h2 class="ev-vehicle__level-stat-value"><?php echo $option['capacity'] ?></h2>
              Capacity
            </div>
            <div class="ev-vehicle__level-stat">
              <h2 class="ev-vehicle__level-stat-value"><?php echo $option['time_to_charge'] ?></h2>
              Time to charge
            </div>
          </div>
          <?php 
          $idx++;   
          endforeach; ?>
        </div> 
        <nav class="ev-vehicle__level-nav slider__nav">
          <?php for($i = 1; $i <= 4; $i++): ?> 
          <button class="ev-vehicle__level-nav-item slider__nav-item" data-target-slide="<?php echo $i ?>"><?php echo $i ?></button>
          <?php endfor; ?>
        </nav>
      </div>

      <div class="ev-vehicle__level-container grid__col--span4">
        <div class="ev-vehicle__level">
          <div class="ev-vehicle__level-label">Level 3</div>
          <h5 class="ev-vehicle__level-title">DC CHARGING</h5>
          <div class="ev-vehicle__level-text">
          <?php if($dc_available): ?>
          Direct current (DC) connection for fast recharging
          <?php else: ?>
          This car is not capable of DC Charging          
          <?php endif; ?>
          </div>
          <div class="ev-vehicle__level-stat">
            <h2 class="ev-vehicle__level-stat-value"><?php echo $dc_available ? $dc_charging['capacity'] : '---' ?></h2>
            Capacity
          </div>
          <div class="ev-vehicle__level-stat">
            <h2 class="ev-vehicle__level-stat-value"><?php echo $dc_available ? $dc_charging['time_to_charge'] : '---' ?></h2>
            Time to charge
          </div>
        </div>
      </div>
    </div>
    <div class="ev-vehicle__levels-notice">
      *All charge times listed are estimates only and are not endorsed by the manufacturer. Please refer to official specifications when purchasing an electric vehicle.
    </div>
  </div>
</section>

<?php
if(get_field('shopify_collection_id')):
  get_template_part('blocks/shopify-collection/partial', null, array(
    'title' => 'Additional Accessories',
    'collection_id' => get_field('shopify_collection_id')
  ));
endif;
?>

<?php
$home_charging = get_field('home_charging');
//var_dump($home_charging);
?>
<section class="ev-vehicle__home-charging container grid section">
  <div class="ev-vehicle__home-charging-text grid__col--span5">
    <h3 class="ev-vehicle__home-charging-title">Home Charging</h3>
    <?php echo $home_charging['text'] ?>
  </div>
  <div class="grid__col--span7">
    <img class="ev-vehicle__home-charging-img" src="<?php echo $home_charging['photo_1']['url'] ?>" alt="<?php echo $home_charging['photo_1']['alt'] ?>">
  </div>
  <div class="ev-vehicle__home-charging-gap grid__col--span12"></div>
  <div class="grid__col--span7">
    <img class="ev-vehicle__home-charging-img" src="<?php echo $home_charging['photo_2']['url'] ?>" alt="<?php echo $home_charging['photo_2']['alt'] ?>">
  </div>
  <div class="grid__col--span5">
    <img class="ev-vehicle__home-charging-img" src="<?php echo $home_charging['photo_3']['url'] ?>" alt="<?php echo $home_charging['photo_3']['alt'] ?>">
  </div>
</section>

<?php
$custom_next_steps = get_field('custom_next_steps');
?>
<section class="ev-vehicle__next-steps">
  <div class="container grid">
    <div class="grid__col--span4">
    <h3 class="ev-vehicle__next-steps-title"><?php echo $custom_next_steps['title'] !== '' ? $custom_next_steps['title'] : 'Next Steps' ?></h3>
      <?php if($custom_next_steps['text'] !== ''):
        echo $custom_next_steps['text'];
      else:
      ?>
      <p>JET Charge are experts in the field of electrical vehicle charger installations. Our nationwide network can install anywhere across Australia including Sydney, Melbourne, Adelaide, Brisbane and Perth.</p>

      <p>A level 2 charging station is the ideal solution for home EV charging. You can contact us online through the form on the right to express your interest or ask any questions you may have. Once this is complete:</p>

      <ul class="ev-vehicle__next-steps-list">
        <li class="ev-vehicle__next-steps-list-item">JET Charge will contact you in the following few days to arrange a survey of the site and a quote for your installation</li>
        <li class="ev-vehicle__next-steps-list-item">JET Charge will arrange the supply of any additional hardware if required</li>
        <li class="ev-vehicle__next-steps-list-item">One of our qualified installers will visit your home and provide a complete quote. If you are happy with the price, they will carry out the install the same day</li>
      </ul>

      <strong>Fill out the form below or give us a call: 1300 856 328</strong>
      <?php endif; ?>
    </div>
    <div class="grid__col"></div>
    <div class="grid__col--span7">
      <?php echo do_shortcode('[gravityform id="' . ($custom_next_steps['gravity_forms_id'] !== '' ? $custom_next_steps['gravity_forms_id'] : 1) . '" title="false" description="false" ajax="true"]'); ?>
    </div>
  </div>
</section>

<?php get_template_part('partials/footer/footer'); ?>
