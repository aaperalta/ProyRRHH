<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="../css/estilopal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/menu.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<?php include("includes/google.php"); ?>
</head>

<body>

<div class="container">
  <div class="header"><!-- TemplateBeginEditable name="ParteSuperior_1" -->
    <?php include("includes/cabecera.php"); ?>
    <div class ="clearfloat"></div>
    <?php include("includes/menu.php"); ?>
  <!-- TemplateEndEditable --></div>
  <div class="sidebar1"><!-- TemplateBeginEditable name="Contenido_izq" -->
    <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
    <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
  <!-- TemplateEndEditable --><!-- end .sidebar1 --></div>
  <!-- TemplateBeginEditable name="Parte_Superior" -->Parte_Superior<!-- TemplateEndEditable -->
  <div class="content"><!-- TemplateBeginEditable name="Contenido_der" -->
  <h1>Instructions</h1>
  <p>Be aware that the CSS for these layouts is heavily commented. If you do most of your work in Design view, have a peek at the code to get tips on working with the CSS for the fixed layouts. You can remove these comments before you launch your site. To learn more about the techniques used in these CSS Layouts, read this article at Adobe's Developer Center - <a href="http://www.adobe.com/go/adc_css_layouts">http://www.adobe.com/go/adc_css_layouts</a>.</p>
  <h2>Clearing Method</h2>
  <p>Because all the columns are floated, this layout uses a clear:both declaration in the .footer rule.  This clearing technique forces the .container to understand where the columns end in order to show any borders or background colors you place on the .container. If your design requires you to remove the .footer from the .container, you'll need to use a different clearing method. The most reliable will be to add a &lt;br class=&quot;clearfloat&quot; /&gt; or &lt;div  class=&quot;clearfloat&quot;&gt;&lt;/div&gt; after your final floated column (but before the .container closes). This will have the same clearing effect.</p>
  <h3>Logo Replacement</h3>
  <p>An image placeholder was used in this layout in the .header where you'll likely want to place  a logo. It is recommended that you remove the placeholder and replace it with your own linked logo. </p>
  <p> Be aware that if you use the Property inspector to navigate to your logo image using the SRC field (instead of removing and replacing the placeholder), you should remove the inline background and display properties. These inline styles are only used to make the logo placeholder show up in browsers for demonstration purposes. </p>
  <p>To remove the inline styles, make sure your CSS Styles panel is set to Current. Select the image, and in the Properties pane of the CSS Styles panel, right click and delete the display and background properties. (Of course, you can always go directly into the code and delete the inline styles from the image or placeholder there.)</p>
  <h4>Backgrounds</h4>
  <p>By nature, the background color on any div will only show for the length of the content. This means if you're using a background color or border to create the look of a side column, it won't extend all the way to the footer but will stop when the content ends. If the .content div will always contain more content, you can place a border on the .content div to divide it from the column.</p>
  <!-- end .content -->
  <!-- TemplateEndEditable --></div>
  <div class="footer">
  <?php include("includes/pie.php"); ?></div>
  <!-- end .container --></div>
</body>
</html>
