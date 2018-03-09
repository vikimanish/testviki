<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Formatter</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 30px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
        .first-box
        {
            margin-bottom: 40px;
            padding-bottom: 40px;
        }
        .btn-area
        {
            margin-top: 40px;
        }
        legend
        {
       font-size: 25px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
               <fieldset>

<!-- Form Name -->
<legend>Text Formatter</legend>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-6 control-label" for="text">Past your text here</label>
  <div class="col-md-6">                     
    <textarea class="form-control first-box" id="text" name="text" style="height:250px;"></textarea>
  </div>
</div> 
<div class="form-group">
    
  <label class="col-md-6 control-label" for="text">Result</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="result" name="result" style="height:250px;"></textarea>
  </div>
</div>
<br>
 <br>
                   <br>
 <br>
<!-- Button -->
<div class="form-group ">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4 btn-area">
  <div class="col-md-4">
    <button id="submit" name="singlebutton" class="btn btn-primary">Format</button>
  </div>
      <div class="col-md-4">
    <button id="copyButton" name="singlebutton" class="btn btn-info">Copy to Clipboard</button>
  </div>
</div>

</fieldset>
</form>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<script>

$(function(){
   $("#submit").on("click",function(){
        var html = "";
       var lines = $('#text').val().split('\n');
for(var i = 0;i < lines.length;i++){
    if(i==0)
        {
             lines[i] = "('" + lines[i] + "',";
        }
    else if(i==lines.length-1)
        {
             lines[i] = "'" + lines[i] + "');";
        }
    else
        {
 lines[i] = "'" + lines[i] + "',";
        }
    
}
 $("#result").val( lines.join("\n"));
       
   });

});
    document.getElementById("copyButton").addEventListener("click", function() {
    copyToClipboard(document.getElementById("result"));
});
    function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}

</script>

</html>
