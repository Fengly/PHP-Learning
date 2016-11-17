<font color='red'face='楷体_gb2312'>
<?PHP
	$value="100";echo "\$value = \"$value\"";
	echo "<p>\$value==100: ";
	var_dump($value==100);  	//结果为:bool(true)
	echo "<p>\$value==ture: ";
	var_dump($value==true);   	//结果为:bool(true)
	echo "<p>\$value!=null: ";
	var_dump($value!=null);    	//结果为:bool(true)
	echo "<p>\$value==false: ";
	var_dump($value==false); 	//结果为:bool(false)
	echo "<p>\$value === 100: ";
	var_dump($value===100);  	//结果为:bool(false)
	echo "<p>\$value===true: ";
	var_dump($value===true);  	//结果为:bool(true)
	echo "<p>(10/2.0 !== 5): ";
	var_dump(10/2.0 !==5);   	//结果为:bool(true)
?>


</font>
