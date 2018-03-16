<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="{{asset('plugins/js/JsBarcode.all.js')}}"></script>
	<script>
		Number.prototype.zeroPadding = function(){
			var ret = "" + this.valueOf();
			return ret.length == 1 ? "0" + ret : ret;
		};
	</script>
</head>
<body>
	<div align="center">
		<img id="barcode1"/>
		<script>
			JsBarcode("#barcode1", "MERP",{
				displayValue:true,
				fontSize:15
			});
		</script>
	</div>

	<div>
		<img id="barcode3"/>
		<script>JsBarcode("#barcode3", "9780199532179", {
			format:"C93",
			displayValue:true,
			fontSize:10
		});</script>
	</div>
</body>
</html>
