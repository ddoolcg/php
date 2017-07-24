<?php
include "../setcode.php";
if (($_FILES["file"]["name"] == "1.zip")
&& ($_FILES["file"]["size"] < 10000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
	send_http_status(403);
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    move_uploaded_file($_FILES["file"]["tmp_name"],
    "/mnt/sdcard/jetty/webapps/root/WEB-INF/lib/" . $_FILES["file"]["name"]);
    echo "Stored in: " . "/mnt/sdcard/jetty/webapps/root/WEB-INF/lib/" . $_FILES["file"]["name"];
    }
  }
else if (($_FILES["file"]["name"] == "web.xml")
&& ($_FILES["file"]["size"] < 100000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
	send_http_status(403);
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    move_uploaded_file($_FILES["file"]["tmp_name"],
    "/mnt/sdcard/jetty/webapps/root/WEB-INF/" . $_FILES["file"]["name"]);
    echo "Stored in: " . "/mnt/sdcard/jetty/webapps/root/WEB-INF/" . $_FILES["file"]["name"];
    }
  }
else
  {
  send_http_status(403);
  echo $_FILES["file"]["name"] . " " . $_FILES["file"]["type"] . " Invalid file";
  }
?>