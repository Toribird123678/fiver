<nav class="navbar navbar-expand-lg navbar-dark p-4" style="background-color: #023E8A;">
  <a class="navbar-brand" href="<?php echo $userObj->isAdmin() ? 'admin_index.php' : 'index.php'; ?>">Client Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projects.php">Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="project_offers_submitted.php">Project Offers Submitted </a>
      </li>
      <?php if (isset($categoryObj)) { $cats = $categoryObj->getAllCategoriesWithSubcategories(); } ?>
      <?php if (!empty($cats)) { foreach ($cats as $cat) { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown<?php echo $cat['category_id']; ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $cat['name']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown<?php echo $cat['category_id']; ?>">
          <?php if (!empty($cat['subcategories'])) { foreach ($cat['subcategories'] as $sub) { ?>
            <a class="dropdown-item" href="#"><?php echo $sub['name']; ?></a>
          <?php } } else { ?>
            <span class="dropdown-item disabled">No subcategories</span>
          <?php } ?>
        </div>
      </li>
      <?php } } ?>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="core/handleForms.php?logoutUserBtn=1">Logout</a>
      </li>
    </ul>
    <?php if ($userObj->isAdmin()) { ?>
    <form class="form-inline my-2 my-lg-0" action="core/handleForms.php" method="POST">
      <input class="form-control mr-sm-2" type="text" placeholder="New Category" name="new_category_name" aria-label="New Category">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="createCategoryBtn">Add Category</button>
    </form>
    <form class="form-inline my-2 my-lg-0 ml-2" action="core/handleForms.php" method="POST">
      <select class="form-control mr-sm-2" name="parent_category_id">
        <option value="">Select Category</option>
        <?php if (!empty($cats)) { foreach ($cats as $cat) { ?>
          <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['name']; ?></option>
        <?php } } ?>
      </select>
      <input class="form-control mr-sm-2" type="text" placeholder="New Subcategory" name="new_subcategory_name" aria-label="New Subcategory">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="createSubcategoryBtn">Add Subcategory</button>
    </form>
    <?php } ?>
  </div>
</nav>

