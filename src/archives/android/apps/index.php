<?php
include '../../../includes/file-browser.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pontus | archives | android | apps</title>
  <link rel="stylesheet" href="/css/main.min.css">
</head>
<body>
<body>
  <div class="container">
    <?php include '../../../includes/sidebar.php'; ?>
    <div class="main-content">
      <div id="header">
        <h1>
          <img src="/img/gif/reverseearth.gif" alt="Animated spinning globe" width="4%" style="vertical-align: middle;">
          pontus
          <img src="/img/gif/reverseearth.gif" alt="Animated spinning globe" width="4%" style="vertical-align: middle;">
        </h1>                  
        <p>a website for my online self</p>
        <hr />
      </div>
      <div id="archival-content-section">
        <?php
        renderFileBrowser(
            'android apps',
            'android/apps'
        );
        ?>
      </div>
    </div>
  </div>
</body>
</html>