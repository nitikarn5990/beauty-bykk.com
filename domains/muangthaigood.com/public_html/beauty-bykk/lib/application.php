<?php
	// Global Defines
	include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/define.php');
	
	// Simpl Framework
	include_once(FS_SIMPL . 'simpl.php');
	
	// Custom Functions and Classes
	include_once(FS_LIB . 'controllers.php');
	include_once(FS_LIB . 'classes.php');
	include_once(FS_LIB . 'btce-api.php');
	include_once(FS_LIB . 'functions.php');
	include_once(FS_LIB . 'pagination.php');
	
	
	// Make the DB Connection
	$db = new DB;
	$db->Connect();
	
	$functions = new Utility;
		
		
	// New Class For Table
	$category = new Category; 
	$users = new Users; 
	
	//$gallery_categories = new Gallery_Categories;
	//$gallery = new Gallery;
	//$gallery_file = new Gallery_Files;
	$webs_money = new WebsMoney;
	
	$product_files = new Product_files;
	$products = new Products; 
	
	$home = new Home; 
	$about = new About;
	$shopping_guide = new Shopping_guide;
	$contact = new Contact;
	$contact_message = new Contact_message;
	$products_message = new Products_message;
	$contact_footer = new Contact_footer;
	$contact_map = new Contact_map;
	
	$slides = new Slides;
	$slides_file = new Slide_files;
	
	$ads = new Ads;
	$ads_files = new Ads_files;
	
	$bank = new Bank;
	$bank_company = new Bank_company;
	
	$payment_confirm = new Payment_confirm;
	
	$best_offer = new Best_offer;
	$blog_category = new Blog_category;
	$blog = new Blog;
	$province = new Province;
	$amphur = new Amphur;
	$district = new District;
	
	$customer = new Customer;
	
	$orders = new Orders;
	$orders_detail = new Orders_detail;
	$shipping = new Shipping;
	$shipping_total = new Shipping_total;
	$google_map = new Google_map;
	$tag = new Tag;
        $payment_confirm_detail = new Payment_confirm_detail();
	
	$ProID = $_GET['productID'];
?>
