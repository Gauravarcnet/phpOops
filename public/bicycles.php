<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Weight</th>
        <th>Condition</th>
        <th>Price</th>
      </tr>
<?php 
$parser = new ParseCsv(PRIVATE_PATH.'/used_bicycles.csv');
//print_r($parser);
$bikeArray = $parser->parse();
//print_r($bikeArray);
$args = [
  'brand' => 'Trek',
  'model' => 'Emonda  ',
  'year' => 2017,
  'category' => 'Road',
  'gender' => 'male',
  'color' => 'blue',
  'weight_kg' => 5,
  'condition_id' => 1,
  'price' => 0.0,
  'brand' => 'Trek'
];
$bike = new Bicycle($args);
?>
      <?php foreach($bikeArray as $args ){?>
      <?php $bike = new Bicycle($args); ?>
      <tr>
        <td><?php echo h($bike->brand);?></td>
        <td><?php echo h($bike->model);?></td>
        <td><?php echo h($bike->year);?></td>
        <td><?php echo h($bike->category);?></td>
        <td><?php echo h($bike->gender);?></td>
        <td><?php echo h($bike->color);?></td>
        <td><?php echo h($bike->weight_kg());?></td>
        <td><?php echo h($bike->condition());?></td>
        <td><?php echo h(money_format('Rs%i',$bike->price));?></td>
      </tr>
      <?php }?>
    </table>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
