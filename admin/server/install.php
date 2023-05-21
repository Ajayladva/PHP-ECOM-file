<?php
 include_once("server.php");

//  if(isset($_POST['ids']) && $_POST['ids']!= ""){
$id =$_POST['ids'];
$query =mysqli_query($conn,$id);

 
// $sql = "CREATE TABLE login_info (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   path VARCHAR(30) NOT NULL,
//   name VARCHAR(30) NOT NULL,
//   icon VARCHAR(100) NOT NULL
//   )";

// if (mysqli_query($conn, $sql)) {
//   echo "Database table created successfully home menu";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

// $sql = "INSERT INTO `home_menu` (`id`, `name`, `path`, `icon`) VALUES
// (1, 'HOME', 'index.php', 'other_houses'),
// (2, 't_shirts', 't-shirt.php', 'storefront'),
// (4, 'navs', 'navs.php', 'widgets'),
// (6, 'image_gallery', 'image_gallery.php', 'image'),
// (13, 'userlogin', 'adminlogin.php', 'how_to_reg'),
// (14, 'brands', 'brands.php', 'diamond'),
// (15, 'common_name', 'common_name.php', 'badge'),
// (20, 'pants', 'pants.php', 'styler'),
// (29, 'shirts', 'shirts.php', 'styler'),
// (30, 'wallet', 'wallet.php', 'wallet'),
// (31, 'shoes', 'shoes.php', 'footprint')";

// $sql = "CREATE TABLE pageauto (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   table_name VARCHAR(30) NOT NULL,
//   type_box VARCHAR(30) NOT NULL,
//   database_name VARCHAR(100) NOT NULL,
//   checkbox VARCHAR(30) NOT NULL,
//   type_box VARCHAR(30) NOT NULL,
//   database_name VARCHAR(100) NOT NULL
//   )";

// $sql ="INSERT INTO `pageauto` (`table_name`, `type_box`, `database_name`, `box_title`, `select_table_name`, `where_table_name`, `select_option_value`, `label_type`, `select_show_value`, `where_serach`) VALUES
// ('t_shirts', 'input', 'price', 'text', 19, '', '', '', 'text', '', ''),
// ('wallet', 'input', 'price', 'text', 19, '', '', '', 'text', '', ''),
// ('shirts', 'input', 'price', 'text', 19, '', '', '', 'text', '', ''),
// ('shoes', 'input', 'price', 'text', 19, '', '', '', 'text', '', ''),
// ('pants', 'input', 'price', 'text', 19, '', '', '', 'text', '', '')";

// if (mysqli_query($conn, $sql)) {
//   echo "Database insert created successfully home menu";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

?>