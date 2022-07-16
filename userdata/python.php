<style type='text/css'>
  #decide {
    display: none;
  }
</style>
<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">

<head>
  <?php
  if (isset($_SESSION['email'])) {
  } else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
  }
  ?>

  <title>IDE - GlowEdu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/css/style.css">
  <link rel="preload" href="fonts/source-code-pro-v14-latin-regular.woff2" as="font" type="font/woff2">
  <link rel="preload" href="fonts/fontawesome.woff2?14663396" as="font" type="font/woff2">
  <link rel="stylesheet" href="css/w3schools26.css">
  <link rel="stylesheet" href="css/codemirror.css">
  <link rel="stylesheet" href="css/ide.css">
</head>
<script>
  (function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-3855518-1', 'auto');
  ga('require', 'displayfeatures');
  ga('require', 'GTM-WJ88MZ5');
  ga('send', 'pageview');
</script>

<script type='text/javascript'>
  var k42 = false;
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];

  k42 = true;
  googletag.cmd.push(function() {
    googletag.pubads().setTargeting("page_section", (function() {
      var folder = location.pathname;
      folder = folder.replace("/", "");
      folder = folder.substr(0, folder.indexOf("/"));
      return folder + "tryit";
    })());
  });
  (adsbygoogle = window.adsbygoogle || []).pauseAdRequests = 1;

  var snhb = snhb || {};
  snhb.queue = snhb.queue || [];
  snhb.options = {
    logOutputEnabled: false,
    autoStartAuction: false
  };
</script>
<!-- begin cmp -->

<body>
  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <script>
          $(document).ready(function() { // on document ready
            $("#sidebarCollapse").click(); // click the element
          })
        </script>
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button id="2button" class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
              <img src="images/main.png" width="40px">
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <div class="input-group">
            </li>
          </ul>
          </ul>
        </div>
      </div>
    </nav>

    <?php
    $course_int = "Welcome, $user<br> To Python IDE... <br><br><br> All The Best!<br>";
    $id = $_GET['id'];
    $query = "SELECT * from courses Where id = '$id'";
    $result = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($result)) {
      $Course_id = $rows['id'];
      $course_topic = $rows['course_topic'];
      $course_category = $rows['course_category'];
      $course_data = $rows['course_data'];
      $youtube_link = $rows['youtube_link'];
      $hints = $rows['hints'];
      $answer = $rows['answer'];
    }
    ?>
    <?php
    $next_id = "";
    $next_sql = "SELECT * FROM courses WHERE id > $Course_id ORDER BY id DESC";
    $next_query = mysqli_query($conn, $next_sql);
    while ($row = mysqli_fetch_assoc($next_query)) {
      $next_id = $row['id'];
    }
    if ($next_id == "") {
      $final_next_id = "python_module.php";
    } else {
      $final_next_id = "python.php?id=" . $next_id;
    }
    ?>
        <?php
    $pre_id = "";
    $next_sql = "SELECT id from courses where id < $Course_id ORDER BY id DESC";
    $next_query = mysqli_query($conn, $next_sql);
    while ($row = mysqli_fetch_assoc($next_query)) {
      $pre_id = $row['id'];
    }
    if ($pre_id == "") {
      $final_pre_id = "python_module.php";
    } else {
      $final_pre_id = "python.php?id=" . $pre_id;
    }
    ?>
    <?php
    $check = @$_POST['substance'];
    $code = strip_tags(@$_POST['codearea']);
    if ($check) {
      $answer_check = "SELECT answer from courses WHERE id='$id'";
      $result = mysqli_query($conn, $answer_check);
      while ($rows = mysqli_fetch_assoc($result)) {
        $course_answer = $rows['answer'];
      }
      if ($code == $course_answer) {
        mysqli_query($conn, "INSERT INTO match_id (`id`, `student_id`, `course_id`, `date`) VALUES (NULL, '$user_id', '$id', '')");
        echo "<p style='font-family: Roboto; font-weight: 600; color: #fff; padding: 10px; text-align: center; background: #67ce8b; border: 1px solid #67ce8b; border-radius: 4px;'>Correct Answer <a href='$final_next_id' style='text-decoration: underline;'>Next >></a></p>";
      } else {
        echo '<p style="font-family: Roboto; font-weight: 600; color: #fff; padding: 10px; text-align: center; background: #ff6767; border: 1px solid #ff6767; border-radius: 4px;">The Checked Answer Is Wrong Please Check The Input / Output and Answer First...</p>';
      }
    }
    ?>
    <?php
    $id_check = "SELECT student_id, course_id FROM match_id WHERE course_id='$id' AND student_id='$user_id'";
    $result = mysqli_query($conn, $id_check);
    $result_check = mysqli_num_rows($result);
    if (!$result_check == 0) {
      echo "<p style='font-family: Roboto; font-weight: 600; color: #fff; padding: 10px; text-align: center; background: #67ce8b; border: 1px solid #67ce8b; border-radius: 4px;'><a href='$final_pre_id' style='text-decoration: underline;'> << Go Back </a>  You have already completed the module...  <a href='$final_next_id' style='text-decoration: underline;'>Next >></a></p>";
      $sql2 = "SELECT * FROM courses WHERE id='$id'";
      $query2 = mysqli_query($conn, $sql2);
      while ($row = mysqli_fetch_assoc($query2)) {
        $code = $row['answer'];
      }
    } else {
      $code = "print('Hello, $user')";
    }
    ?>
    <div class="row mt-12">
      <h2 class="col-md-4" id="head"><?php echo $course_category; ?></h2>
      <h2 class="col-md-4" id="subhead">Code Here!</h2>
      <div class="col-md-4"><a href="report.php" target="_blank"><button type="button" onclick="showAlert()" class="btn btn-outline-danger float-right"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report</button></a></div>
      <script>
        function showAlert() {
          alert("Hello! Please Take a Screen Shot For Our Reference!!..");
        }
      </script>
    </div>
    <div class="row mt-3">
      <div class="col-md-4" id="collums" style="margin-top :60px;">
        <h5 id="course_topic"><?php echo $course_topic; ?></h5><br>
        <div id="course_data"><?php echo $course_data; ?></div><br>
        <div id="hint"><?php echo $hints; ?></div><br>
        <iframe style="border-radius: 5px;" class="mb-4" width="100%" height="70%" src="<?php echo $youtube_link; ?>"></iframe><br>
      </div>
      <!-- IDE div START HERE -->
      <div class="col-md-4" id="trytopnavbar">
        <!-- IDE CODE START HERE -->
        <div class="trytopnav">
          <div class="w3-bar" style="overflow:auto">
            <?php
            $id_check = "SELECT student_id, course_id FROM match_id WHERE course_id='$id' AND student_id='$user_id'";
            $result = mysqli_query($conn, $id_check);
            $result_check = mysqli_num_rows($result);
            if ($result_check == 0) {
            ?>
              <input type="submit" value="Check Answer" name="checkanswer" class="w3-button w3-bar-item" style="font-size:17px;">
            <?php
            }
            ?>
            <button class="w3-bar-item w3-button" onclick="retheme()" title="Change Theme" style="font-size:17px; margin-top:-2px;" title="Change Theme">Change Theme</button>
            <button id="run" class="w3-button w3-bar-item ws-green w3-hover-white" onclick="submitTryit(1);ga('send', 'event', 'runCodePython', 'click');snhb.queue.push(function(){googletag.pubads().setTargeting('page_section',(function () {var folder = location.pathname;folder = folder.replace('/', ''); folder = folder.substr(0, folder.indexOf('/')); return folder + 'tryitUA'; })());snhb.startAuction(['try_it_leaderboard']);});">Run &raquo;</button>
          </div>
        </div>
        <div id="shield"></div>
        <a href="javascript:void(0)" id="dragbar"></a>
        <div id="container" style=" border-radius: 7px;">
          <div id="navbarDropMenu" class="w3-dropdown-content w3-bar-block w3-border" style="z-index:5">
          </div>
          <div id="menuOverlay" class="w3-overlay w3-transparent" style="cursor:pointer;z-index:4"></div>
          <div id="textareacontainer">
            <div id="textarea">
              <div id="textareawrapper">
                <form action="python.php?id=<?php echo $id; ?>" method="POST" name="substance">
                  <script>
                    $("input[name='checkanswer']").click(function() {
                      $("input[name='substance']").click();
                    });
                  </script>
                  <textarea autocomplete="off" name="codearea" id="textareaCode" wrap="logical" spellcheck="false"><?php echo $code; ?>
</textarea>
                  <input type="submit" value="Check Answer" name="substance" class="w3-button w3-bar-item" style="font-size:17px; display: none;">

                </form>
                <form id="codeForm" autocomplete="off" style="margin:0px;display:none;">
                  <input type="hidden" name="code" id="code" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4" id="iframecontainerbox"><br><br><br>
        <div id="iframecontainer">
          <div id="iframe">
            <div id="runloadercontainer">
              <div id="runloader"></div>
            </div>
            <div id="iframewrapper">
              <div id="iframeResult" style="white-space:nowrap;overflow:auto;"><?php echo $course_int; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/codemirror.js"></script>
    <script src="js/codemirror_python.js"></script>
    <script src="https://cdn.snigelweb.com/sncmp/latest/sncmp_stub.min.js"></script>

    <script async type="text/javascript" src="https://cdn.snigelweb.com/pub/w3schools.com/snhb-loader.min.js"></script>
    <style>
      #collums::-webkit-scrollbar {
        display: none;
      }

      #collums {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
      }

      #collums {
        overflow-y: scroll;
        font-family: "Helvetica", sans-serif;
        background: #E5E7EB;
        color: #111;
        padding: 20px;
        border-top: 1px solid #ababab;
        border-bottom: 1px solid #ababab;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        box-shadow:
          inset 0px 25px 18px -15px #CCC,
          inset 0px -25px 18px -15px #CCC;
      }
    </style>

    <script>
      snhb.queue.push(function() {

        snhb.startAuction(["try_it_leaderboard"]);

      });
    </script>
    <script>
      if (window.addEventListener) {
        window.addEventListener("resize", browserResize);
      } else if (window.attachEvent) {
        window.attachEvent("onresize", browserResize);
      }
      var xbeforeResize = window.innerWidth;

      function browserResize() {
        var afterResize = window.innerWidth;
        if ((xbeforeResize < (970) && afterResize >= (970)) || (xbeforeResize >= (970) && afterResize < (970)) ||
          (xbeforeResize < (728) && afterResize >= (728)) || (xbeforeResize >= (728) && afterResize < (728)) ||
          (xbeforeResize < (468) && afterResize >= (468)) || (xbeforeResize >= (468) && afterResize < (468))) {
          xbeforeResize = afterResize;

          snhb.queue.push(function() {
            snhb.startAuction(["try_it_leaderboard"]);
          });

        }
        if (window.screen.availWidth <= 768) {
          restack(window.innerHeight > window.innerWidth);
        }
        fixDragBtn();
        showFrameSize();
      }
      var fileID = "";
      var loadSave = false;

      function getSavedFile() {
        loadSave = true;
        var htmlCode;
        var paramObj = {};
        paramObj.fileid = "";
        fileID = paramObj.fileid;
        var paramA = JSON.stringify(paramObj);
        var httpA = new XMLHttpRequest();
        httpA.open("POST", globalURL, true);
        httpA.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        httpA.onreadystatechange = function() {
          if (httpA.readyState == 4 && httpA.status == 200) {
            document.getElementById("textareaCode").value = httpA.responseText;
            window.editor.getDoc().setValue(httpA.responseText);
            loadSave = false;
          }
        }
        httpA.send(paramA);
      }
    </script>

    <script>
      function submitTryit(n) {
        if (window.editor) {
          window.editor.save();
        }
        var text = document.getElementById("textareaCode").value;
        var ifr = document.createElement("iframe");
        ifr.setAttribute("frameborder", "0");
        ifr.setAttribute("id", "iframeResult");
        ifr.setAttribute("name", "iframeResult");
        document.getElementById("iframewrapper").innerHTML = "";
        document.getElementById("iframewrapper").appendChild(ifr);
        document.getElementById("iframeResult").addEventListener("load", hideSpinner);
        if (loadSave == true) {
          ifr.setAttribute("src", "https://www.w3schools.com/code/opentext.htm");
        } else if (loadSave == false) {
          displaySpinner();
          var t = text;
          t = t.replace(/=/gi, "w3equalsign");
          t = t.replace(/\+/gi, "w3plussign");
          var pos = t.search(/script/i)
          while (pos > 0) {
            t = t.substring(0, pos) + "w3" + t.substr(pos, 3) + "w3" + t.substr(pos + 3, 3) + "tag" + t.substr(pos + 6);
            pos = t.search(/script/i);
          }
          document.getElementById("code").value = t;
          document.getElementById("codeForm").action = "https://try.w3schools.com/try_python.php?x=" + Math.random();
          document.getElementById('codeForm').method = "post";
          document.getElementById('codeForm').acceptCharset = "utf-8";
          document.getElementById('codeForm').target = "iframeResult";
          document.getElementById("codeForm").submit();
        } else {
          var ifrw = (ifr.contentWindow) ? ifr.contentWindow : (ifr.contentDocument.document) ? ifr.contentDocument.document : ifr.contentDocument;
          ifrw.document.open();
          ifrw.document.write(text);
          ifrw.document.close();
          //23.02.2016: contentEditable is set to true, to fix text-selection (bug) in firefox.
          //(and back to false to prevent the content from being editable)
          //(To reproduce the error: Select text in the result window with, and without, the contentEditable statements below.)  
          if (ifrw.document.body && !ifrw.document.body.isContentEditable) {
            ifrw.document.body.contentEditable = true;
            ifrw.document.body.contentEditable = false;
          }
        }
      }

      function hideSpinner() {
        document.getElementById("runloadercontainer").style.display = "none";
      }

      function displaySpinner() {
        var i, c, w, h, r, top;
        i = document.getElementById("iframeResult");
        w = w3_getStyleValue(i, "width");
        h = w3_getStyleValue(i, "height");
        c = document.getElementById("runloadercontainer");
        c.style.width = w;
        c.style.height = h;
        c.style.display = "block";
        w = Number(w.replace("px", "")) / 5;
        r = document.getElementById("runloader");
        r.style.width = w + "px";
        r.style.height = w + "px";
        h = w3_getStyleValue(r, "height");
        h = Number(h.replace("px", "")) / 2;
        top = w3_getStyleValue(c, "height");
        top = Number(top.replace("px", "")) / 2;
        top = top - h
        r.style.top = top + "px";
      }


      var currentStack = true;
      if ((window.screen.availWidth <= 768 && window.innerHeight > window.innerWidth) || "" == " horizontal") {
        restack(true);
      }

      function restack(horizontal) {
        var tc, ic, t, i, c, f, sv, sh, d, height, flt, width;
        tc = document.getElementById("textareacontainer");
        ic = document.getElementById("iframecontainer");
        t = document.getElementById("textarea");
        i = document.getElementById("iframe");
        c = document.getElementById("container");
        sv = document.getElementById("stackV");
        sh = document.getElementById("stackH");
        tc.className = tc.className.replace("horizontal", "");
        ic.className = ic.className.replace("horizontal", "");
        t.className = t.className.replace("horizontal", "");
        i.className = i.className.replace("horizontal", "");
        c.className = c.className.replace("horizontal", "");
        if (sv) {
          sv.className = sv.className.replace("horizontal", "")
        };
        if (sv) {
          sh.className = sh.className.replace("horizontal", "")
        };
        stack = "";
        if (horizontal) {
          tc.className = tc.className + " horizontal";
          ic.className = ic.className + " horizontal";
          t.className = t.className + " horizontal";
          i.className = i.className + " horizontal";
          c.className = c.className + " horizontal";
          if (sv) {
            sv.className = sv.className + " horizontal"
          };
          if (sv) {
            sh.className = sh.className + " horizontal"
          };
          stack = " horizontal";
          document.getElementById("textareacontainer").style.height = "50%";
          document.getElementById("iframecontainer").style.height = "50%";
          document.getElementById("textareacontainer").style.width = "100%";
          document.getElementById("iframecontainer").style.width = "100%";
          currentStack = false;
        } else {
          document.getElementById("textareacontainer").style.height = "100%";
          document.getElementById("iframecontainer").style.height = "100%";
          document.getElementById("textareacontainer").style.width = "100%";
          document.getElementById("iframecontainer").style.width = "100%";
          currentStack = true;
        }
        fixDragBtn();
        showFrameSize();
      }

      function retheme() {
        var cc = document.body.className;
        if (cc.indexOf("darktheme") > -1) {
          document.body.className = cc.replace("darktheme", "");
          if (opener) {
            opener.document.body.className = cc.replace("darktheme", "");
          }
          localStorage.setItem("preferredmode", "light");
        } else {
          document.body.className += " darktheme";
          if (opener) {
            opener.document.body.className += " darktheme";
          }
          localStorage.setItem("preferredmode", "dark");
        }
      }
      (
        function setThemeMode() {
          var x = localStorage.getItem("preferredmode");
          if (x == "dark") {
            document.body.className += " darktheme";
          }
        })();

      function showFrameSize() {
        var t;
        var width, height;
        width = Number(w3_getStyleValue(document.getElementById("iframeResult"), "width").replace("px", "")).toFixed();
        height = Number(w3_getStyleValue(document.getElementById("iframeResult"), "height").replace("px", "")).toFixed();
        document.getElementById("framesize").innerHTML = "Result Size: <span>" + width + " x " + height + "</span>";
      }
      var dragging = false;
      var stack;

      function fixDragBtn() {
        var textareawidth, leftpadding, dragleft, containertop, buttonwidth
        var containertop = Number(w3_getStyleValue(document.getElementById("container"), "top").replace("px", ""));
        if (stack != " horizontal") {
          document.getElementById("dragbar").style.width = "5px";
          textareasize = Number(w3_getStyleValue(document.getElementById("textareawrapper"), "width").replace("px", ""));
          leftpadding = Number(w3_getStyleValue(document.getElementById("textarea"), "padding-left").replace("px", ""));
          buttonwidth = Number(w3_getStyleValue(document.getElementById("dragbar"), "width").replace("px", ""));
          textareaheight = w3_getStyleValue(document.getElementById("textareawrapper"), "height");
          dragleft = textareasize + leftpadding + (leftpadding / 2) - (buttonwidth / 2);
          document.getElementById("dragbar").style.top = containertop + "px";
          document.getElementById("dragbar").style.left = dragleft + "px";
          document.getElementById("dragbar").style.height = textareaheight;
          document.getElementById("dragbar").style.cursor = "col-resize";

        } else {
          document.getElementById("dragbar").style.height = "5px";
          if (window.getComputedStyle) {
            textareawidth = window.getComputedStyle(document.getElementById("textareawrapper"), null).getPropertyValue("height");
            textareaheight = window.getComputedStyle(document.getElementById("textareawrapper"), null).getPropertyValue("width");
            leftpadding = window.getComputedStyle(document.getElementById("textarea"), null).getPropertyValue("padding-top");
            buttonwidth = window.getComputedStyle(document.getElementById("dragbar"), null).getPropertyValue("height");
          } else {
            dragleft = document.getElementById("textareawrapper").currentStyle["width"];
          }
          textareawidth = Number(textareawidth.replace("px", ""));
          leftpadding = Number(leftpadding.replace("px", ""));
          buttonwidth = Number(buttonwidth.replace("px", ""));
          dragleft = containertop + textareawidth + leftpadding + (leftpadding / 2);
          document.getElementById("dragbar").style.top = dragleft + "px";
          document.getElementById("dragbar").style.left = "5px";
          document.getElementById("dragbar").style.width = textareaheight;
          document.getElementById("dragbar").style.cursor = "row-resize";
        }
      }

      function dragstart(e) {
        e.preventDefault();
        dragging = true;
        var main = document.getElementById("iframecontainer");
      }

      function dragmove(e) {
        if (dragging) {
          document.getElementById("shield").style.display = "block";
          if (stack != " horizontal") {
            var percentage = (e.pageX / window.innerWidth) * 100;
            if (percentage > 5 && percentage < 98) {
              var mainPercentage = 100 - percentage;
              document.getElementById("textareacontainer").style.width = percentage + "%";
              document.getElementById("iframecontainer").style.width = mainPercentage + "%";
              fixDragBtn();
            }
          } else {
            var containertop = Number(w3_getStyleValue(document.getElementById("container"), "top").replace("px", ""));
            var percentage = ((e.pageY - containertop + 20) / (window.innerHeight - containertop + 20)) * 100;
            if (percentage > 5 && percentage < 98) {
              var mainPercentage = 100 - percentage;
              document.getElementById("textareacontainer").style.height = percentage + "%";
              document.getElementById("iframecontainer").style.height = mainPercentage + "%";
              fixDragBtn();
            }
          }
          showFrameSize();
        }
      }

      function dragend() {
        document.getElementById("shield").style.display = "none";
        dragging = false;
        var vend = navigator.vendor;
        if (window.editor && vend.indexOf("Apple") == -1) {
          window.editor.refresh();
        }
      }
      if (window.addEventListener) {
        document.getElementById("dragbar").addEventListener("mousedown", function(e) {
          dragstart(e);
        });
        document.getElementById("dragbar").addEventListener("touchstart", function(e) {
          dragstart(e);
        });
        window.addEventListener("mousemove", function(e) {
          dragmove(e);
        });
        window.addEventListener("touchmove", function(e) {
          dragmove(e);
        });
        window.addEventListener("mouseup", dragend);
        window.addEventListener("touchend", dragend);
        window.addEventListener("load", fixDragBtn);
        window.addEventListener("load", showFrameSize);
      }


      function colorcoding() {
        var ua = navigator.userAgent;
        //Opera Mini refreshes the page when trying to edit the textarea.
        if (ua && ua.toUpperCase().indexOf("OPERA MINI") > -1) {
          return false;
        }
        window.editor = CodeMirror.fromTextArea(document.getElementById("textareaCode"), {
          mode: "text/x-python",
          lineWrapping: true,
          smartIndent: false
        });
        //  window.editor.on("change", function () {window.editor.save();});
      }
      colorcoding();

      function w3_getStyleValue(elmnt, style) {
        if (window.getComputedStyle) {
          return window.getComputedStyle(elmnt, null).getPropertyValue(style);
        } else {
          return elmnt.currentStyle[style];
        }
      }

      function openMenu() {
        var x = document.getElementById("navbarDropMenu");
        var y = document.getElementById("menuOverlay");
        var z = document.getElementById("menuButton");
        if (z.className.indexOf("w3-text-gray") == -1) {
          z.className += " w3-text-gray";
        } else {
          z.className = z.className.replace(" w3-text-gray", "");
        }
        if (z.className.indexOf("w3-gray") == -1) {
          z.className += " w3-gray";
        } else {
          z.className = z.className.replace(" w3-gray", "");
        }
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else {
          x.className = x.className.replace(" w3-show", "");
        }
        if (y.className.indexOf("w3-show") == -1) {
          y.className += " w3-show";
        } else {
          y.className = y.className.replace(" w3-show", "");
        }

      }
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == document.getElementById("menuOverlay")) {
          openMenu();
        }
      }
    </script>
</body>

</html>