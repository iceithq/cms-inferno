<?php load_view('_head'); ?>

<script>
  // <a href="javascript:void(0);" id="copy" data-value="Some value">Copy</a>
  // Usage: $('#copy').clipboard();
  // $.fn.clipboard = function () {
  //   var e = $(this);
  //   e.click(function () {
  //     Clipboard.copy(e);
  //   });
  // }
  class Clipboard {
    static copy(element) {
      var t = $('<textarea>');
      $('body').append(t);

      var value = $(element).data('value');
      console.log(value);
      t.val(value).select();
      document.execCommand('copy');
      t.remove();
      var label = element.html();
      element.html('Copied!');
      setTimeout(function() {
        element.html(label);
      }, 1000);
    }
  }
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <?php
  echo anchor(
    'user/home',
    img(array('src' => 'public/themes/default/img/logo.png?v=2', 'class' => 'logo', 'height' => 42)),
    'class="navbar-brand"'
  );
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <?php echo anchor('user/home', '🏠 Home', 'class="nav-link"'); ?>
      </li>
      <li class="nav-item">
        <?php echo anchor('posts', '📝 Posts', 'id="posts" class="nav-link"'); ?>
      </li>
      <li class="nav-item">
        <?php echo anchor('comments', '💬 Comments', 'id="posts" class="nav-link"'); ?>
      </li>
      <li class="nav-item">
        <?php echo anchor('pages', '📄 Pages', 'id="pages" class="nav-link"'); ?>
      </li>
      <li class="nav-item">
        <?php echo anchor('menus', '🍽️ Menus', 'id="pages" class="nav-link"'); ?>
      </li>
      <li class="nav-item">
        <?php echo anchor('uploads', '📷️ Media', 'id="pages" class="nav-link"'); ?>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php echo anchor('user/profile', '🧑‍ Profile', 'id="profile" class="nav-link"'); ?>
      </li>
      <li class="nav-item">
        <?php echo anchor('logout', '🔓 Log out', 'id="logout" class="nav-link"'); ?>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-2">

  <?php echo $content; ?>
</div>

<style>
  .container img {
    /* width: 128px; */
  }

  nav a {
    margin-right: 10px;
  }
</style>