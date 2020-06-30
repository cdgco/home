<script>
  var data = null;

  var xhr = new XMLHttpRequest();
  xhr.withCredentials = false;

  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      var response = this.responseText;
  var jsonResponse = JSON.parse(response);
    }
  });

  xhr.open("GET", "https://www.googleapis.com/gmail/v1/users/me/labels/INBOX");
  xhr.setRequestHeader("authorization", "Bearer <?php print_r($_POST['token']); ?>");
  xhr.send(data);
</script>